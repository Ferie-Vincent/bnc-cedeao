<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Flash_infos extends Model
{
    use HasFactory;

    protected $fillable = [
        'idType',
        'corpsTexte',
        'date',
        'archive',
    ];

    #Selectionner toutes les flash info
    public static function allFashInfo()
    {
        $typeFlashInfos = TypeFlashInfos::allTypeFlashInfos();

        $flashInfos = [];

        foreach ($typeFlashInfos as $key => $value) {
            // Récupérer les flash infos pour ce type
            $flashInfoData = Flash_infos::where('idType', $value->id)
                ->where('archive', false)
                ->get();

            foreach ($flashInfoData as $flashInfo) {
                $flashInfos[] = [
                    'id' => $flashInfo->id ?? null,
                    'idType' => $value->id ?? null,
                    'type' => $value->titre ?? null,
                    'couleur' => $value->couleur ?? null,
                    'corpsTexte' => $flashInfo->corpsTexte ?? null,
                    'date' => $flashInfo->date ?? null,
                ];
            }
        }
// dd($flashInfos);
        return $flashInfos;
    }



    #Save || Update || Delete
    public static function saveUpdateDeleteFlashInfo($request)
    {
        try {

            #Archive
            if (isset($request->id) && isset($request->archive) == true) {
                # archive...

                $flashInfo = Flash_infos::find($request->id);

                if ($flashInfo) {

                    $flashInfo->archive = true;
                    $flashInfo->save();

                    return [
                        'status' => true,
                        'message' => 'Le flash-info a été archivé avec succès.',
                    ];
                } else {

                    return [
                        'status' => false,
                        'message' => 'Flash-info non trouvé.',
                    ];
                }
            }

            #Save
            if (!isset($request->id)) {
                # save

                $flashInfo = new Flash_infos();

                $flashInfo->idType = $request->type;
                $flashInfo->corpsTexte = $request->corpsTexte;
                $flashInfo->date = date('d-m-Y', strtotime($request->date));
                $flashInfo->archive = false;

                $flashInfo->save();

                return [
                    'status' => true,
                    'message' => 'Le flash-info a été traité enregistré.'
                ];
            }

            #Update
            if (isset($request->id)) {
                # code...
                $id = $request->id;
                $flashInfo = Flash_infos::where('id', $id)->first();

                $flashInfo->idType = $request->type;
                $flashInfo->corpsTexte = $request->corpsTexte;
                $flashInfo->date = date('d-m-Y', strtotime($request->date));
                $flashInfo->archive = false;

                $flashInfo->save();

                return [
                    'status' => true,
                    'message' => 'Le flash-info a été traité mise à jour avec succès.'
                ];
            }
        } catch (\Exception $e) {

            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le modèle Flash-info: ' . $e->getMessage());

            # Retourner le message d'erreur
            return [
                'status' => false,
                'message' => 'Une erreur est survenue dans le model Flash-infoe. Veuillez consulter l\'administrateur pour plus d\'informations. '
            ];
        }
    }
    
}
