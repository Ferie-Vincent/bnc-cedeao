<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\{Actualite, Appel_offre, Avis_publication, Cote_ivoire, Evenement, Flash_infos, Magazine_cedeao, Recrutement_cedeao, Tags, TypeFlashInfos};

class AdminController extends Controller
{
    public function Administration()
    {
        try {
            $data = [
                'actualites' => Actualite::allactualites() ?? [],
                'flashInfos' => Flash_infos::allFashInfo() ?? [],
                'typeFlashInfos' => TypeFlashInfos::allTypeFlashInfos() ?? [],
                'avisPublications' => Avis_publication::allAvisPublication() ?? [],
                'appelOffres' => Appel_offre::allAppelOffre() ?? [],
                'recrutements' => Recrutement_cedeao::allRecrutementCEDEAO() ?? [],
                'evens' => Evenement::allEvens() ?? [],
                'magazines' => Magazine_cedeao::allMagazine() ?? [],
                'coteIvoires' => Cote_ivoire::allCoteIvoire() ?? [],
                'tags' => Tags::allTags() ?? [],
            ];

            return view('admin.home', $data);
        } catch (\Exception $e) {
            Log::error("Erreur dans le contrôleur Admin: {$e->getMessage()}");
            return response()->json(['status' => false, 'message' => 'Une erreur est survenue.']);
        }
    }

    private function handleRequest(Request $request, $model, $validationRules, $method)
    {
        try {
            $request->validate($validationRules);
            $response = $model::$method($request);

            return redirect()->back()->with($response['status'] ? 'success' : 'error', $response['message']);
        } catch (\Exception $e) {
            Log::error("Erreur dans le contrôleur {$model}: {$e->getMessage()}");
            return redirect()->back()->with('error', "Une erreur est survenue.");
        }
    }

    public function Actualite(Request $request)
    {
        //dd($request->all());
        return $this->handleRequest($request, Actualite::class, [
            'auteur' => 'required', 'appelTitre' => 'required', 'title' => 'required', 'legende' => 'required',
            'chapeau' => 'required', 'corpsTexte' => 'required', 'date' => 'required|date', 'tags' => ''
        ], 'saveUpdateDeleteActualites');
    }

    public function FlashInfos(Request $request)
    {
        return $this->handleRequest($request, Flash_infos::class, [
            'type' => 'required', 'corpsTexte' => 'required', 'date' => 'required'
        ], 'saveUpdateDeleteFlashInfo');
    }

    public function AvisPublication(Request $request)
    {
        return $this->handleRequest($request, Avis_publication::class, [
            'titre' => 'required', 'date' => 'required|date', 'contenu' => 'required'
        ], 'saveUpdateDeleteAvisPublication');
    }

    public function AppelOffre(Request $request)
    {
        return $this->handleRequest($request, Appel_offre::class, [
            'titre' => 'required', 'date' => 'required|date', 'contenu' => 'required'
        ], 'saveUpdateDeleteAppelOffre');
    }

    public function RecrutementCEDEAO(Request $request)
    {
        return $this->handleRequest($request, Recrutement_cedeao::class, [
            'titre' => 'required', 'date' => 'required', 'contenu' => 'required', 'links' => 'required'
        ], 'saveUpdateDeleteRecrutementCEDEAO');
    }

    public function Evenement(Request $request)
    {
        return $this->handleRequest($request, Evenement::class, [
            'titre' => 'required', 'libele' => 'required', 'date' => 'required', 'links' => 'required'
        ], 'saveUpdateDeleteEvens');
    }

    public function Magazine(Request $request)
    {
        return $this->handleRequest($request, Magazine_cedeao::class, [
            'titre' => 'required', 'date' => 'required|date', 'contenu' => 'required'
        ], 'saveUpdateDeleteMagazine');
    }

    public function CoteIvoire(Request $request)
    {
        return $this->handleRequest($request, Cote_ivoire::class, [
            'chefGouvernement' => 'required', 'gouvernement' => 'required', 'capitalePolitique' => 'required',
            'superficie' => 'required', 'population' => 'required', 'independanceDay' => 'required',
            'langOfficielle' => 'required', 'langParle' => 'required', 'esperanceVie' => 'required',
            'pipHabitant' => 'required', 'tauxCroissanceAnnuel' => 'required', 'monnaie' => 'required',
            'indiceDeveHumain' => 'required', 'fuseauHoraire' => 'required', 'websiteGouvernement' => 'required',
            'ministery' => 'required', 'ministerName' => 'required', 'ministerAdress' => 'required',
            'ministerTel' => 'required', 'ministerFax' => 'required', 'ministerEmail' => 'required',
            'ministerOfficialWebsite' => 'required', 'managerBnc' => 'required', 'managerBncFunction' => 'required',
            'managerBncTel' => 'required', 'managerBncFax' => 'required', 'managerBncEmail' => 'required',
            'managerBncOfficialWebsite' => 'required', 'outCedeao' => 'required', 'outCedeaoAdresse' => 'required',
            'outCedeaoTel' => 'required', 'outCedeaoFax' => 'required', 'outCedeaoMail' => 'required',
            'inCedeao' => 'required', 'inCedeaoAdresse' => 'required', 'inCedeaoMail' => 'required'
        ], 'saveUpdateDeleteCoteIvoire');
    }
}
