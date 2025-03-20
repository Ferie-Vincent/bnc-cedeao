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
    //
    public function home() {
        $actualiteSilder = HomePage::ActualiteSilder();
        $alaune = HomePage::Alaune();
        $plusInfos = HomePage::PlusInfos();
        $avispublication = HomePage::Avispublication();
        $appelOffres = HomePage::AppelOffres();

        return view('pages.home', compact(
            'actualiteSilder','alaune','plusInfos','avispublication','appelOffres'
        ));
    }

    public function article($id) {
        $article = HomePage::firstActualite($id);
        return view('pages.articles', compact(
            'article'
        ));
    }

    public function lesarticles($id) {
        $lesarticlesalaune = HomePage::TagsallArticle($id);
        return view('pages.lesarticles', compact(
            'lesarticlesalaune'
        ));
    }

    public function lespublication(){
        $tousAvispublication = HomePage::TousAvispublication();
        //dd($tousAvispublication);
        return view('pages.lespublications', compact(
            'tousAvispublication'
        ));
    }

    public function lesapplesaoffres(){
        $tousAppelOffres = HomePage::TousAppelOffres();
        return view('pages.lesappeloffres', compact(
            'tousAppelOffres'
        ));
    }

    public function bureau() {
        $cotedivoire = HomePage::AllInfoCotedivoire();
        $mission = Mission::allMission();
        return view('pages.bureau', compact('cotedivoire','mission'));
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

    public function documentTraite() {
        $idCategorie = 1;
        $documents = Documentation::getDocumentBycategorie($idCategorie);
        return view('pages.documentTraite',compact('documents'));
    }

    public function documentJournaux() {
        $idCategorie = 2;
        $documents = Documentation::getDocumentBycategorie($idCategorie);
        return view('pages.documentJournaux',compact('documents'));
    }

    public function documentPolitique() {
        $idCategorie = 3;
        $documents = Documentation::getDocumentBycategorie($idCategorie);
        return view('pages.documentPolitique',compact('documents'));
    }

    public function documentCommunique() {
        $idCategorie = 4;
        $documents = Documentation::getDocumentBycategorie($idCategorie);
        return view('pages.documentCommunique',compact('documents'));
    }

    public function documentTexteJuridique() {
        $idCategorie = 5;
        $documents = Documentation::getDocumentBycategorie($idCategorie);
        return view('pages.documentJuridique',compact('documents'));
    }

    public function documentReglement() {
        $idCategorie = 6;
        $documents = Documentation::getDocumentBycategorie($idCategorie);
        return view('pages.documentReglement',compact('documents'));
    }

    public function Commission() {
        return view('pages.commission');
    }

    public function archives() {
        return view('pages.archives');
    }

    public function statistiques() {
        return view('pages.statistiques');
    }

    public function contact() {
        return view('pages.contact');
    }

    public function passationMarchee() {
        return view('pages.passationmarchees');
    }

    public function carrieres() {
        return view('pages.carrieres');
    }

    public function saveMessage(Request $request){
        try {
            //code...
            $message = Message::createMessage($request);
            return redirect()->back()->with('success', $message['message']);

        } catch (\Throwable $e){
            //throw $th;
           Log::error('Une erreur est survenue dans le modèle Services: ' . $e->getMessage());
        }
    }

    public function saveMailNewletter(Request $request){
        try {
            //code...
            $message = Mail::createMail($request);
            return redirect()->back()->with('success', $message['message']);
        } catch (\Throwable $e) {
            //throw $th;
           Log::error('Une erreur est survenue dans le modèle Services: ' . $e->getMessage());
        }
    }

    
}
