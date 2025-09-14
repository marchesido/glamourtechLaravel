<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class itensPedido extends Model
{
    use HasFactory;protected $table = 'pedidos';
    protected $primaryKey = 'id'; // padrão, mas você pode declarar

    public $incrementing = true; // padrão, mas pode alterar

    protected $keyType = 'int'; // tipo da chave primária
    protected $fillable = [
        'quantidade',
        'preco',
        'pedido_id',
        'produto_id',
    ];
    public function pedido(): BelongsTo
    {
        return $this->belongsTo(Pedido::class,'pedido_id');
    }
    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class,'produto_id');
    }
}
