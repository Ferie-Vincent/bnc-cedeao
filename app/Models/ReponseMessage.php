<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ReponseMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'idMessage',
        'name',
        'email',
        'subjet',
        'contenue',
        'statu',
        'archive',
    ];

    #Selectionner toutes les reponses des mail envoyé

    public static function getAllReponseMessage(){
        $reponses = ReponseMessage::all();
        return $reponses;
    }

    #Save la reponse au mail
    public static function saveMail($request)
    {
        
        try {
            $reponse = new ReponseMessage();

            $reponse->idMessage = $request->id;
            $reponse->name = $request->name;
            $reponse->email = $request->email;
            $reponse->subjet = $request->subjet;
            $reponse->contenue = $request->contenue;
            $reponse->statu = $request->statu;
            $reponse->archive = false;

            $reponse->save();

            return [
                'status' => true,
                'message' => 'Le mail à été sauvegardé.'
            ];
        } catch (\Exception $e) {

            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le modèle Reponse Message: ' . $e->getMessage());

            # Retourner le message d'erreur
            return [
                'status' => false,
                'message' => 'Une erreur est survenue dans le model Reponse Message. Veuillez consulter l\'administrateur pour plus d\'informations. '
            ];
        }
    }
}
