<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Entrepreneur extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'nom_prenom',
        'date_naissance',
        'cin',
        'genre',
        'region',
        'ville',
        'situation_maritale',
        'activite',
        'niveau_scolaire',
        'telephone',
        'statut_juridique',
        'secteur',
        'imf',
        'date_premiere_participation',
        'user_id',
        'user_name',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'date_naissance' => 'date',
            'date_premiere_participation' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
