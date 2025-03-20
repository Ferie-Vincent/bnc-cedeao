<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriePiedDePage extends Model
{
    use HasFactory;

    protected $fillable = [

        'titre',
    ];

    #Selectionner tous les catégorie de pied de page
    public static function allCategorie()
    {
        $categories = CategoriePiedDePage::where('archive', false)->get();
        return $categories;
    }
}
