<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MissionController extends Controller
{
    /**
     * Affiche la liste des missions.
     */
    public function Mission()
    {
        try {
            $missions = Mission::allMission() ?? [];
            return view('admin.mission', compact('missions'));
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération des missions : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Impossible de récupérer les missions.');
        }
    }

    /**
     * Gère la création, mise à jour ou suppression d'un plan stratégique.
     */
    public function PlanStrategies(Request $request)
    {
        try {
            // Validation des données reçues
            $request->validate([
                'titre' => 'required|string|max:255',
                'description' => 'nullable|string',
                'date' => 'required|date',
            ]);

            // Traitement de la mission
            $planStrategie = Mission::saveUpdateDeleteMission($request);

            return redirect()->back()->with($planStrategie['status'] ? 'success' : 'error', $planStrategie['message']);
        } catch (\Exception $e) {
            Log::error('Erreur dans le contrôleur Mission : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue dans le contrôleur Mission.');
        }
    }
}
