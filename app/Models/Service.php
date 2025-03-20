<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service',
        'contenu',
        'archive',
    ];

    #Selectionner toutes les données du service
    public static function allService()
    {
        $sercives = Service::where('archive', false)->paginate(100);

        return $sercives;
    }

    #Save || Update || Delete
    public static function saveUpdateDeleteSercive($request)
    {
        try {

            #Archive
            if (isset($request->id) && isset($request->archive) == true) {
                # Archive

                $sercives = Service::find($request->id);

                if ($sercives) {
                    $sercives->archive = true;
                    $sercives->save();

                    return [
                        'status' => true,
                        'message' => 'Le sercive a été archivé avec succès.',
                    ];
                } else {
                    return [
                        'status' => false,
                        'message' => 'Le sercive non trouvé.',
                    ];
                }
            }

            #Save
            if (!isset($request->id)) {

                $sercives = new Service();

                $sercives->service = $request->service;
                $sercives->contenu = $request->contenu;
                $sercives->archive = false;

                $sercives->save();

                return [
                    'status' => true,
                    'message' => 'L\'Evenement a été traité enregistré'
                ];
            }

            #Update
            if (isset($request->id)) {

                $id = $request->id;
                $sercives = Service::where('id', $id)->first();

                $sercives->service = $request->service;
                $sercives->contenu = $request->contenu;
                $sercives->archive = false;

                $sercives->save();

                return [
                    'status' => true,
                    'message' => 'Le sercive a été traité mise à jour avec succès.'
                ];
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le modèle Services: ' . $e->getMessage());

            # Retourner le message d'erreur
            return [
                'status' => false,
                'message' => 'Une erreur est survenue dans le model Services. Veuillez consulter l\'administrateur pour plus d\'informations. '
            ];
        }
    }
}
