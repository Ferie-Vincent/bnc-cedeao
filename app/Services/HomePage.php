<?php 

namespace App\Services;

use App\Models\Actualite;
use App\Models\Appel_offre;
use App\Models\Avis_publication;
use App\Models\Cote_ivoire;

class HomePage {

    public static function ActualiteSilder(){
        try {
            //code...
            return Actualite::orderBy('id', 'desc')->limit(1)->get();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public static function Alaune(){
        try {
            //code...
            return Actualite::where('id_tags',1)->orderBy('id', 'desc')->limit(2)->get();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public static function PlusInfos(){
        try {
            //code...
            return Actualite::where('id_tags',2)->orderBy('id', 'desc')->limit(2)->get();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public static function TagsallArticle($id){
        try {
            //code...
           return Actualite::where('id_tags',$id)->get();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public static function firstActualite($id){
        try {
            //code...
           return Actualite::find($id);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    public static function Avispublication(){
        try {
            //code...
            return Avis_publication::orderBy('id', 'desc')->limit(2)->get();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public static function AppelOffres(){
        try {
            //code...
            return Appel_offre::orderBy('id', 'desc')->limit(2)->get();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public static function TousAvispublication(){
        try {
            //code...
            return Avis_publication::orderBy('id', 'desc')->get();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public static function TousAppelOffres(){
        try {
            //code...
            return Appel_offre::orderBy('id', 'desc')->get();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public static function AllInfoCotedivoire(){
        try {
            //code...
            return Cote_ivoire::first();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

}