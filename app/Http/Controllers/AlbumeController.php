<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AlbumeController extends Controller
{
    //
    public function Albume(){

        $albums = Album::allAlbums();
        return view('admin.album', compact('albums'));
    }

     #Albums
     public function albumes(Request $request){
        try {
            #Intencions la methode pour le traitement
            $album = Album::saveUpdateDeleteAlbum($request);

            #Gestion d'erreur
            if ($album['status'] == true) {
                # Success...
                return redirect()->back()->with('success', $album['message']);
            } else {

                return redirect()->back()->with('error', $album['message']);
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le controler album: ' . $e->getMessage());

            #Message error
            return redirect()->back()->with('error', 'Une erreur est survenue dans le controler album.');
        }
    }
}
