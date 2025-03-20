<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class Appel_offre extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'date',
        'contenu',
        'fichierPDF',
        'archive',
    ];

    #Selectionner tous les appel d'offre
    public static function allAppelOffre()
    {

        $appelOffres = Appel_offre::where('archive', false)->paginate(5);

        return $appelOffres;
    }

    #Save || Update || Delete
    public static function saveUpdateDeleteAppelOffre($request)
    {
        try {

            #Archive
            if (isset($request->id) && isset($request->archive) == true) {
                # Archive

                $appelOffre = Appel_offre::find($request->id);

                if ($appelOffre) {
                    $appelOffre->archive = true;
                    $appelOffre->save();

                    return [
                        'status' => true,
                        'message' => 'L\'appel Offre a été archivé avec succès.',
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

                $appelOffre = new Appel_offre();

                $appelOffre->titre = $request->titre;
                $appelOffre->contenu = $request->contenu;
                $appelOffre->date = date('d-m-Y', strtotime($request->date));
                $appelOffre->fichierPDF = $newFilename;
                $appelOffre->archive = false;

                $appelOffre->save();

                return [
                    'status' => true,
                    'message' => 'L\'avis de publication a été traité enregistré'
                ];
            }

            #Update
            if (isset($request->id)) {

                $id = $request->id;
                $appelOffre = Appel_offre::where('id', $id)->first();

                $slug = $request->titre;

                #Supprimer les caractères spéciaux et les espaces
                $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
                $slug = str_replace(' ', '', $slug) . time(); 

                $newFilename = $appelOffre->fichierPDF;

                #Vérifier si un fichier a été envoyé
                if ($request->hasFile('fichierPDF')) {

                    $file = $request->file('fichierPDF');

                    #Déplacer le nouveau fichier vers un emplacement spécifique
                    $path = 'public/uploads';

                    #Renommer le fichier avec le slug
                    $newFilename = $slug .  '.' . $file->getClientOriginalExtension();
                    $file->storeAs($path, $newFilename);

                    #Supprimer l'ancien fichier s'il existe
                    if ($appelOffre->fichierPDF != 'def.jpg' && Storage::exists('public/uploads/' . $appelOffre->fichierPDF)) {
                        Storage::delete('public/uploads/' . $appelOffre->fichierPDF);
                    }

                }

                $appelOffre->titre = $request->titre;
                $appelOffre->contenu = $request->contenu;
                $appelOffre->date = date('d-m-Y', strtotime($request->date));
                $appelOffre->fichierPDF = $newFilename;
                $appelOffre->archive = false;

                $appelOffre->save();

                return [
                    'status' => true,
                    'message' => 'L\'avis de publication a été traité mise à jour avec succès.'
                ];
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le modèle Appel offre: ' . $e->getMessage());

            # Retourner le message d'erreur
            return [
                'status' => false,
                'message' => 'Une erreur est survenue dans le model Appel offre. Veuillez consulter l\'administrateur pour plus d\'informations. '
            ];
        }
    }
}
