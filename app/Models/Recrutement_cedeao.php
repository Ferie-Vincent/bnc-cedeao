<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Recrutement_cedeao extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'date',
        'contenu',
        'links',
        'archive',
    ];


    #Selectionner tous les recrutements de la cedeao
    public static function allRecrutementCEDEAO()
    {
        $recrutements = Recrutement_cedeao::where('archive', false)->paginate(5);

        return $recrutements;
    }

    #Save || Update || Delete
    public static function saveUpdateDeleteRecrutementCEDEAO($request)
    {
        try {

            #Archive
            if (isset($request->id) && isset($request->archive) == true) {
                # Archive

                $recrutement = Recrutement_cedeao::find($request->id);

                if ($recrutement) {
                    $recrutement->archive = true;
                    $recrutement->save();

                    return [
                        'status' => true,
                        'message' => 'Le recrutement CEDEAO  a été archivé avec succès.',
                    ];
                } else {
                    return [
                        'status' => false,
                        'message' => 'Le recrutement CEDEAO  non trouvé.',
                    ];
                }
            }

            #Save
            if (!isset($request->id)) {


                $recrutement = new Recrutement_cedeao();

                $recrutement->titre = $request->titre;
                $recrutement->date = date('d-m-Y', strtotime($request->date));
                $recrutement->contenu = $request->contenu;
                $recrutement->links = $request->links;
                $recrutement->archive = false;

                $recrutement->save();

                return [
                    'status' => true,
                    'message' => 'Le recrutement CEDEAO  a été traité enregistré'
                ];
            }

            #Update
            if (isset($request->id)) {

                $id = $request->id;
                $recrutement = Recrutement_cedeao::where('id', $id)->first();

                $recrutement->titre = $request->titre;
                $recrutement->date = date('d-m-Y', strtotime($request->date));
                $recrutement->contenu = $request->contenu;
                $recrutement->links = $request->links;
                $recrutement->archive = false;

                $recrutement->save();

                return [
                    'status' => true,
                    'message' => 'Le recrutement CEDEAO a été traité mise à jour avec succès.'
                ];
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le modèle recrutement CEDEAOS: ' . $e->getMessage());
            
            # Retourner le message d'erreur
            return [
                'status' => false,
                'message' => 'Une erreur est survenue dans le model recrutement CEDEAOS. Veuillez consulter l\'administrateur pour plus d\'informations. '
            ];
            
        }
    }
}
