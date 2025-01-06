<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuotesModel extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'proverbio';
    protected $primaryKey = 'id_proverbio';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [
        'proverbio',
        'interpretacao',
        'uid',
        'lingua',
    ];

    /**
     * Define a relação com o modelo Utilizador.
     */
    public function utilizador(): BelongsTo
    {
        return $this->belongsTo(Utilizador::class, 'uid');
    }

    /**
     * Retorna o autor do provérbio (nome completo).
     */
    public function getAuthorAttribute(): string
    {
        return "{$this->utilizador->nome} {$this->utilizador->sobrenome}";
    }
}
