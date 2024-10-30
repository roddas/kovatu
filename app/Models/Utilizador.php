<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


class Utilizador extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'utilizador';
    protected $primaryKey = 'email';
    public $timestamps = true;
    protected $guarded = ['email', 'ativada'];
    protected $fillable = ['email', 'nome', 'sobrenome', 'foto', 'password'];

    public function getFullNameAttribute(): string
    {
        return "{$this->nome} {$this->sobrenome}";
    }
    public function getEmailAttribute(): string
    {
        return $this->email;
    }
    public function getFotoAttribute(): string
    {
        return $this->foto;
    }
    public function getActivadaAttribute(): bool
    {
        return $this->ativada;
    }
    public function getUpdatedAtHumanAttribute(): string
    {
        return Carbon::parse($this->updated_at)->diffForHumans();
    }
    public function getCreatedAtHumanAttribute(): string
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
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
