<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class TypeDeCategorieDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'archive',
    ];

    #Selectionner toutes les données de type catégorie document
    public static function allTypeCategorieDocument()
    {
        $categories = [];

        // Récupérer toutes les catégories de documentation
        $categorieDocuments = CategorieDocument::allCategorie();

        foreach ($categorieDocuments as $categorie) {
            // Récupérer les types de catégorie de document pour cette catégorie
            $typeCategorieDocuments = TypeDeCategorieDocument::where('idCategorie', $categorie->id)
                ->where('archive', false)
                ->get();

            if ($typeCategorieDocuments->isEmpty()) {
                // Si la catégorie n'a pas de types de catégorie, ajoutez une entrée avec 'null' dans le tableau
                $categories[$categorie->id][] = [
                    'idCategorie' => $categorie->id ?? null,
                    'categorie' => $categorie->titre ?? null,
                    'id' => null,
                    'typeCategorie' => null,
                ];
            } else {
                foreach ($typeCategorieDocuments as $typeCategorie) {
                    // Créer un tableau associatif pour chaque type de catégorie
                    $categories[$categorie->id][] = [
                        'idCategorie' => $categorie->id ?? null,
                        'categorie' => $categorie->titre ?? null,
                        'id' => $typeCategorie->id ?? null,
                        'typeCategorie' => $typeCategorie->titre ?? null,
                    ];
                }
            }
        }

        return $categories;
    }

    public static function TypeCategorieDocument(){

        $typeCategorieDocuments = TypeDeCategorieDocument::where('archive', false)->get();
        
        return $typeCategorieDocuments;
    }


    #Save || Update || Delete
    public static function saveUpdateDeleteTypeCategorieDocument($request)
    {
        try {

            #Archive
            if (isset($request->id) && isset($request->archive) == true) {
                # Archive

                $typeCategorieDocument = TypeDeCategorieDocument::find($request->id);

                if ($typeCategorieDocument) {
                    $typeCategorieDocument->archive = true;
                    $typeCategorieDocument->save();

                    return [
                        'status' => true,
                        'message' => 'La catégorie type document a été archivé avec succès.',
                    ];
                } else {
                    return [
                        'status' => false,
                        'message' => 'La catégorie type document non trouvé.',
                    ];
                }
            }

            #Save
            if (!isset($request->id)) {

                $typeCategorieDocument = new TypeDeCategorieDocument();

                $typeCategorieDocument->idCategorie = $request->idCategorie;
                $typeCategorieDocument->titre = $request->titre;
                $typeCategorieDocument->archive = false;

                $typeCategorieDocument->save();

                return [
                    'status' => true,
                    'message' => 'La catégorie type document a été traité enregistré'
                ];
            }

            #Update
            if (isset($request->id)) {

                $id = $request->id;
                $typeCategorieDocument = TypeDeCategorieDocument::where('id', $id)->first();

                $typeCategorieDocument->idCategorie = $request->idCategorie;
                $typeCategorieDocument->titre = $request->titre;
                $typeCategorieDocument->archive = false;

                $typeCategorieDocument->save();

                return [
                    'status' => true,
                    'message' => 'La catégorie type document a été traité mise à jour avec succès.'
                ];
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le modèle type catégorie document: ' . $e->getMessage());

            # Retourner le message d'erreur
            return [
                'status' => false,
                'message' => 'Une erreur est survenue dans le model type catégorie document. Veuillez consulter l\'administrateur pour plus d\'informations. '
            ];
        }
    }
}
