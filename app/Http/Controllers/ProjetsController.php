<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\ThematiqueProjet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjetsController extends Controller
{
    //
    public function Projets(){
        $projets = Projet::allProjet();
        $thematiques = ThematiqueProjet::allThematique();
        return view('admin.projets', compact('projets', 'thematiques'));
    }

    #Projets
    public function projet(Request $request){
        try {
            #Intencions la methode pour le traitement
            $projet = Projet::saveUpdateDeleteProjet($request);
            #Gestion d'erreur
            if ($projet['status'] == true) {
                # Success...
                return redirect()->back()->with('success', $projet['message']);
            } else {
                return redirect()->back()->with('error', $projet['message']);
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le controler projet: ' . $e->getMessage());
            #Message error
            return redirect()->back()->with('error', 'Une erreur est survenue dans le controler projet.');
        }
    }
}
