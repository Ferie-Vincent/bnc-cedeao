<?php

namespace App\Models;

use App\Models\SendMail as ModelsSendMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Services\SendMail;
use App\Models\Email;



class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'subjet',
        'contenue',
        'statu',
        'archive',
    ];


    public static function allMessage()
    {
        $getmessages = Message::where('archive', false)->get();

        $messages = [];
        
        foreach ($getmessages as $key => $value) {
            # code...
            $reponse = ReponseMessage::where('idMessage', $value->id)->first();
            
            $message = [
                'id' => $value->id ?? null,
                'name' => $value->name ?? null,
                'email' => $value->email ?? null,
                'subjet' => $value->subjet ?? null,
                'contenue' => $value->contenue ?? null,
                'statu' => $value->statu ?? null,
                'date' => $value->created_at ? $value->created_at->format('d/m/Y') : null,
                'idExpediteur' => $reponse->id ?? null,
                'nameExpediteur' => $reponse->name ?? null,
                'emailExpediteur' => $reponse->email ?? null,
                'subjetExpediteur' => $reponse->subjet ?? null,
                'contenueExpediteur' => $reponse->contenue ?? null,
                'statuExpediteur' => $reponse->statu ?? null,
                'dateExpediteur' => $reponse && $reponse->created_at ? $reponse->created_at->format('d/m/Y') : null,
            ];

            $messages[] = $message;
        }
        // dd($messages);
        return $messages;
    }


    public static function createMessage($request)
    {
        try {
            //code...
            // dd($request->all());
            $message = new Message;

            $message->name = $request->name;
            $message->email = $request->email;
            $message->subjet = $request->subjet;
            $message->contenue = $request->contenue;
            $message->statu = false;
            $message->archive = false;

            $message->save();

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


    #Send
    public static function sendMessage($request)
    {
        try {

            #Archive
            if (isset($request->id) && isset($request->archive) == true) {
                # archive...

                $message = Message::find($request->id);

                if ($message) {

                    $message->archive = true;
                    $message->save();

                    return [
                        'status' => true,
                        'message' => 'Le mail a été archivé avec succès.',
                    ];
                } else {

                    return [
                        'status' => false,
                        'message' => 'mail non trouvé.',
                    ];
                }
            }

            // #Save
            // if (!isset($request->id)) {
            //     # save

            //     $message = new Message();

            //     $message->type = $request->type;
            //     $message->corpsTexte = $request->corpsTexte;
            //     $message->date = date('d-m-Y', strtotime($request->date));
            //     $message->archive = false;

            //     $message->type = $request->type;
            //     $message->corpsTexte = $request->corpsTexte;
            //     $message->date = date('d-m-Y', strtotime($request->date));
            //     $message->archive = false;

            //     $message->save();


            //     $message->save();

            //     return [
            //         'status' => true,
            //         'message' => 'Le mail a été traité enregistré.'
            //     ];
            // }

            #Update
            if (isset($request->id) && isset($request->statu) == true) {

                #Instantions le service de mail pour le traitement
                $messages = SendMail::reponseMessage($request);

                #Instantions la methode sendmail pour le traitement
                $saveReponseMessage = ReponseMessage::saveMail($request);

                if ($messages['status'] == true && $saveReponseMessage['status'] == true) {
                    #Mettez à jour le statut du message à 1 (envoyé ou répondu)
                    $messageId = $request->input('id');
                    $message = Message::find($messageId);
                    $message->statu = 1;
                    $message->save();

                    return [
                        'status' => true,
                        'message' => 'Le mail a été traité envoyé.'
                    ];
                } else {
                    return [
                        'status' => false,
                        'message' => 'Le mail n`\a pas été traité envoyé.'
                    ];
                }
            }
        } catch (\Exception $e) {

            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le modèle mail: ' . $e->getMessage());

            # Retourner le message d'erreur
            return [
                'status' => false,
                'message' => 'Une erreur est survenue dans le model maile. Veuillez consulter l\'administrateur pour plus d\'informations. '
            ];
        }
    }
}
