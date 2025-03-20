<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class Documentation extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'idCategorie',
        'idTypeCategorie',
        'date',
        'fichier',
        'archive',
    ];

    public static function getDocumentBycategorie($idCategorie)
    {
        try {
            #code...
            $documents = Documentation::where('idCategorie', $idCategorie)
                ->where('archive', false)
                ->get();

            return $documents;
        } catch (\Throwable $e) {
            #throw $th;
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le modèle Documents: ' . $e->getMessage());

            # Retourner le message d'erreur
            return [
                'status' => false,
                'message' => 'Une erreur est survenue dans le model Documents. Veuillez consulter l\'administrateur pour plus d\'informations. '
            ];
        }
    }

    #Selectionner tous les Documentations
    // public static function allDocuments()
    // {
    //     $categories = CategorieDocument::allCategorie();

    //     $documentations = [];

    //     foreach ($categories as $categorie) {
    //         $documents = Documentation::where('idCategorie', $categorie->id)
    //             ->where('archive', false)
    //             ->get();

    //         foreach ($documents as $document) {
    //             $documentations[$categorie->id][] = [
    //                 'idCategorie' => $document->idCategorie ?? null,
    //                 'id' => $document->id ?? null,
    //                 'categorie' => $categorie->titre ?? null,
    //                 'titre' => $document->titre ?? null,
    //                 'fichier' => $document->fichier ?? null,
    //                 'date' => $document->date ?? null,
    //             ];
    //         }
    //     }
    //     // dd($documentations);
    //     return $documentations;

    // }

    #Selectionner tous les Documentations
    public static function allDocuments()
    {
        # Récupérer toutes les catégories de documentation
        $categories = CategorieDocument::allCategorie();

        # Tableau pour stocker les données de documentation
        $documentations = [];

        foreach ($categories as $categorie) {
            # Récupérer les types de catégorie de document pour cette catégorie
            $typeCategories = TypeDeCategorieDocument::where('idCategorie', $categorie->id)->get();

            if ($typeCategories->isEmpty()) {
                $documentations[$categorie->id][] = [
                    'idCategorie' => $categorie->id ?? null,
                    'categorie' => $categorie->titre ?? null,
                    'idTypeCategorie' =>  null,
                    'typeCategorie' => null,
                    'id' =>  null,
                    'titre' =>  null,
                    'fichier' => null,
                    'date' =>  null,
                ];
            } else {
                # code...
                foreach ($typeCategories as $typeCategorie) {
                    # Récupérer les documents pour cette catégorie et ce type de catégorie
                    $documents = Documentation::where('idCategorie', $categorie->id)
                        ->where('idTypeCategorie', $typeCategorie->id)
                        ->where('archive', false)
                        ->get();

                    if ($documents->isEmpty()) {
                        $documentations[$categorie->id][] = [
                            'idCategorie' => $categorie->id ?? null,
                            'categorie' => $categorie->titre ?? null,
                            'idTypeCategorie' => $typeCategorie->id ?? null,
                            'typeCategorie' => $typeCategorie->titre ?? null,
                            'id' =>  null,
                            'titre' =>  null,
                            'fichier' => null,
                            'date' =>  null,
                        ];
                    } else {
                        # code...
                        foreach ($documents as $document) {
                            # Ajouter les données de documentation au tableau
                            $documentations[$categorie->id][] = [
                                'idCategorie' => $categorie->id ?? null,
                                'categorie' => $categorie->titre ?? null,
                                'idTypeCategorie' => $typeCategorie->id ?? null,
                                'typeCategorie' => $typeCategorie->titre ?? null,
                                'id' => $document->id ?? null,
                                'titre' => $document->titre ?? null,
                                'fichier' => $document->fichier ?? null,
                                'date' => $document->date ?? null,
                            ];
                        }
                    }
                }
            }
        }
        
        // dd($documentations);

        # Retourner le tableau de documentation
        return $documentations;
    }


    #Save || Update || Delete
    public static function saveUpdateDeleteDocumentation($request)
    {
        try {

            #Archive
            if (isset($request->id) && isset($request->archive) == true) {
                # Archive

                $documents = Documentation::find($request->id);

                if ($documents) {
                    $documents->archive = true;
                    $documents->save();

                    return [
                        'status' => true,
                        'message' => 'La Documentation a été archivé avec succès.',
                    ];
                } else {
                    return [
                        'status' => false,
                        'message' => 'Documentation non trouvé.',
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
                if ($request->hasFile('fichier')) {

                    $file = $request->file('fichier');

                    #Déplacer le fichier vers un emplacement spécifique
                    $path = 'public/uploads';

                    #generer le nom du fichier avec le slug
                    $newFilename = $slug .  '.' . $file->getClientOriginalExtension();

                    #ENREGISTER LE FICHIER DASN LE DOSSIER $path
                    $file->storeAs($path, $newFilename);
                }

                $documents = new Documentation();

                $documents->titre = $request->titre;
                $documents->idCategorie = $request->idCategorie;
                $documents->idTypeCategorie = $request->idTypeCategorie;
                $documents->date = date('d-m-Y', strtotime($request->date));
                $documents->fichier = $newFilename;
                $documents->archive = false;

                $documents->save();

                return [
                    'status' => true,
                    'message' => 'La Documentation a été traité enregistré'
                ];
            }

            #Update
            if (isset($request->id)) {
                // dd($request->all());
                $id = $request->id;
                $documents = Documentation::where('id', $id)->first();

                $slug = $request->titre;

                #Supprimer les caractères spéciaux et les espaces
                $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
                $slug = str_replace(' ', '', $slug) . time();

                $newFilename = $documents->fichier;

                #Vérifier si un fichier a été envoyé
                if ($request->hasFile('fichier')) {

                    $file = $request->file('fichier');

                    #Déplacer le nouveau fichier vers un emplacement spécifique
                    $path = 'public/uploads';

                    #Renommer le fichier avec le slug
                    $newFilename = $slug .  '.' . $file->getClientOriginalExtension();
                    $file->storeAs($path, $newFilename);

                    #Supprimer l'ancien fichier s'il existe
                    if ($documents->fichier != 'def.jpg' && Storage::exists('public/uploads/' . $documents->fichier)) {
                        Storage::delete('public/uploads/' . $documents->fichier);
                    }
                }

                $documents->titre = $request->titre;
                $documents->idCategorie = $request->idCategorie;
                $documents->idTypeCategorie = $request->idTypeCategorie;
                $documents->date = date('d-m-Y', strtotime($request->date));
                $documents->fichier = $newFilename;
                $documents->archive = false;

                $documents->save();

                return [
                    'status' => true,
                    'message' => 'La Documentation a été traité mise à jour avec succès.'
                ];
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le modèle Documents: ' . $e->getMessage());

            # Retourner le message d'erreur
            return [
                'status' => false,
                'message' => 'Une erreur est survenue dans le model Documents. Veuillez consulter l\'administrateur pour plus d\'informations. '
            ];
        }
    }
}
