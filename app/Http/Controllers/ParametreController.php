<?php

namespace App\Http\Controllers;

use App\Models\CategorieDocument;
use App\Models\ThematiqueProjet;
use App\Models\TypeDeCategorieDocument;
use App\Models\TypeFlashInfos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ParametreController extends Controller
{
    //
    public function index()
    {
        $typeFlashInfos = TypeFlashInfos::allTypeFlashInfos();
        $thematiques = ThematiqueProjet::allThematique();
        $categorieDocuments = CategorieDocument::allCategorie();
        $typeCategorieDocuments =  TypeDeCategorieDocument::allTypeCategorieDocument();
        return view('admin.parametre', compact('typeFlashInfos', 'thematiques', 'categorieDocuments', 'typeCategorieDocuments'));
    }

    #Flashs infos
    public function TypeFlashInfos(Request $request)
    {
        try {
            #Intencions la methode pour le traitement
            $typeFlashInfo = TypeFlashInfos::saveUpdateDeleteTypeFlashInfo($request);

            #Gestion d'erreur
            if ($typeFlashInfo['status'] == true) {
                # Success...
                return redirect()->back()->with('success', $typeFlashInfo['message']);
            } else {

                return redirect()->back()->with('error', $typeFlashInfo['message']);
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le controler parametre Type Flash Info: ' . $e->getMessage());

            #Message error
            return redirect()->back()->with('error', 'Une erreur est survenue dans le controler parametre Type Flash Info.');
        }
    }
    
    
    #Projets Thématique
    public function PojetThematique(Request $request)
    {
        try {
            #Intencions la methode pour le traitement
            $thematique = ThematiqueProjet::saveUpdateDeleteThematique($request);

            #Gestion d'erreur
            if ($thematique['status'] == true) {
                # Success...
                return redirect()->back()->with('success', $thematique['message']);
            } else {

                return redirect()->back()->with('error', $thematique['message']);
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le controler parametre projet thématique: ' . $e->getMessage());

            #Message error
            return redirect()->back()->with('error', 'Une erreur est survenue dans le controler parametre projet thématique.');
        }
    }
    
    #Documentation
    public function TypeCategorieDocument(Request $request)
    {
        try {
            #Intencions la methode pour le traitement
            $typeCategorieDocument = TypeDeCategorieDocument::saveUpdateDeleteTypeCategorieDocument($request);

            #Gestion d'erreur
            if ($typeCategorieDocument['status'] == true) {
                # Success...
                return redirect()->back()->with('success', $typeCategorieDocument['message']);
            } else {

                return redirect()->back()->with('error', $typeCategorieDocument['message']);
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le controler parametre documentation: ' . $e->getMessage());

            #Message error
            return redirect()->back()->with('error', 'Une erreur est survenue dans le controler paramettre documentation.');
        }
    }
}
