<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $primaryKey = 'id'; // padrão, mas você pode declarar
    public $incrementing = true; // padrão, mas pode alterar
    protected $keyType = 'int'; // tipo da chave primária
    protected $fillable = ['name'];
}