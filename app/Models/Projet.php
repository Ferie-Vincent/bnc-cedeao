<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'image',
        'texte',
        'idThematique',
        'archive',
    ];

    public static function allProjet(){
        $thematiques = ThematiqueProjet::allThematique();

        $projets = [];

        foreach ($thematiques as $key => $value) {
            // Récupérer les  infos pour le projet
            $infoProjets = Projet::where('idThematique', $value->id)
                ->where('archive', false)
                ->get();

            foreach ($infoProjets as $infoProjet) {
                $projets[] = [
                    'id' => $infoProjet->id ?? null,
                    'titre' => $infoProjet->titre ?? null,
                    'image' => $infoProjet->image ?? null,
                    'texte' => $infoProjet->texte ?? null,
                    'created_at' => $infoProjet->created_at ?? null,
                    'idThematique' => $value->id ?? null,
                    'thematique' => $value->titre ?? null,
                ];
            }
        }
        // dd($projets);
        return $projets;
    }

    #Save || Update || Delete
    public static function saveUpdateDeleteProjet($request)
    {
        try {

            #Archive
            if (isset($request->id) && isset($request->archive) == true) {
                # Archive

                $projets = Projet::find($request->id);

                if ($projets) {
                    $projets->archive = true;
                    $projets->save();

                    return [
                        'status' => true,
                        'message' => 'Le projet a été archivé avec succès.',
                    ];
                } else {
                    return [
                        'status' => false,
                        'message' => 'Le projet non trouvé.',
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
                if ($request->hasFile('image')) {

                    $file = $request->file('image');

                    #Déplacer le fichier vers un emplacement spécifique
                    $path = 'public/uploads';

                    #generer le nom du fichier avec le slug
                    $newFilename = $slug .  '.' . $file->getClientOriginalExtension();

                    //ENREGISTER LE FICHIER DASN LE DOSSIER $path
                    $file->storeAs($path, $newFilename);
                }

                $projets = new Projet();

                $projets->titre = $request->titre;
                $projets->texte = $request->texte;
                $projets->idThematique = $request->idThematique;
                $projets->image = $newFilename;
                $projets->archive = false;

                $projets->save();

                return [
                    'status' => true,
                    'message' => 'Le projet a été traité enregistré'
                ];
            }

            #Update
            if (isset($request->id)) {

                $id = $request->id;
                $projets = Projet::where('id', $id)->first();

                $slug = $request->titre;

                #Supprimer les caractères spéciaux et les espaces
                $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
                $slug = str_replace(' ', '', $slug) . time(); 

                $newFilename = $projets->image;

                #Vérifier si un fichier a été envoyé
                if ($request->hasFile('image')) {

                    $file = $request->file('image');

                    #Déplacer le nouveau fichier vers un emplacement spécifique
                    $path = 'public/uploads';

                    #Renommer le fichier avec le slug
                    $newFilename = $slug .  '.' . $file->getClientOriginalExtension();
                    $file->storeAs($path, $newFilename);

                    #Supprimer l'ancien fichier s'il existe
                    if ($projets->image != 'def.jpg' && Storage::exists('public/uploads/' . $projets->image)) {
                        Storage::delete('public/uploads/' . $projets->image);
                    }

                }

                $projets->titre = $request->titre;
                $projets->texte = $request->texte;
                $projets->idThematique = $request->idThematique;
                $projets->image = $newFilename;
                $projets->archive = false;

                $projets->save();

                return [
                    'status' => true,
                    'message' => 'Le projet a été traité mise à jour avec succès.'
                ];
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le modèle Projet: ' . $e->getMessage());

            # Retourner le message d'erreur
            return [
                'status' => false,
                'message' => 'Une erreur est survenue dans le model Projet. Veuillez consulter l\'administrateur pour plus d\'informations. '
            ];
        }
    }
}
