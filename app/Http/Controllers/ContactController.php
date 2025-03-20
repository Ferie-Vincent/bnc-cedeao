<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Services\SendMail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    protected $sendMail;

    public function __construct(SendMail $sendMail)
    {
        $this->sendMail = $sendMail;
    }
    
    //
    public function Contact(){

        $messages = Message::allMessage();

        return view('admin.contact', compact('messages'));
    }

    #Contact
    public function SendMail(Request $request){
        try {
            #Intencions la methode pour le traitement
            $messages = Message::sendMessage($request);

            #Gestion d'erreur
            if ($messages['status'] == true) {
                # Success...
                return redirect()->back()->with('success', $messages['message']);
            } else {

                return redirect()->back()->with('error', $messages['message']);
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le controler contact: ' . $e->getMessage());

            #Message error
            return redirect()->back()->with('error', 'Une erreur est survenue dans le controler contact.');
        }
    }
}
