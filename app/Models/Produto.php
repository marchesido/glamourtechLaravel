<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    protected $primaryKey = 'id'; // padrão, mas você pode declarar

    public $incrementing = true; // padrão, mas pode alterar

    protected $keyType = 'int'; // tipo da chave primária
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'estoque',
    ];
}