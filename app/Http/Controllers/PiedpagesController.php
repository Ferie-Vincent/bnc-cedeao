<?php

namespace App\Http\Controllers;

use App\Models\CategoriePiedDePage;
use App\Models\Piedpage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PiedpagesController extends Controller
{
    //
    public function PieddePage()
    {
        $piedPages = Piedpage::allPiedpage();
        $categories = CategoriePiedDePage::allCategorie();
        return view('admin.piedpages', compact('piedPages', 'categories'));
    }

    #Pied de page
    public function piedDePages(Request $request)
    {
        try {
            #Intencions la methode pour le traitement
            $piedPage = Piedpage::saveUpdateDeletePiedpage($request);

            #Gestion d'erreur
            if ($piedPage['status'] == true) {
                # Success...
                return redirect()->back()->with('success', $piedPage['message']);
            } else {

                return redirect()->back()->with('error', $piedPage['message']);
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le controler pied de Page: ' . $e->getMessage());

            #Message error
            return redirect()->back()->with('error', 'Une erreur est survenue dans le controler pied de Page.');
        }
    }
}
