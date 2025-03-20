<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\Message;
use App\Mail\ReplyMessage;
use Illuminate\Support\Facades\Mail;



class SendMail
{

    public static function reponseMessage($request)
    {
        try {
            # Envoie de l'e-mail
            $to = $request->input('email');
            $subject = $request->input('subjet');
            $contenue = $request->input('contenue');

            # Vous pouvez personnaliser le Mailable selon vos besoins
            Mail::to($to)->send(new ReplyMessage($subject, $contenue));

            return [
                'status' => true,
                'message' => 'Le mail a été traité envoyé.'
            ];

        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le service contact: ' . $e->getMessage());

            #Message error
            return redirect()->back()->with('error', 'Une erreur est survenue dans le service contact.');
        }
    }
}
