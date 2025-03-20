<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ServicesController extends Controller
{
    //
    public function Services(){
        $services = Service::allservice();
        return view('admin.services', compact('services'));
    }

    #Services 
    public function Service(Request $request)
    {
        try {
            
            #Récuperation et validation des données du formulaire
            $request->validate([
                'service' => 'required',
                'contenu' => 'required',
            ]);


            #Instancions la methode pour le traitement
            $services = Service::saveUpdateDeleteSercive($request);

            #Gestion d'erreur
            if ($services['status'] == true) {
                # Success...
                return redirect()->back()->with('success', $services['message']);
            } else {

                return redirect()->back()->with('error', $services['message']);
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le controler Service: ' . $e->getMessage());

            #Message error
            return redirect()->back()->with('error', 'Une erreur est survenue dans le controler Service.');
        }
    }
}
