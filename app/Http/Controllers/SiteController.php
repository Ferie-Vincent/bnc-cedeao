<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HomePage;
use App\Models\Service;
use App\Models\Projet;
use Illuminate\Support\Facades\Log;
use App\Models\Message;
use App\Models\Mail;
use App\Models\Documentation;
use App\Models\Album;
use App\Models\Mission;

class SiteController extends Controller
{
    /**
     * Affichage de la page d'accueil
     */
    public function home() {
        try {
            $actualiteSilder = HomePage::ActualiteSilder();
            $alaune = HomePage::Alaune();
            $plusInfos = HomePage::PlusInfos();
            $avispublication = HomePage::Avispublication();
            $appelOffres = HomePage::AppelOffres();

            return view('pages.home', compact(
                'actualiteSilder','alaune','plusInfos','avispublication','appelOffres'
            ));
        } catch (\Exception $e) {
            Log::error('Erreur lors du chargement de la page d\'accueil : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors du chargement de la page.');
        }
    }

    /**
     * Détails d'un article
     */
    public function article($id) {
        try {
            $article = HomePage::firstActualite($id);
            return view('pages.articles', compact('article'));
        } catch (\Exception $e) {
            Log::error('Erreur lors du chargement de l\'article : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Impossible de charger l\'article.');
        }
    }

    /**
     * Liste des articles liés à un tag
     */
    public function lesarticles($id) {
        try {
            $lesarticlesalaune = HomePage::TagsallArticle($id);
            return view('pages.lesarticles', compact('lesarticlesalaune'));
        } catch (\Exception $e) {
            Log::error('Erreur lors du chargement des articles : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Impossible de charger les articles.');
        }
    }

    /**
     * Liste des publications
     */
    public function lespublication(){
        try {
            $tousAvispublication = HomePage::TousAvispublication();
            return view('pages.lespublications', compact('tousAvispublication'));
        } catch (\Exception $e) {
            Log::error('Erreur lors du chargement des publications : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Impossible de charger les publications.');
        }
    }

    /**
     * Liste des appels d'offres
     */
    public function lesapplesaoffres(){
        try {
            $tousAppelOffres = HomePage::TousAppelOffres();
            return view('pages.lesappeloffres', compact('tousAppelOffres'));
        } catch (\Exception $e) {
            Log::error('Erreur lors du chargement des appels d\'offres : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Impossible de charger les appels d\'offres.');
        }
    }

    /**
     * Page du bureau
     */
    public function bureau() {
        try {
            $cotedivoire = HomePage::AllInfoCotedivoire() ?? [];
            $mission = Mission::allMission() ?? [];
            return view('pages.bureau', compact('cotedivoire','mission'));
        } catch (\Exception $e) {
            Log::error('Erreur lors du chargement des informations du bureau : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Impossible de charger les informations du bureau.');
        }
    }

    public function planStrategique() {
        return view('pages.planStrategique');
    }

    public function services() {
        $services = Service::allService();
        return view('pages.services', compact('services'));
    }

    public function projects() {
        $projets = Projet::allProjet();
        return view('pages.projects', compact('projets'));
    }

    public function albums() {
        $albums = Album::allAlbums();
        return view('pages.albums',compact('albums'));
    }

    /**
     * Gestion des documents par catégories
     */
    public function documentByCategorie($idCategorie, $viewName) {
        try {
            $documents = Documentation::getDocumentBycategorie($idCategorie);
            return view($viewName, compact('documents'));
        } catch (\Exception $e) {
            Log::error("Erreur lors du chargement des documents catégorie {$idCategorie} : " . $e->getMessage());
            return redirect()->back()->with('error', 'Impossible de charger les documents.');
        }
    }

    public function documentTraite() { return $this->documentByCategorie(1, 'pages.documentTraite'); }
    public function documentJournaux() { return $this->documentByCategorie(2, 'pages.documentJournaux'); }
    public function documentPolitique() { return $this->documentByCategorie(3, 'pages.documentPolitique'); }
    public function documentCommunique() { return $this->documentByCategorie(4, 'pages.documentCommunique'); }
    public function documentTexteJuridique() { return $this->documentByCategorie(5, 'pages.documentJuridique'); }
    public function documentReglement() { return $this->documentByCategorie(6, 'pages.documentReglement'); }

    public function Commission() { return view('pages.commission'); }
    public function archives() { return view('pages.archives'); }
    public function statistiques() { return view('pages.statistiques'); }
    public function contact() { return view('pages.contact'); }
    public function passationMarchee() { return view('pages.passationmarchees'); }
    public function carrieres() { return view('pages.carrieres'); }

    /**
     * Enregistrement d'un message de contact
     */
    public function saveMessage(Request $request){
        try {
            $request->validate([
                'nom' => 'required|string|max:255',
                'email' => 'required|email',
                'message' => 'required|string',
            ]);

            $message = Message::createMessage($request);
            return redirect()->back()->with('success', $message['message']);

        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'enregistrement du message : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'envoi du message.');
        }
    }

    /**
     * Enregistrement d'un email pour la newsletter
     */
    public function saveMailNewletter(Request $request){
        try {
            $request->validate([
                'email' => 'required|email|unique:mails,email',
            ]);

            $message = Mail::createMail($request);
            return redirect()->back()->with('success', $message['message']);
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'enregistrement de l\'email newsletter : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'inscription à la newsletter.');
        }
    }
}
