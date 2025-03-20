<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ThematiqueProjet extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'archive',
    ];

    #Selectionner toutes les données du projet thématique
    public static function allThematique()
    {
        $thematiques = ThematiqueProjet::where('archive', false)->get();

        return $thematiques;
    }

    #Save || Update || Delete
    public static function saveUpdateDeleteThematique($request)
    {
        try {

            #Archive
            if (isset($request->id) && isset($request->archive) == true) {
                # Archive

                $thematique = ThematiqueProjet::find($request->id);

                if ($thematique) {
                    $thematique->archive = true;
                    $thematique->save();

                    return [
                        'status' => true,
                        'message' => 'La Thematique a été archivé avec succès.',
                    ];
                } else {
                    return [
                        'status' => false,
                        'message' => 'La Thematique non trouvé.',
                    ];
                }
            }

            #Save
            if (!isset($request->id)) {

                $thematique = new ThematiqueProjet();

                $thematique->titre = $request->titre;
                $thematique->archive = false;

                $thematique->save();

                return [
                    'status' => true,
                    'message' => 'La Thematique a été traité enregistré'
                ];
            }

            #Update
            if (isset($request->id)) {

                $id = $request->id;
                $thematique = ThematiqueProjet::where('id', $id)->first();

                $thematique->titre = $request->titre;
                $thematique->archive = false;

                $thematique->save();

                return [
                    'status' => true,
                    'message' => 'La Thematique a été traité mise à jour avec succès.'
                ];
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le modèle la Thematique projet: ' . $e->getMessage());

            # Retourner le message d'erreur
            return [
                'status' => false,
                'message' => 'Une erreur est survenue dans le model Thematique projet. Veuillez consulter l\'administrateur pour plus d\'informations. '
            ];
        }
    }
}
