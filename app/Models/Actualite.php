<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class Actualite extends Model
{
    use HasFactory;

    protected $fillable = [
        'auteur',
        'appelTitre',
        'title',
        'legende',
        'chapeau',
        'corpsTexte',
        'date',
        'image',
        'id_tags',
        'archive',
    ];

    #Selectionner tous les actualitées
    public static function allactualites()
    {
        $actualites = Actualite::where('archive', false)->paginate(5);

        // $actualite = [];
        // foreach ($actualites as $key => $value) {
        //     # code...
        //     $tags = Tags::where('id', $value->id_tags)->first();

        //     $actualite[] = [
        //         'id' => $value->id,
        //         'auteur' => $value->auteur,
        //         'appelTitre' => $value->appelTitre,
        //         'title' => $value->title,
        //         'legende' => $value->legende,
        //         'chapeau' => $value->chapeau,
        //         'corpsTexte' => $value->corpsTexte,
        //         'date' => $value->date,
        //         'image' => $value->image,
        //         'id_tags' => $value->id_tags,
        //         'tags' => $tags->name,
        //     ];
        // }
        // dd($actualite);
        return $actualites;
    }

    #Save || Update || Delete
    public static function saveUpdateDeleteActualites($request)
    {
        try {

            #Archive
            if (isset($request->id) && isset($request->archive) == true) {
                # Archive

                $actualite = Actualite::find($request->id);

                if ($actualite) {
                    $actualite->archive = true;
                    $actualite->save();

                    return [
                        'status' => true,
                        'message' => 'L\'article a été archivé avec succès.',
                    ];
                } else {
                    return [
                        'status' => false,
                        'message' => 'Article non trouvé.',
                    ];
                }
            }

            #Save
            if (!isset($request->id)) {

                #Traitement du fichier
                $newFilename = 'def.jpg';

                $slug = $request->appelTitre;

                #Supprimer les caractères spéciaux et les espaces
                $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
                $slug = str_replace(' ', '', $slug) . time();

                #Vérifier si un fichier a été envoyé
                if ($request->hasFile('image')) {

                    $file = $request->file('image');

                    #Déplacer le fichier vers un emplacement spécifique
                    $path = 'public/uploads';

                    #generer le nom du fichier avec le slug
                    $newFilename = $slug .  '.' . $file->getClientOriginalExtension();

                    //ENREGISTER LE FICHIER DASN LE DOSSIER $path
                    $file->storeAs($path, $newFilename);
                }

                $actualite = new Actualite();

                $actualite->auteur = $request->auteur;
                $actualite->appelTitre = $request->appelTitre;
                $actualite->title = $request->title;
                $actualite->legende = $request->legende;
                $actualite->chapeau = $request->chapeau;
                $actualite->corpsTexte = $request->corpsTexte;
                $actualite->date = date('d-m-Y', strtotime($request->date));
                $actualite->image = $newFilename;
                $actualite->id_tags = $request->tags;
                $actualite->archive = false;

                $actualite->save();

                return [
                    'status' => true,
                    'message' => 'L\'article a été traité enregistré'
                ];
            }

            #Update
            if (isset($request->id)) {

                $id = $request->id;
                $actualite = Actualite::where('id', $id)->first();

                $slug = $request->appelTitre;

                #Supprimer les caractères spéciaux et les espaces
                $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
                $slug = str_replace(' ', '', $slug) . time();

                $newFilename = $actualite->image;

                #Vérifier si un fichier a été envoyé
                if ($request->hasFile('image')) {

                    $file = $request->file('image');

                    #Déplacer le nouveau fichier vers un emplacement spécifique
                    $path = 'public/uploads';

                    #Renommer le fichier avec le slug
                    $newFilename = $slug .  '.' . $file->getClientOriginalExtension();
                    $file->storeAs($path, $newFilename);

                    #Supprimer l'ancien fichier s'il existe
                    if ($actualite->image != 'def.jpg' && Storage::exists('public/uploads/' . $actualite->image)) {
                        Storage::delete('public/uploads/' . $actualite->image);
                    }
                }

                $actualite->auteur = $request->auteur;
                $actualite->appelTitre = $request->appelTitre;
                $actualite->title = $request->title;
                $actualite->legende = $request->legende;
                $actualite->chapeau = $request->chapeau;
                $actualite->corpsTexte = $request->corpsTexte;
                $actualite->date = date('d-m-Y', strtotime($request->date));
                $actualite->id_tags = $request->tags;
                $actualite->image = $newFilename;
                $actualite->archive = false;

                $actualite->save();

                return [
                    'status' => true,
                    'message' => 'L\'article a été traité mise à jour avec succès.'
                ];
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le modèle Actualite: ' . $e->getMessage());

            # Retourner le message d'erreur
            return [
                'status' => false,
                'message' => 'Une erreur est survenue dans le modèle Actualite. Veuillez consulter l\'administrateur pour plus d\'informations.'
            ];
        }
    }
}
