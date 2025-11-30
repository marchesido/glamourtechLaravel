<?php

namespace App\Http\Controllers;

use App\Models\itensPedido;
use App\Models\Pedido;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Total de pedidos
        $totalPedidos = Pedido::count();

        // Total vendido (soma de quantidade * preço)
        $totalVendido = itensPedido::select(DB::raw("SUM(quantidade * preco) AS total"))
            ->value('total');

        // Total de itens vendidos
        $totalItensVendidos = itensPedido::sum('quantidade');

        // Pedidos por status
        $pedidosPorStatus = Pedido::select('status', DB::raw('COUNT(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        // Vendas por dia (gráfico)
        $vendasPorDia = itensPedido::select(
                DB::raw("DATE(created_at) as dia"),
                DB::raw("SUM(quantidade * preco) as total")
            )
            ->groupBy('dia')
            ->orderBy('dia', 'ASC')
            ->pluck('total', 'dia');

        return view('dashboard.index', compact(
            'totalPedidos',
            'totalVendido',
            'totalItensVendidos',
            'pedidosPorStatus',
            'vendasPorDia'
        ));
    }
}
