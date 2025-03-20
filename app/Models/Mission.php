<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'planStrategie',
        'contenu',
        'facebook',
        'linkedIn',
        'youTube',
        'archive',
    ];

    #Selectionner toutes les données de la Mission
    public static function allMission()
    {
        $mission = Mission::where('archive',  false)->get();

        return $mission;
    }

    #Save || Update || Delete
    public static function saveUpdateDeleteMission($request)
    {
        try {

            #Archive
            if (isset($request->id) && isset($request->archive) == true) {
                # Archive

                $planStrategie = Mission::find($request->id);

                if ($planStrategie) {
                    $planStrategie->archive = true;
                    $planStrategie->save();

                    return [
                        'status' => true,
                        'message' => 'La donnée a été archivé avec succès.',
                    ];
                } else {
                    return [
                        'status' => false,
                        'message' => 'Aucune donnée non trouvé.',
                    ];
                }
            }

            #Save
            if (!isset($request->id)) {

                $planStrategie = new Mission();

                $planStrategie->planStrategie = $request->planStrategie ?? null;
                $planStrategie->contenu = $request->contenu ?? null;
                $planStrategie->facebook = $request->facebook ?? null;
                $planStrategie->linkedIn = $request->linkedIn ?? null;
                $planStrategie->twitter = $request->twitter ?? null;
                $planStrategie->youTube = $request->youTube ?? null;
                $planStrategie->archive = false;

                $planStrategie->save();

                return [
                    'status' => true,
                    'message' => 'La donnée a été traité enregistré'
                ];
            }

            #Update
            if (isset($request->id)) {

                $id = $request->id;
                $planStrategie = Mission::where('id', $id)->first();
                
                $slug = "Mission";
                
                #Supprimer les caractères spéciaux et les espaces
                $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
                $slug = str_replace(' ', '', $slug) . time();

                $newFilename = $planStrategie->planStrategie;
                
                if ($request->hasFile('planStrategie')) {
                    $file = $request->file('planStrategie');
                    
                    # Renommer le fichier avec le slug
                    $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
                    $slug = str_replace(' ', '', $slug) . time();
                    $newFilename = $slug . '.' . $file->getClientOriginalExtension();
                    
                    # Déplacer le nouveau fichier vers un emplacement spécifique
                    $path = 'public/uploads';
                    $file->storeAs($path, $newFilename);
                
                    # Supprimer l'ancien fichier s'il existe
                    if ($planStrategie->planStrategie != 'def.jpg' && Storage::exists('public/uploads/' . $planStrategie->planStrategie)) {
                        Storage::delete('public/uploads/' . $planStrategie->planStrategie);
                    }
                }

                $planStrategie->planStrategie = $newFilename;
                $planStrategie->contenu = $request->contenu ?? null;
                $planStrategie->facebook = $request->facebook ?? null;
                $planStrategie->linkedIn = $request->linkedIn ?? null;
                $planStrategie->twitter = $request->twitter ?? null;
                $planStrategie->youTube = $request->youTube ?? null;
                $planStrategie->archive = false;

                $planStrategie->save();

                // dd($newFilename);
                return [
                    'status' => true,
                    'message' => 'la donnée a été traité mise à jour avec succès.'
                ];
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le modèle Mission: ' . $e->getMessage());

            # Retourner le message d'erreur
            return [
                'status' => false,
                'message' => 'Une erreur est survenue dans le model Mission. Veuillez consulter l\'administrateur pour plus d\'informations. '
            ];
        }
    }
}
