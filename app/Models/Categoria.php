<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';
    protected $primaryKey = 'id'; // padrão, mas você pode declarar

    public $incrementing = true; // padrão, mas pode alterar

    protected $keyType = 'int'; // tipo da chave primária
    protected $fillable = [
        'nome',
        'descricao',
    ];
}
