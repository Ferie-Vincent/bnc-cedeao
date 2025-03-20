<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class MissionController extends Controller
{
    //
    public function Mission(){
        $missions = Mission::allMission();
        return view('admin.mission', compact('missions'));
    }

    #Plan Stratégique
    public function PlanStrategies(Request $request){
        try {
            #Intencions la methode pour le traitement
            $planStrategie = Mission::saveUpdateDeleteMission($request);

            #Gestion d'erreur
            if ($planStrategie['status'] == true) {
                # Success...
                return redirect()->back()->with('success', $planStrategie['message']);
            } else {

                return redirect()->back()->with('error', $planStrategie['message']);
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le controler Mission: ' . $e->getMessage());

            #Message error
            return redirect()->back()->with('error', 'Une erreur est survenue dans le controler Mission.');
        }
    }
}
