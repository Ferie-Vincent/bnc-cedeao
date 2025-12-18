<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ThematiqueProjet extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'archive',
    ];

    /**
     * Récupérer toutes les thématiques non archivées
     */
    public static function allThematique()
    {
        return static::where('archive', false)->get();
    }

    /**
     * Gérer la création / mise à jour / archivage d'une thématique
     *
     * @param  array  $data   (id?, titre?, archive?)
     * @param  string $action 'create' | 'update' | 'archive'
     * @return array
     */
    public static function handle(array $data, string $action): array
    {
        try {
            switch ($action) {
                // 1) CRÉATION
                case 'create':
                    $thematique = new static();
                    $thematique->titre   = $data['titre'] ?? null;
                    $thematique->archive = false;
                    $thematique->save();

                    return [
                        'status'  => true,
                        'message' => 'La thématique a été enregistrée avec succès.',
                    ];

                // 2) MISE À JOUR
                case 'update':
                    if (empty($data['id'])) {
                        return [
                            'status'  => false,
                            'message' => 'ID manquant pour la mise à jour de la thématique.',
                        ];
                    }

                    $thematique = static::find($data['id']);

                    if (!$thematique) {
                        return [
                            'status'  => false,
                            'message' => 'La thématique à mettre à jour est introuvable.',
                        ];
                    }

                    $thematique->titre   = $data['titre'] ?? $thematique->titre;
                    $thematique->archive = false;
                    $thematique->save();

                    return [
                        'status'  => true,
                        'message' => 'La thématique a été mise à jour avec succès.',
                    ];

                // 3) ARCHIVAGE
                case 'archive':
                    if (empty($data['id'])) {
                        return [
                            'status'  => false,
                            'message' => 'ID manquant pour l\'archivage de la thématique.',
                        ];
                    }

                    $thematique = static::find($data['id']);

                    if (!$thematique) {
                        return [
                            'status'  => false,
                            'message' => 'La thématique à archiver est introuvable.',
                        ];
                    }

                    $thematique->archive = true;
                    $thematique->save();

                    return [
                        'status'  => true,
                        'message' => 'La thématique a été archivée avec succès.',
                    ];

                default:
                    return [
                        'status'  => false,
                        'message' => 'Action non reconnue pour la gestion des thématiques.',
                    ];
            }

        } catch (\Throwable $e) {

            Log::error('Erreur dans le modèle ThematiqueProjet : ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);

            return [
                'status'  => false,
                'message' => 'Une erreur est survenue dans le modèle ThematiqueProjet. Veuillez contacter l\'administrateur.',
            ];
        }
    }
}
