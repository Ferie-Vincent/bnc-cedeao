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
    /**
     * Affiche les paramètres généraux.
     */
    public function index()
    {
        try {
            $typeFlashInfos = TypeFlashInfos::allTypeFlashInfos() ?? [];
            $thematiques = ThematiqueProjet::allThematique() ?? [];
            $categorieDocuments = CategorieDocument::allCategorie() ?? [];
            $typeCategorieDocuments = TypeDeCategorieDocument::allTypeCategorieDocument() ?? [];

            return view('admin.parametre', compact('typeFlashInfos', 'thematiques', 'categorieDocuments', 'typeCategorieDocuments'));
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération des paramètres : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Impossible de charger les paramètres.');
        }
    }

    /**
     * Gestion des types de Flash Infos (Ajout, modification, suppression).
     */
    public function TypeFlashInfos(Request $request)
    {
        try {
            $request->validate([
                'nom' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);

            $typeFlashInfo = TypeFlashInfos::saveUpdateDeleteTypeFlashInfo($request);

            return redirect()->back()->with($typeFlashInfo['status'] ? 'success' : 'error', $typeFlashInfo['message']);
        } catch (\Exception $e) {
            Log::error('Erreur dans le contrôleur paramètre Type Flash Info : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue dans le contrôleur paramètre Type Flash Info.');
        }
    }

    /**
     * Gestion des Thématiques de Projet (Ajout, modification, suppression).
     */
    public function ProjetThematique(Request $request)
    {
        try {
            $request->validate([
                'nom' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);

            $thematique = ThematiqueProjet::saveUpdateDeleteThematique($request);

            return redirect()->back()->with($thematique['status'] ? 'success' : 'error', $thematique['message']);
        } catch (\Exception $e) {
            Log::error('Erreur dans le contrôleur paramètre Projet Thématique : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue dans le contrôleur paramètre Projet Thématique.');
        }
    }

    /**
     * Gestion des Types de Catégories de Document (Ajout, modification, suppression).
     */
    public function TypeCategorieDocument(Request $request)
    {
        try {
            $request->validate([
                'nom' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);

            $typeCategorieDocument = TypeDeCategorieDocument::saveUpdateDeleteTypeCategorieDocument($request);

            return redirect()->back()->with($typeCategorieDocument['status'] ? 'success' : 'error', $typeCategorieDocument['message']);
        } catch (\Exception $e) {
            Log::error('Erreur dans le contrôleur paramètre Documentation : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue dans le contrôleur paramètre Documentation.');
        }
    }
}
