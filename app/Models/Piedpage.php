<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Piedpage extends Model
{
    use HasFactory;

    protected $fillable = [
        'idCategorie',
        'nom',
        'nomAfficher',
        'linkS',
        'archive',
    ];

    # Sélectionner tous les Pieds de page
    public static function allPiedpage()
    {
        $categories = CategoriePiedDePage::allCategorie();
        $piedPages = [];

        foreach ($categories as $categorie) {
            $pieds = self::where('idCategorie', $categorie->id)
                ->where('archive', false)
                ->get();

            foreach ($pieds as $pied) {
                $piedPages[$categorie->id][] = [
                    'idCategorie' => $pied->idCategorie,
                    'id' => $pied->id,
                    'categorie' => $categorie->titre,
                    'nom' => $pied->nom,
                    'nomAfficher' => $pied->nomAfficher,
                    'linkS' => $pied->linkS,
                ];
            }
        }

        return $piedPages;
    }

    # Enregistrer, Mettre à jour ou Archiver un Pied de page
    public static function saveUpdateDeletePiedpage($request)
    {
        try {
            // Vérifier si l'ID est fourni (mise à jour ou suppression)
            if (isset($request->id)) {
                $piedPage = self::find($request->id);

                if (!$piedPage) {
                    return [
                        'status' => false,
                        'message' => 'Pied de page non trouvé.',
                    ];
                }

                // Archiver l'entrée
                if ($request->archive == true) {
                    $piedPage->update(['archive' => true]);

                    return [
                        'status' => true,
                        'message' => 'Le Pied de page a été archivé avec succès.',
                    ];
                }

                // Mise à jour
                $piedPage->update([
                    'idCategorie' => $request->categorie,
                    'nom' => $request->nom,
                    'nomAfficher' => $request->nomAfficher,
                    'linkS' => $request->linkS,
                    'archive' => false,
                ]);

                return [
                    'status' => true,
                    'message' => 'Le Pied de page a été mis à jour avec succès.',
                ];
            }

            // Création d'un nouveau Pied de page
            self::create([
                'idCategorie' => $request->categorie,
                'nom' => $request->nom,
                'nomAfficher' => $request->nomAfficher,
                'linkS' => $request->linkS,
                'archive' => false,
            ]);

            return [
                'status' => true,
                'message' => 'Le Pied de page a été enregistré avec succès.',
            ];
        } catch (\Exception $e) {
            Log::error('Une erreur est survenue dans le modèle Piedpage: ' . $e->getMessage());

            return [
                'status' => false,
                'message' => 'Une erreur est survenue. Veuillez contacter l\'administrateur.',
            ];
        }
    }
}
