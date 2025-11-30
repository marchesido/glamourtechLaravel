<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedidos';
    protected $primaryKey = 'id'; // padrão, mas você pode declarar

    public $incrementing = true; // padrão, mas pode alterar

    protected $keyType = 'int'; // tipo da chave primária
    protected $fillable = [
        'status',
        'user_id',
    ];
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function itens(): HasMany
    {
        return $this->hasMany(itensPedido::class, 'pedido_id');
    }
}
