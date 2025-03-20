<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieDocument extends Model
{
    use HasFactory;

    protected $fillable = [

        'titre',
    ];

    #Selectionner tous les catégorie de pied de page
    public static function allCategorie()
    {
        $categories = CategorieDocument::where('archive', false)->get();
        // dd($categories);
        return $categories;
    }
}
