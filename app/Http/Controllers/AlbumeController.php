<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AlbumeController extends Controller
{
    /**
     * Affiche la liste des albums.
     */
    public function Albume()
    {
        try {
            $albums = Album::allAlbums() ?? [];
            return view('admin.album', compact('albums'));
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération des albums : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Impossible de récupérer les albums.');
        }
    }

    /**
     * Gère la création, mise à jour ou suppression d'un album.
     */
    public function albumes(Request $request)
    {
        try {
            // Validation des données reçues
            $request->validate([
                'titre' => 'required|string|max:255',
                'description' => 'nullable|string',
                'date' => 'required|date',
            ]);

            // Traitement de l'album
            $album = Album::saveUpdateDeleteAlbum($request);

            return redirect()->back()->with($album['status'] ? 'success' : 'error', $album['message']);
        } catch (\Exception $e) {
            Log::error('Erreur dans le contrôleur Album : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue dans le contrôleur Album.');
        }
    }
}
