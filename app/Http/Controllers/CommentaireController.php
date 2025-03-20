<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    //
    public function Commentaires(){
        return view('admin.commentaire');
    }
}
