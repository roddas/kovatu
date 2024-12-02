<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinguaModel extends Model
{
    use HasFactory;
    protected $table = 'lingua';
    protected $primaryKey = 'lingua';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'lingua',
    ];
}
