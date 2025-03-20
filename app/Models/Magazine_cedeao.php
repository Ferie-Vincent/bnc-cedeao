<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class Magazine_cedeao extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'date',
        'contenu',
        'fichierPDF',
        'archive',
    ];

    #Selectionner tous les magazine de la CEDEAO
    public static function allMagazine()
    {

        $magazines = Magazine_cedeao::where('archive', false)->paginate(5);

        return $magazines;
    }

    #Save || Update || Delete
    public static function saveUpdateDeleteMagazine($request)
    {
        try {

            #Archive
            if (isset($request->id) && isset($request->archive) == true) {
                # Archive

                $magazine = Magazine_cedeao::find($request->id);

                if ($magazine) {
                    $magazine->archive = true;
                    $magazine->save();

                    return [
                        'status' => true,
                        'message' => 'Le magazine de la CEDEAO a été archivé avec succès.',
                    ];
                } else {
                    return [
                        'status' => false,
                        'message' => 'Le magazine de la CEDEAO non trouvé.',
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

                $magazine = new Magazine_cedeao();

                $magazine->titre = $request->titre;
                $magazine->contenu = $request->contenu;
                $magazine->date = date('d-m-Y', strtotime($request->date));
                $magazine->fichierPDF = $newFilename;
                $magazine->archive = false;

                $magazine->save();

                return [
                    'status' => true,
                    'message' => 'Le magazine de la CEDEAO a été traité enregistré'
                ];
            }

            #Update
            if (isset($request->id)) {

                $id = $request->id;
                $magazine = Magazine_cedeao::where('id', $id)->first();

                $slug = $request->titre;
                
                #Supprimer les caractères spéciaux et les espaces
                $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
                $slug = str_replace(' ', '', $slug) . time();

                $newFilename = $magazine->fichierPDF;

                #Vérifier si un fichier a été envoyé
                if ($request->hasFile('fichierPDF')) {

                    $file = $request->file('fichierPDF');

                    #Déplacer le nouveau fichier vers un emplacement spécifique
                    $path = 'public/uploads';

                    #Renommer le fichier avec le slug
                    $newFilename = $slug .  '.' . $file->getClientOriginalExtension();
                    $file->storeAs($path, $newFilename);

                    
                    #Supprimer l'ancien fichier s'il existe
                    if ($magazine->fichierPDF != 'def.jpg' && Storage::exists('public/uploads/' . $magazine->fichierPDF)) {
                        Storage::delete('public/uploads/' . $magazine->fichierPDF);
                    }

                }

                $magazine->titre = $request->titre;
                $magazine->contenu = $request->contenu;
                $magazine->date = date('d-m-Y', strtotime($request->date));
                $magazine->fichierPDF = $newFilename;
                $magazine->archive = false;

                $magazine->save();

                return [
                    'status' => true,
                    'message' => 'Le magazine de la CEDEAO a été traité mise à jour avec succès.'
                ];
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le modèle MAGAZINE DE LA CEDEAO: ' . $e->getMessage());
            
            # Retourner le message d'erreur
            return [
                'status' => false,
                'message' => 'Une erreur est survenue dans le model MAGAZINE DE LA CEDEAO. Veuillez consulter l\'administrateur pour plus d\'informations. '
            ];
            
        }
    }
}
