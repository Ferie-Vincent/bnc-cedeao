<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class Avis_publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'date',
        'contenu',
        'fichierPDF',
        'archive',
    ];

    #Selectionner tous les avis de publication
    public static function allAvisPublication()
    {

        $avisPublications = Avis_publication::where('archive', false)->paginate(5);

        return $avisPublications;
    }

    #Save || Update || Delete
    public static function saveUpdateDeleteAvisPublication($request)
    {
        try {

            #Archive
            if (isset($request->id) && isset($request->archive) == true) {
                # Archive

                $avisPublication = Avis_publication::find($request->id);

                if ($avisPublication) {
                    $avisPublication->archive = true;
                    $avisPublication->save();

                    return [
                        'status' => true,
                        'message' => 'L\'avis de publication a été archivé avec succès.',
                    ];
                } else {
                    return [
                        'status' => false,
                        'message' => 'L\'avis de publication non trouvé.',
                    ];
                }
            }

            #Save
            if (!isset($request->id)) {

                #Traitement du fichier
                $newFilename = 'def.jpg';

                $slug = $request->titre;

                #Supprimer les caractères spéciaux et les espaces
                $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
                $slug = str_replace(' ', '', $slug) . time();

                #Vérifier si un fichier a été envoyé
                if ($request->hasFile('fichierPDF')) {

                    $file = $request->file('fichierPDF');

                    #Déplacer le fichier vers un emplacement spécifique
                    $path = 'public/uploads';

                    #generer le nom du fichier avec le slug
                    $newFilename = $slug .  '.' . $file->getClientOriginalExtension();

                    //ENREGISTER LE FICHIER DASN LE DOSSIER $path
                    $file->storeAs($path, $newFilename);
                }

                $avisPublication = new Avis_publication();

                $avisPublication->titre = $request->titre;
                $avisPublication->contenu = $request->contenu;
                $avisPublication->date = date('d-m-Y', strtotime($request->date));
                $avisPublication->fichierPDF = $newFilename;
                $avisPublication->archive = false;

                $avisPublication->save();

                return [
                    'status' => true,
                    'message' => 'L\'avis de publication a été traité enregistré'
                ];
            }

            #Update
            if (isset($request->id)) {

                $id = $request->id;
                $avisPublication = Avis_publication::where('id', $id)->first();

                $slug = $request->titre;

                #Supprimer les caractères spéciaux et les espaces
                $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
                $slug = str_replace(' ', '', $slug) . time();

                $newFilename = $avisPublication->fichierPDF;

                #Vérifier si un fichier a été envoyé
                if ($request->hasFile('fichierPDF')) {

                    $file = $request->file('fichierPDF');

                    #Déplacer le nouveau fichier vers un emplacement spécifique
                    $path = 'public/uploads';

                    #Renommer le fichier avec le slug
                    $newFilename = $slug .  '.' . $file->getClientOriginalExtension();
                    $file->storeAs($path, $newFilename);

                    // Supprimer l'ancien fichier s'il existe
                    if ($avisPublication->fichierPDF != 'def.jpg' && Storage::exists('public/uploads/' . $avisPublication->fichierPDF)) {
                        Storage::delete('public/uploads/' . $avisPublication->fichierPDF);
                    }
                }

                $avisPublication->titre = $request->titre;
                $avisPublication->contenu = $request->contenu;
                $avisPublication->date = date('d-m-Y', strtotime($request->date));
                $avisPublication->fichierPDF = $newFilename;
                $avisPublication->archive = false;

                $avisPublication->save();

                return [
                    'status' => true,
                    'message' => 'L\'avis de publication a été traité mise à jour avec succès.'
                ];
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le modèle Avis Publication: ' . $e->getMessage());

            # Retourner le message d'erreur
            return [
                'status' => false,
                'message' => 'Une erreur est survenue dans le model Avis Publication. Veuillez consulter l\'administrateur pour plus d\'informations. '
            ];
        }
    }
}
