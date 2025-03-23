<?php

namespace App\Http\Controllers;

use App\Models\CategorieDocument;
use App\Models\Documentation;
use App\Models\TypeDeCategorieDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DocumentationController extends Controller
{
    /**
     * Affiche la liste des documents, catégories et types de catégories.
     */
    public function Documentations()
    {
        try {
            $documents = Documentation::allDocuments() ?? [];
            $categories = CategorieDocument::allCategorie() ?? [];
            $typeCategories = TypeDeCategorieDocument::TypeCategorieDocument() ?? [];

            return view('admin.documentation', compact('documents', 'categories', 'typeCategories'));
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération des documents : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Impossible de récupérer les documents.');
        }
    }

    /**
     * Gère la création, mise à jour ou suppression d'un document.
     */
    public function documentation(Request $request)
    {
        try {
            // Validation des données reçues
            $request->validate([
                'titre' => 'required|string|max:255',
                'description' => 'nullable|string',
                'categorie_id' => 'required|integer|exists:categorie_documents,id',
                'type_categorie_id' => 'required|integer|exists:type_de_categorie_documents,id',
                'fichier' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx|max:2048', // Fichiers acceptés jusqu'à 2Mo
            ]);

            // Traitement du document
            $documents = Documentation::saveUpdateDeleteDocumentation($request);

            return redirect()->back()->with($documents['status'] ? 'success' : 'error', $documents['message']);
        } catch (\Exception $e) {
            Log::error('Erreur dans le contrôleur documents : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue dans le contrôleur documents.');
        }
    }
}
