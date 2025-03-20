<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;




class Mail extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
    ];



    public static function createMail($request){
        try {
            //code...
            // dd($request->all());
            $mail = new Mail;

            $mail->name = $request->name;
            $mail->save();

            return [
                'status' => true,
                'message' => 'Le message a bien ete envoyer'
            ];
        } catch (\Throwable $e) {
            //throw $th;
            Log::error('Une erreur est survenue lors de l enregistrement du message ' . $e->getMessage());

            # Retourner le message d'erreur
            return [
                'status' => false,
                'message' => 'Une erreur est survenue lors de l enregistrement du message'
            ];
        }
    }


}
