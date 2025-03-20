<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class TypeFlashInfos extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'couleur',
        'archive',
    ];

    #Selectionner toutes les données du Type flash infos
    public static function allTypeFlashInfos()
    {
        $typeFlashInfos = TypeFlashInfos::where('archive', false)->get();

        return $typeFlashInfos;
    }

    #Save || Update || Delete
    public static function saveUpdateDeleteTypeFlashInfo($request)
    {
        try {

            #Archive
            if (isset($request->id) && isset($request->archive) == true) {
                # Archive

                $typeFlashInfos = TypeFlashInfos::find($request->id);

                if ($typeFlashInfos) {
                    $typeFlashInfos->archive = true;
                    $typeFlashInfos->save();

                    return [
                        'status' => true,
                        'message' => 'La Flashs infos a été archivé avec succès.',
                    ];
                } else {
                    return [
                        'status' => false,
                        'message' => 'La Flashs infos non trouvé.',
                    ];
                }
            }

            #Save
            if (!isset($request->id)) {

                $typeFlashInfos = new TypeFlashInfos();

                $typeFlashInfos->titre = $request->titre;
                $typeFlashInfos->couleur = $request->couleur;
                $typeFlashInfos->archive = false;

                $typeFlashInfos->save();

                return [
                    'status' => true,
                    'message' => 'La Flashs infos a été traité enregistré'
                ];
            }

            #Update
            if (isset($request->id)) {

                $id = $request->id;
                $typeFlashInfos = TypeFlashInfos::where('id', $id)->first();

                $typeFlashInfos->titre = $request->titre;
                $typeFlashInfos->couleur = $request->couleur;
                $typeFlashInfos->archive = false;

                $typeFlashInfos->save();

                return [
                    'status' => true,
                    'message' => 'La Flashs infos a été traité mise à jour avec succès.'
                ];
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le modèle Type flah info: ' . $e->getMessage());

            # Retourner le message d'erreur
            return [
                'status' => false,
                'message' => 'Une erreur est survenue dans le model Type flah info. Veuillez consulter l\'administrateur pour plus d\'informations. '
            ];
        }
    }
}
