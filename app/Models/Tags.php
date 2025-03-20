<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Tags extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    #Selectionner tous les tags
    public static function allTags(){
        
        $tags = Tags::all();

        return $tags;
    }
}
