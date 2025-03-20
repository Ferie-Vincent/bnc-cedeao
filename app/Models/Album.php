<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'image',
        'archive',
    ];

    #Selectionner tous les aalbums
    public static function allAlbums()
    {

        $images = Album::where('archive', false)->get();
        return $images;
    }

    #Save || Update || Delete
    public static function saveUpdateDeleteAlbum($request)
    {
        try {


            # Vérifier si l'ID de l'album et l'archive sont définis
            if (isset($request->id) && isset($request->archive) == true) {

                # Récupérer l'album par son ID
                $album = Album::find($request->id);

                # Vérifier si l'album existe
                if ($album) {

                    if ($request->image) {

                        # Décodez le tableau JSON des images de l'album
                        $images = json_decode($album->image);

                        # Créez un tableau contenant l'ancienne image à supprimer
                        $oldImage = [$request->image];

                        # Utilisez array_diff pour retirer l'ancienne image du tableau d'images
                        $images = array_diff($images, $oldImage);

                        # Obtenez le nom de l'ancienne image
                        $imageToDelete = $oldImage[0];

                        # Supprimez l'ancien fichier s'il existe
                        if ($imageToDelete != 'def.jpg' && Storage::exists('public/uploads/' . $imageToDelete)) {
                            Storage::delete('public/uploads/' . $imageToDelete);
                        }

                        $album->nom = $request->nom;
                        $album->image = json_encode(array_values($images)); # Mettez à jour l'album avec le nouveau tableau d'images
                        $album->archive = false;
                        $album->save();

                        return [
                            'status' => true,
                            'message' => 'L\'image a été supprimée avec succès.',
                        ];
                    } else {

                        # Mettre l'album à l'archivre
                        $album->archive = true;
                        $album->save();

                        return [
                            'status' => true,
                            'message' => 'L\'album a été archivé avec succès.',
                        ];
                    }
                } else {
                    # L'album n'a pas été trouvé
                    return [
                        'status' => false,
                        'message' => 'L\'album n\'a pas été trouvé.',
                    ];
                }
            }


            if (!isset($request->id)) {
                // Traitement du fichier

                $slug = $request->nom;

                // Supprimer les caractères spéciaux et les espaces
                $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
                $slug = str_replace(' ', '', $slug) . time();

                $imageNames = []; // Pour stocker les noms générés pour les images

                // Vérifier si des fichiers ont été envoyés
                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        $file = $image;

                        // Générer un nom de fichier unique avec le slug
                        $newFilename = $slug .  '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                        // Stocker le nom de l'image généré pour référence ultérieure
                        $imageNames[] = $newFilename;

                        // Déplacer le fichier vers un emplacement spécifique
                        $path = 'public/uploads';

                        // Enregistrer le fichier dans le dossier $path
                        $file->storeAs($path, $newFilename);
                    }
                }
                // dd($imageNames);
                // Créer un nouvel enregistrement d'album
                $album = new Album();

                $album->nom = $request->nom;
                $album->archive = false;
                $album->image = json_encode($imageNames);
                // $album->image = implode(',', $imageNames); // Stockez les noms générés des images comme une chaîne séparée par des virgules

                $album->save();

                return [
                    'status' => true,
                    'message' => 'L\'Album a été traité et enregistré',
                    'image_names' => $imageNames // Vous pouvez retourner les noms générés des images
                ];
            }

            #Update
            // if (isset($request->id)) {

            //     $id = $request->id;
            //     $image = Album::where('id', $id)->first();

            //     $slug = $request->nom;

            //     #Supprimer les caractères spéciaux et les espaces
            //     $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
            //     $slug = str_replace(' ', '', $slug) . time();

            //     $newFilename = $image->image;

            //     #Vérifier si un fichier a été envoyé
            //     if ($request->hasFile('images')) {
            //         foreach ($request->file('images') as $image) {

            //             $file = $image;

            //             #Déplacer le nouveau fichier vers un emplacement spécifique
            //             $path = 'public/uploads';

            //             #Renommer le fichier avec le slug
            //             $newFilename = $slug .  '.' . $file->getClientOriginalExtension();
            //             $file->storeAs($path, $newFilename);

            //             #Supprimer l'ancien fichier s'il existe
            //             if ($image->image != 'def.jpg' && Storage::exists('public/uploads/' . $image->image)) {
            //                 Storage::delete('public/uploads/' . $image->image);
            //             }
            //         }
            //     }

            //     $image->nom = $request->nom;
            //     $image->image = $newFilename;
            //     $image->archive = false;


            //     $image->save();

            //     return [
            //         'status' => true,
            //         'message' => 'L\'album a été traité mise à jour avec succès.'
            //     ];
            // }

            if (isset($request->id)) {

                # Récupérer l'album par son ID
                $id = $request->id;
                $image = Album::find($id);

                if (!$image) {
                    return [
                        'status' => false,
                        'message' => 'L\'album n\'a pas été trouvé.',
                    ];
                }

                # Générer un slug unique pour les noms de fichiers
                $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $request->nom);
                $slug = str_replace(' ', '', $slug) . time();

                # Pour stocker les noms générés pour les images
                $imageNames = [];

                # Vérifier si un fichier a été envoyé
                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $file) {
                        # Générer un nom de fichier unique avec le slug
                        $newFilename = $slug . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                        # Stocker le nom de l'image généré pour référence ultérieure
                        $imageNames[] = $newFilename;

                        # Déplacer le fichier vers un emplacement spécifique
                        $path = 'public/uploads';

                        # Enregistrer le fichier dans le dossier $path
                        $file->storeAs($path, $newFilename);
                    }
                }

                # Fusionner les anciennes images avec les nouvelles
                $oldImages = json_decode($image->image);
                $newImages = array_merge($oldImages, $imageNames);

                # Mettre à jour l'album avec les nouvelles images
                $image->nom = $request->nom;
                $image->image = json_encode(array_values($newImages)); # Réindexer le tableau
                $image->archive = false;

                $image->save();

                return [
                    'status' => true,
                    'message' => 'L\'album a été mis à jour avec succès.',
                ];
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le modèle Album: ' . $e->getMessage());

            # Retourner le message d'erreur
            return [
                'status' => false,
                'message' => 'Une erreur est survenue dans le model Album. Veuillez consulter l\'administrateur pour plus d\'informations. '
            ];
        }
    }
}
