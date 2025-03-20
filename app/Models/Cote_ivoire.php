<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Cote_ivoire extends Model
{
    use HasFactory;

    protected $fillable = [

        'chefGouvernement',
        'gouvernement',
        'capitalePolitique',
        'superficie',
        'population',
        'independanceDay',
        'langOfficielle',
        'langParle',
        'esperanceVie',
        'pipHabitant',
        'tauxCroissanceAnnuel',
        'monnaie',
        'indiceDeveHumain',
        'fuseauHoraire',
        'websiteGouvernement',
        'ministery',
        'ministerName',
        'ministerAdress',
        'ministerTel',
        'ministerFax',
        'ministerEmail',
        'ministerOfficialWebsite',
        'managerBnc',
        'managerBncFunction',
        'managerBncTel',
        'managerBncFax',
        'managerBncEmail',
        'managerBncOfficialWebsite',
        'outCedeao',
        'outCedeaoAdresse',
        'outCedeaoTel',
        'outCedeaoFax',
        'outCedeaoMail',
        'inCedeao',
        'inCedeaoAdresse',
        'inCedeaoMail',
    ];

    #Selectionner tous les données de la côte d'ivoire
    public static function allCoteIvoire()
    {
        $coteIvoire = Cote_ivoire::where('archive', false)->get();

        return $coteIvoire;
    }

    #Save || Update || Delete
    public static function saveUpdateDeleteCoteIvoire($request)
    {
        try {

            #Archive
            if (isset($request->id) && isset($request->archive) == true) {
                # Archive

                $coteIvoire = Cote_ivoire::find($request->id);

                if ($coteIvoire) {
                    $coteIvoire->archive = true;
                    $coteIvoire->save();

                    return [
                        'status' => true,
                        'message' => 'La donnée a été archivé avec succès.',
                    ];
                } else {
                    return [
                        'status' => false,
                        'message' => 'Aucune donnée non trouvé.',
                    ];
                }
            }

            #Save
            if (!isset($request->id)) {

                $coteIvoire = new Cote_ivoire();

                $coteIvoire->chefGouvernement = $request->chefGouvernement ?? null;
                $coteIvoire->gouvernement = $request->gouvernement ?? null;
                $coteIvoire->capitalePolitique = $request->capitalePolitique ?? null;
                $coteIvoire->superficie = $request->superficie ?? null;
                $coteIvoire->population = $request->population ?? null;
                $coteIvoire->independanceDay = $request->independanceDay ?? null;
                $coteIvoire->langOfficielle = $request->langOfficielle ?? null;

                $coteIvoire->langParle = $request->langParle ?? null;
                $coteIvoire->esperanceVie = $request->esperanceVie ?? null;
                $coteIvoire->pipHabitant = $request->pipHabitant ?? null;
                $coteIvoire->tauxCroissanceAnnuel = $request->tauxCroissanceAnnuel ?? null;
                $coteIvoire->monnaie = $request->monnaie ?? null;
                $coteIvoire->indiceDeveHumain = $request->indiceDeveHumain ?? null;
                $coteIvoire->fuseauHoraire = $request->fuseauHoraire ?? null;
                $coteIvoire->websiteGouvernement = $request->websiteGouvernement ?? null;
                $coteIvoire->ministery = $request->ministery ?? null;
                $coteIvoire->ministerName = $request->ministerName ?? null;
                $coteIvoire->ministerAdress = $request->ministerAdress ?? null;
                $coteIvoire->ministerTel = $request->ministerTel ?? null;
                $coteIvoire->ministerFax = $request->ministerFax ?? null;
                $coteIvoire->ministerEmail = $request->ministerEmail ?? null;
                $coteIvoire->ministerOfficialWebsite = $request->ministerOfficialWebsite ?? null;
                $coteIvoire->managerBnc = $request->managerBnc ?? null;
                $coteIvoire->managerBncFunction = $request->managerBncFunction ?? null;
                $coteIvoire->managerBncTel = $request->managerBncTel ?? null;
                $coteIvoire->managerBncFax = $request->managerBncFax ?? null;
                $coteIvoire->managerBncEmail = $request->managerBncEmail ?? null;
                $coteIvoire->managerBncOfficialWebsite = $request->managerBncOfficialWebsite ?? null;
                $coteIvoire->outCedeao = $request->outCedeao ?? null;
                $coteIvoire->outCedeaoAdresse = $request->outCedeaoAdresse ?? null;
                $coteIvoire->outCedeaoTel = $request->outCedeaoTel ?? null;
                $coteIvoire->outCedeaoFax = $request->outCedeaoFax ?? null;
                $coteIvoire->outCedeaoMail = $request->outCedeaoMail ?? null;
                $coteIvoire->inCedeao = $request->inCedeao ?? null;
                $coteIvoire->inCedeaoAdresse = $request->inCedeaoAdresse ?? null;
                $coteIvoire->inCedeaoMail = $request->inCedeaoMail ?? null;
                $coteIvoire->archive = false;

                $coteIvoire->save();

                return [
                    'status' => true,
                    'message' => 'La donnée a été traité enregistré'
                ];
            }

            #Update
            if (isset($request->id)) {

                $id = $request->id;
                $coteIvoire = Cote_ivoire::where('id', $id)->first();

                $coteIvoire->chefGouvernement = $request->chefGouvernement ?? null;
                $coteIvoire->gouvernement = $request->gouvernement ?? null;
                $coteIvoire->capitalePolitique = $request->capitalePolitique ?? null;
                $coteIvoire->superficie = $request->superficie ?? null;
                $coteIvoire->population = $request->population ?? null;
                $coteIvoire->independanceDay = $request->independanceDay ?? null;
                $coteIvoire->langOfficielle = $request->langOfficielle ?? null;
                $coteIvoire->langParle = $request->langParle ?? null;
                $coteIvoire->esperanceVie = $request->esperanceVie ?? null;
                $coteIvoire->pipHabitant = $request->pipHabitant ?? null;
                $coteIvoire->tauxCroissanceAnnuel = $request->tauxCroissanceAnnuel ?? null;
                $coteIvoire->monnaie = $request->monnaie ?? null;
                $coteIvoire->indiceDeveHumain = $request->indiceDeveHumain ?? null;
                $coteIvoire->fuseauHoraire = $request->fuseauHoraire ?? null;
                $coteIvoire->websiteGouvernement = $request->websiteGouvernement ?? null;

                $coteIvoire->ministery = $request->ministery ?? null;
                $coteIvoire->ministerName = $request->ministerName ?? null;
                $coteIvoire->ministerAdress = $request->ministerAdress ?? null;
                $coteIvoire->ministerTel = $request->ministerTel ?? null;
                $coteIvoire->ministerFax = $request->ministerFax ?? null;
                $coteIvoire->ministerEmail = $request->ministerEmail ?? null;
                $coteIvoire->ministerOfficialWebsite = $request->ministerOfficialWebsite ?? null;

                $coteIvoire->managerBnc = $request->managerBnc ?? null;
                $coteIvoire->managerBncFunction = $request->managerBncFunction ?? null;
                $coteIvoire->managerBncTel = $request->managerBncTel ?? null;
                $coteIvoire->managerBncFax = $request->managerBncFax ?? null;
                $coteIvoire->managerBncEmail = $request->managerBncEmail ?? null;
                $coteIvoire->managerBncOfficialWebsite = $request->managerBncOfficialWebsite ?? null;

                $coteIvoire->outCedeao = $request->outCedeao ?? null;
                $coteIvoire->outCedeaoAdresse = $request->outCedeaoAdresse ?? null;
                $coteIvoire->outCedeaoTel = $request->outCedeaoTel ?? null;
                $coteIvoire->outCedeaoFax = $request->outCedeaoFax ?? null;
                $coteIvoire->outCedeaoMail = $request->outCedeaoMail ?? null;

                $coteIvoire->inCedeao = $request->inCedeao ?? null;
                $coteIvoire->inCedeaoAdresse = $request->inCedeaoAdresse ?? null;
                $coteIvoire->inCedeaoMail = $request->inCedeaoMail ?? null;
                $coteIvoire->archive = false;

                $coteIvoire->save();

                return [
                    'status' => true,
                    'message' => 'la donnée a été traité mise à jour avec succès.'
                ];
            }
        } catch (\Exception $e) {
            # Enregistrer le message d'erreur dans les logs
            Log::error('Une erreur est survenue dans le modèle cote Ivoire: ' . $e->getMessage());
            
            # Retourner le message d'erreur
            return [
                'status' => false,
                'message' => 'Une erreur est survenue dans le model cote Ivoire. Veuillez consulter l\'administrateur pour plus d\'informations. '
            ];
            
        }
    }
}
