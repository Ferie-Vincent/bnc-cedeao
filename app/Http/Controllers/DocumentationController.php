<?php

namespace App\Http\Controllers;

use App\Models\CategorieDocument;
use App\Models\Documentation;
use App\Models\TypeDeCategorieDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DocumentationController extends Controller
{
    //
    public function Documentations()
    {

        $documents = Documentation::allDocuments();
        $categories = CategorieDocument::allCategorie();
        $typeCategories = TypeDeCategorieDocument::TypeCategorieDocument();
        // dd($documents);
        return view('admin.documentation', compact('documents', 'categories', 'typeCategories'));
    }

    #Documentations
    public function documentation(Request $request)
    {
        try {
            #Intencions la methode pour le traitement
            $documents = Documentation::saveUpdateDeleteDocumentation($request);

            #Gestion d'erreur
            if ($documents['status'] == true) {
                # Success...
                return redirect()->back()->with('success', $documents['message']);
            } else {

                return redirect()->back()->with('error', $documents['message']);
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le controler documents: ' . $e->getMessage());

            #Message error
            return redirect()->back()->with('error', 'Une erreur est survenue dans le controler documents.');
        }
    }
}
