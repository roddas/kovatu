<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Utilizador extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'utilizador';
    protected $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = true;

    protected $fillable = [
        'email',
        'nome',
        'sobrenome',
        'foto',
        'password',
        'ativada',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
        'ativada' => 'boolean',
    ];
    public function proverbios(): HasMany
    {
        return $this->hasMany(QuotesModel::class, 'uid');
    }
    public function getFullNameAttribute(): string
    {
        return "{$this->nome} {$this->sobrenome}";
    }
    public function getEmailAttribute()
    {
        return $this->email;
    }

    public function getUpdatedAtHumanAttribute(): string
    {
        return Carbon::parse($this->updated_at)->diffForHumans();
    }

    public function getCreatedAtHumanAttribute(): string
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function attributes()
    {
        return [
            'nome' => 'Nome',
            'sobrenome' => 'Sobrenome',
            'foto' => 'Foto',
            'password' => 'Senha',
            'email' => 'Email',
        ];
    }
}
