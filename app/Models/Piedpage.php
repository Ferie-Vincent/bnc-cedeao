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

    # Sélectionner tous les Pied de pages
    public static function allPiedpage()
    {
        $categories = CategoriePiedDePage::allCategorie();
        
        $piedPages = [];

        foreach ($categories as $categorie) {
            $pieds = Piedpage::where('idCategorie', $categorie->id)
                ->where('archive', false)
                ->get();
                
            foreach ($pieds as $pied) {
                $piedPages[$categorie->id][] = [
                    'idCategorie' => $pied->idCategorie ?? null,
                    'id' => $pied->id ?? null,
                    'categorie' => $categorie->titre ?? null,
                    'nom' => $pied->nom ?? null,
                    'nomAfficher' => $pied->nomAfficher ?? null,
                    'linkS' => $pied->linkS ?? null,
                ];
            }
        }
        // dd($piedPages);
        return $piedPages;
    }



    #Save || Update || Delete
    public static function saveUpdateDeletePiedpage($request)
    {
        try {

            #Archive
            if (isset($request->id) && isset($request->archive) == true) {
                # Archive

                $piedPage = Piedpage::find($request->id);

                if ($piedPage) {
                    $piedPage->archive = true;
                    $piedPage->save();

                    return [
                        'status' => true,
                        'message' => 'Le Pied de page a été archivé avec succès.',
                    ];
                } else {
                    return [
                        'status' => false,
                        'message' => 'Pied de page non trouvé.',
                    ];
                }
            }

            #Save
            if (!isset($request->id)) {



                $piedPage = new Piedpage();

                $piedPage->idCategorie = $request->categorie;
                $piedPage->nom = $request->nom;
                $piedPage->nomAfficher = $request->nomAfficher;
                $piedPage->linkS = $request->linkS;
                $piedPage->archive = false;

                $piedPage->save();

                return [
                    'status' => true,
                    'message' => 'Le Pied de page a été traité enregistré'
                ];
            }

            #Update
            if (isset($request->id)) {

                $id = $request->id;
                $piedPage = Piedpage::where('id', $id)->first();


                $piedPage->idCategorie = $request->categorie;
                $piedPage->nom = $request->nom;
                $piedPage->nomAfficher = $request->nomAfficher;
                $piedPage->linkS = $request->linkS;
                $piedPage->archive = false;

                $piedPage->save();

                return [
                    'status' => true,
                    'message' => 'Le Pied page a été traité mise à jour avec succès.'
                ];
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le modèle Pied page: ' . $e->getMessage());

            # Retourner le message d'erreur
            return [
                'status' => false,
                'message' => 'Une erreur est survenue dans le model Pied page. Veuillez consulter l\'administrateur pour plus d\'informations. '
            ];
        }
    }
}
