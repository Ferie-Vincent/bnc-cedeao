<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DecretController;
use App\Http\Controllers\ProjetsController;
use App\Http\Controllers\AlbumeController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\PiedpagesController;
use App\Http\Controllers\ParametreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {
    return view('pages.home');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/administration','index')->name('login');
    Route::post('/login','login')->name('connexion');
    Route::get('/deconnexion','logout')->name('deconnexion');
});


Route::middleware(Authenticate::class)->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/tableau_de_gestion', 'Administration');
        Route::post('/actualite', 'Actualite');
        Route::put('/actualite', 'Actualite');
        Route::delete('/archive_actualite', 'Actualite');
    
        Route::post('/flash_infos', 'FlashInfos');
        Route::put('/flash_infos', 'FlashInfos');
        Route::delete('/archive_flash_infos', 'FlashInfos');
        
        Route::post('/avis_publication', 'AvisPublication');
        Route::put('/avis_publication', 'AvisPublication');
        Route::delete('/archive_avis', 'AvisPublication');
        
        Route::post('/appel_offre', 'AppelOffre');
        Route::put('/appel_offre', 'AppelOffre');
        Route::delete('/archive_offre', 'AppelOffre');
        
        Route::post('/recrutement_cedeao', 'RecrutementCEDEAO');
        Route::put('/recrutement_cedeao', 'RecrutementCEDEAO');
        Route::delete('/archive_recrutement', 'RecrutementCEDEAO');
        
        Route::post('/evens', 'Evenement');
        Route::put('/evens', 'Evenement');
        Route::delete('/archive_evens', 'Evenement');
        
        Route::post('/magazine', 'Magazine');
        Route::put('/magazine', 'Magazine');
        Route::delete('/archive_magazine', 'Magazine');
        
        Route::put('/cote_ivoire', 'CoteIvoire');
    });
    
    // MISSION
    Route::controller(MissionController::class)->group(function () {
        Route::get('/mission', 'Mission');
        Route::put('/plan_strategie', 'PlanStrategies');
    });

     // ATTRIBUTIONS
    Route::controller(ServicesController::class)->group(function () {
        Route::get('/admin_services', 'Services');
        Route::post('/service', 'Service');
        Route::put('/service', 'Service');
        Route::delete('/archive_service', 'Service');
    });
     

     // DIRECTIONS
    Route::controller(ProjetsController::class)->group(function () {
        Route::get('/admin_projet', 'Projets');
        Route::post('/projet', 'projet');
        Route::put('/projet', 'projet');
        Route::delete('/archive_projet', 'projet');
    });
     

     // DOCUMENTATIONS
     Route::controller(DocumentationController::class)->group(function () {
        Route::get('/documentations', 'Documentations');
        Route::post('/documentation', 'documentation');
        Route::put('/documentation', 'documentation');
        Route::delete('/archive_documentation', 'documentation');
     });
     

     // ALBUME
     Route::controller(AlbumeController::class)->group(function () {
        Route::get('/albume', 'Albume');
        Route::post('/album', 'albumes');
        Route::put('/album', 'albumes');
        Route::delete('/archive_album', 'albumes');
     });


     // PIED DE PAGESS
     Route::controller(PiedpagesController::class)->group(function () {
        Route::get('/pied_de_pages', 'PieddePage');
        Route::post('/pied', 'piedDePages');
        Route::put('/pied', 'piedDePages');
        Route::delete('/archive_pied', 'piedDePages');
     });


     // COMMENTAIRES
     Route::controller(CommentaireController::class)->group(function () {
        Route::get('/commentaires', 'Commentaires');
     });

     // DECRET
     Route::controller(DecretController::class)->group(function () {
        Route::get('/decret', 'Decret');
     });
     
     // CONTACT
     Route::controller(ContactController::class)->group(function () {
        Route::get('/contacts', 'Contact');
        Route::post('/sendMessage', 'SendMail');
        Route::delete('/archive_message', 'SendMail');
     });

     // PARAMETRE
     Route::controller(ParametreController::class)->group(function () {
        Route::get('/parametre','index');

        // Flash Info
        Route::post('/type_flash_info', 'TypeFlashInfos');
        Route::put('/type_flash_info', 'TypeFlashInfos');
        Route::delete('/archive_type_flash_info', 'TypeFlashInfos');
        
        // Projet Thématique
        Route::post('/projet_thematique', 'PojetThematique');
        Route::put('/projet_thematique', 'PojetThematique');
        Route::delete('/archive_projet_thematique', 'PojetThematique');
        
        // Documentation
        Route::post('/type_categorie_document', 'TypeCategorieDocument');
        Route::put('/type_categorie_document', 'TypeCategorieDocument');
        Route::delete('/archive_type_categorie_document', 'TypeCategorieDocument');
     });
     
});

Route::controller(SiteController::class)->group(function () {
    Route::get('/','home');
    Route::get('/bureau', 'bureau');
    Route::get('/planStrategique', 'planStrategique');
    Route::get('/services', 'services');
    Route::get('/projects', 'projects');
    Route::get('/albums', 'albums');
 
    Route::get('/archives', 'archives');
    Route::get('/statistiques', 'statistiques');
    Route::get('/contact', 'contact');
    Route::get('/articles/{id}', 'article');

    Route::get('/tous_les_articles/{id_tags}', 'lesarticles');
    Route::get('/les_avis_publications', 'lespublication');
    Route::get('/les_appels_offres', 'lesapplesaoffres');

    // save messages contact
    Route::post('/saveMessage','saveMessage');

    // commission
    Route::get('/commission', 'Commission');

    // all documents
    Route::get('/documents/traite', 'documentTraite');
    Route::get('/documents/journaux', 'documentJournaux');
    Route::get('/documents/communiques', 'documentCommunique');
    Route::get('/documents/texte/juridique', 'documentTexteJuridique');
    Route::get('/documents/politique', 'documentPolitique');
    Route::get('/documents/reglements', 'documentReglement');

    Route::get('/passation/marches', 'passationMarchee');
    Route::get('/carrieres', 'carrieres');

    // save mail newletter  saveMailNewletter
    Route::post('/saveMailNewletter','saveMailNewletter');


});



