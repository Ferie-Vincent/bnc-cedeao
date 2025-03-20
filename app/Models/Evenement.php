<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class Evenement extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'libele',
        'date',
        'links',
        'image',
        'archive',
    ];

    #Selectionner tous les evenements
    public static function allEvens()
    {
        $evens = Evenement::where('archive', false)->paginate(5);

        return $evens;
    }

    #Save || Update || Delete
    public static function saveUpdateDeleteEvens($request)
    {
        try {

            #Archive
            if (isset($request->id) && isset($request->archive) == true) {
                # Archive

                $evens = Evenement::find($request->id);

                if ($evens) {
                    $evens->archive = true;
                    $evens->save();

                    return [
                        'status' => true,
                        'message' => 'L\'Evenement a été archivé avec succès.',
                    ];
                } else {
                    return [
                        'status' => false,
                        'message' => 'Evenement non trouvé.',
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

                $evens = new Evenement();

                $evens->titre = $request->titre;
                $evens->libele = $request->libele;
                $evens->date = date('d-m-Y', strtotime($request->date));
                $evens->links = $request->links;
                $evens->image = $newFilename;
                $evens->archive = false;

                $evens->save();

                return [
                    'status' => true,
                    'message' => 'L\'Evenement a été traité enregistré'
                ];
            }

            #Update
            if (isset($request->id)) {

                $id = $request->id;
                $evens = Evenement::where('id', $id)->first();

                $slug = $request->titre;

                #Supprimer les caractères spéciaux et les espaces
                $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
                $slug = str_replace(' ', '', $slug) . time();

                $newFilename = $evens->image;

                #Vérifier si un fichier a été envoyé
                if ($request->hasFile('image')) {

                    $file = $request->file('image');

                    #Déplacer le nouveau fichier vers un emplacement spécifique
                    $path = 'public/uploads';

                    #Renommer le fichier avec le slug
                    $newFilename = $slug .  '.' . $file->getClientOriginalExtension();
                    $file->storeAs($path, $newFilename);

                    #Supprimer l'ancien fichier s'il existe
                    if ($evens->image != 'def.jpg' && Storage::exists('public/uploads/' . $evens->image)) {
                        Storage::delete('public/uploads/' . $evens->image);
                    }

                }

                $evens->titre = $request->titre;
                $evens->libele = $request->libele;
                $evens->date = date('d-m-Y', strtotime($request->date));
                $evens->links = $request->links;
                $evens->image = $newFilename;
                $evens->archive = false;

                $evens->save();

                return [
                    'status' => true,
                    'message' => 'L\'Evenement a été traité mise à jour avec succès.'
                ];
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le modèle evens: ' . $e->getMessage());
            
            # Retourner le message d'erreur
            return [
                'status' => false,
                'message' => 'Une erreur est survenue dans le model evens. Veuillez consulter l\'administrateur pour plus d\'informations. '
            ];
            
        }
    }
}
