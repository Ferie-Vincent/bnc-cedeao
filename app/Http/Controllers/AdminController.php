<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Appel_offre;
use App\Models\Avis_publication;
use App\Models\Cote_ivoire;
use App\Models\Evenement;
use App\Models\Flash_infos;
use App\Models\Magazine_cedeao;
use App\Models\Recrutement_cedeao;
use App\Models\Tags;
use App\Models\TypeFlashInfos;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;



class AdminController extends Controller
{
    //
    public function Administration()
    {
        try {
            $actualites = Actualite::allactualites();
            $flashInfos = Flash_infos::allFashInfo();
            $typeFlashInfos = TypeFlashInfos::allTypeFlashInfos();
            $avisPublications = Avis_publication::allAvisPublication();
            $appelOffres = Appel_offre::allAppelOffre();
            $recrutements = Recrutement_cedeao::allRecrutementCEDEAO();
            $evens = Evenement::allEvens();
            $magazines = Magazine_cedeao::allMagazine();
            $coteIvoires = Cote_ivoire::allCoteIvoire();
            $tags = Tags::allTags();

            return view('admin.home', compact('actualites', 'flashInfos', 'typeFlashInfos', 'avisPublications', 'appelOffres', 'recrutements', 'evens', 'magazines', 'coteIvoires', 'tags'));
        } catch (\Exception $e) {
            //throw $th;
            return [
                'status' => false,
                'message' => 'Une erreur est survenue dans le controler Admin:' . $e->getMessage()
            ];
        }
    }

    #ACTUALITÉS 
    public function Actualite(Request $request)
    {
        try {

            #Récuperation et validation des données du formulaire
            $request->validate([
                'auteur' => 'required',
                'appelTitre' => 'required',
                'title' => 'required',
                'legende' => 'required',
                'chapeau' => 'required',
                'corpsTexte' => 'required',
                'date' => 'required|date',
                'tags' => 'required',
            ]);


            #Instancions la methode pour le traitement
            $actualites = Actualite::saveUpdateDeleteActualites($request);

            #Gestion d'erreur
            if ($actualites['status'] == true) {
                # Success...
                return redirect()->back()->with('success', $actualites['message']);
            } else {

                return redirect()->back()->with('error', $actualites['message']);
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le controler Actualité: ' . $e->getMessage());

            #Message error
            return redirect()->back()->with('error', 'Une erreur est survenue dans le controler Actualité.');
        }
    }

    #FLASH-INFOS
    public function FlashInfos(Request $request)
    {
        // dd($request->all());
        try {
            #Récuperation et validation
            $request->validate([
                'type' => 'required',
                'corpsTexte' => 'required',
                'date' => 'required',
            ]);

            #Instancions la methode pour le traitement
            $flashInfos = Flash_infos::saveUpdateDeleteFlashInfo($request);

            #Gestion des erreurs
            if ($flashInfos['status'] == true) {
                # Success...
                return redirect()->back()->with('success', $flashInfos['message']);
            } else {
                return redirect()->back()->with('error', $flashInfos['message']);
            }
        } catch (\Exception $e) {

            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le controler Flash-Infos: ' . $e->getMessage());

            #Message error
            return redirect()->back()->with('error', 'Une erreur est survenue dans le controler Flash-Infos.');
        }
    }

    #AVIS DE PUBLICATION
    public function AvisPublication(Request $request)
    {
        try {
            #Récuperation et validation des données du formulaire
            $request->validate([
                'titre' => 'required',
                'date' => 'required|date',
                'contenu' => 'required',
            ]);


            #Instancions la methode pour le traitement
            $avisPublication = Avis_publication::saveUpdateDeleteAvisPublication($request);

            #Gestion d'erreur
            if ($avisPublication['status'] == true) {
                # Success...
                return redirect()->back()->with('success', $avisPublication['message']);
            } else {

                return redirect()->back()->with('error', $avisPublication['message']);
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le controler Avis Publication: ' . $e->getMessage());

            #Message error
            return redirect()->back()->with('error', 'Une erreur est survenue dans le controler Avis Publication.');
        }
    }

    #APPEL D'OFFRES
    public function AppelOffre(Request $request)
    {
        try {
            #Récuperation et validation des données du formulaire
            $request->validate([
                'titre' => 'required',
                'date' => 'required|date',
                'contenu' => 'required',
            ]);


            #Instancions la methode pour le traitement
            $appelOffre = Appel_offre::saveUpdateDeleteAppelOffre($request);

            #Gestion d'erreur
            if ($appelOffre['status'] == true) {
                # Success...
                return redirect()->back()->with('success', $appelOffre['message']);
            } else {

                return redirect()->back()->with('error', $appelOffre['message']);
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le controler appel Offr: ' . $e->getMessage());

            #Message error
            return redirect()->back()->with('error', 'Une erreur est survenue dans le controler appel Offre.');
        }
    }

    #RECRUTEMENT CEDEAO 
    public function RecrutementCEDEAO(Request $request)
    {

        try {
            #Vérification et validation
            $request->validate([
                'titre',
                'date',
                'contenu',
                'links',
            ]);

            #Instancions la methode pour le traitement
            $recrutement = Recrutement_cedeao::saveUpdateDeleteRecrutementCEDEAO($request);

            #Gestion des erreurs
            if ($recrutement['status'] == true) {
                # success...
                return redirect()->back()->with('success', $recrutement['message']);
            } else {
                #error
                return redirect()->back()->with('error', $recrutement['message']);
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le controler RECRUTEMENT CEDEAO: ' . $e->getMessage());

            #Message error
            return redirect()->back()->with('error', 'Une erreur est survenue dans le controler RECRUTEMENT CEDEAO.');
        }
    }

    #ÉVÈNEMENT À VENIR 
    public function Evenement(Request $request)
    {

        try {
            #Vérification et validation
            $request->validate([
                'titre',
                'libele',
                'date',
                'links',
            ]);

            #Instancions la methode pour le traitement
            $evens = Evenement::saveUpdateDeleteEvens($request);

            #Gestion des erreurs
            if ($evens['status'] == true) {
                # success...
                return redirect()->back()->with('success', $evens['message']);
            } else {
                #error
                return redirect()->back()->with('error', $evens['message']);
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le controler Evenement: ' . $e->getMessage());

            #Message error
            return redirect()->back()->with('error', 'Une erreur est survenue dans le controler Evenement.');
        }
    }

    #LE MAGAZINE DE LA CEDEAO
    public function Magazine(Request $request)
    {
        try {
            #Récuperation et validation des données du formulaire
            $request->validate([
                'titre' => 'required',
                'date' => 'required|date',
                'contenu' => 'required',
            ]);


            #Instancions la methode pour le traitement
            $magazine = Magazine_cedeao::saveUpdateDeleteMagazine($request);

            #Gestion d'erreur
            if ($magazine['status'] == true) {
                # Success...
                return redirect()->back()->with('success', $magazine['message']);
            } else {

                return redirect()->back()->with('error', $magazine['message']);
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le controler LE MAGAZINE DE LA CEDEAO: ' . $e->getMessage());

            #Message error
            return redirect()->back()->with('error', 'Une erreur est survenue dans le controler LE MAGAZINE DE LA CEDEAO.');
        }
    }

    #LA CÔTE D'IVOIRE
    public function CoteIvoire(Request $request)
    {
        try {
            #Récuperation et validation des données du formulaire
            $request->validate([
                'chefGouvernement' => 'required',
                'gouvernement' => 'required',
                'capitalePolitique' => 'required',
                'superficie' => 'required',
                'population' => 'required',
                'independanceDay' => 'required',
                'langOfficielle' => 'required',
                'langParle' => 'required',
                'esperanceVie' => 'required',
                'pipHabitant' => 'required',
                'tauxCroissanceAnnuel' => 'required',
                'monnaie' => 'required',
                'indiceDeveHumain' => 'required',
                'fuseauHoraire' => 'required',
                'websiteGouvernement' => 'required',
                'ministery' => 'required',
                'ministerName' => 'required',
                'ministerAdress' => 'required',
                'ministerTel' => 'required',
                'ministerFax' => 'required',
                'ministerEmail' => 'required',
                'ministerOfficialWebsite' => 'required',
                'managerBnc' => 'required',
                'managerBncFunction' => 'required',
                'managerBncTel' => 'required',
                'managerBncFax' => 'required',
                'managerBncEmail' => 'required',
                'managerBncOfficialWebsite' => 'required',
                'outCedeao' => 'required',
                'outCedeaoAdresse' => 'required',
                'outCedeaoTel' => 'required',
                'outCedeaoFax' => 'required',
                'outCedeaoMail' => 'required',
                'inCedeao' => 'required',
                'inCedeaoAdresse' => 'required',
                'inCedeaoMail' => 'required',
            ]);


            #Instancions la methode pour le traitement
            $coteIvoire = Cote_ivoire::saveUpdateDeleteCoteIvoire($request);

            #Gestion d'erreur
            if ($coteIvoire['status'] == true) {
                # Success...
                return redirect()->back()->with('success', $coteIvoire['message']);
            } else {

                return redirect()->back()->with('error', $coteIvoire['message']);
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le controler LA CÔTE D IVOIRE: ' . $e->getMessage());

            #Message error
            return redirect()->back()->with('error', 'Une erreur est survenue dans le controler LA CÔTE D IVOIRE.');
        }
    }
}
