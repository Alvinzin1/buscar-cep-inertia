<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "adresses";

    protected $fillable = [
        'cep', 
        'logradouro',
        'bairro',
        'localidade',
        'uf',
        'ddd',
        'numero',
    ];
}
