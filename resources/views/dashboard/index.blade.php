@extends('layouts.app')

@section('content')

<div class="container py-4">

    <h2 class="mb-4 fw-bold">📊 Dashboard de Indicadores</h2>

    <!-- Cards -->
    <div class="row g-4">

        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h6 class="text-muted">Total em Vendas</h6>
                    <h3 class="fw-bold text-primary">
                        R$ {{ number_format($totalVendido, 2, ',', '.') }}
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h6 class="text-muted">Itens Vendidos</h6>
                    <h3 class="fw-bold text-success">
                        {{ $totalItensVendidos }}
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h6 class="text-muted">Total de Pedidos</h6>
                    <h3 class="fw-bold text-dark">
                        {{ $totalPedidos }}
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h6 class="text-muted">Vendas por Dia (Qtde)</h6>
                    <h3 class="fw-bold text-info">
                        {{ count ($vendasPorDia) }}
                    </h3>
                </div>
            </div>
        </div>

    </div>

    <hr class="my-5">

    <h4 class="mb-4 fw-bold">📈 Gráficos Demonstrativos</h4>

    <div class="row g-4">

        <!-- Linha -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">Vendas por Dia (Linha)</div>
                <div class="card-body">
                    <canvas id="graficoLinha" height="150"></canvas>
                </div>
            </div>
        </div>

        <!-- Barra -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">Vendas por Dia (Barras)</div>
                <div class="card-body">
                    <canvas id="graficoBarra" height="150"></canvas>
                </div>
            </div>
        </div>

        <!-- Pizza -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">Distribuição dos Dias (Pizza)</div>
                <div class="card-body">
                    <canvas id="graficoPizza" height="200"></canvas>
                </div>
            </div>
        </div>

        <!-- Donut -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">Distribuição dos Dias (Donut)</div>
                <div class="card-body">
                    <canvas id="graficoDonut" height="200"></canvas>
                </div>
            </div>
        </div>

        <!-- Radar -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">Radar de Vendas</div>
                <div class="card-body">
                    <canvas id="graficoRadar" height="200"></canvas>
                </div>
            </div>
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = {!! json_encode($vendasPorDia->keys()->toArray()) !!};
    const valores = {!! json_encode($vendasPorDia->values()->toArray()) !!};

    // Linha
    new Chart(document.getElementById('graficoLinha'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: "Vendas (R$)",
                data: valores,
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13,110,253,0.2)',
                tension: 0.3,
                borderWidth: 3
            }]
        }
    });

    // Barra
    new Chart(document.getElementById('graficoBarra'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: "Vendas (R$)",
                data: valores,
                backgroundColor: '#198754',
                borderColor: '#145c38',
                borderWidth: 2
            }]
        }
    });

    // Pizza
    new Chart(document.getElementById('graficoPizza'), {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: valores,
                backgroundColor: ['#0d6efd','#198754','#dc3545','#ffc107','#6f42c1','#fd7e14']
            }]
        }
    });

    // Donut
    new Chart(document.getElementById('graficoDonut'), {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: valores,
                backgroundColor: ['#0dcaf0','#6610f2','#198754','#dc3545','#fd7e14','#20c997']
            }]
        }
    });

    // Radar
    new Chart(document.getElementById('graficoRadar'), {
        type: 'radar',
        data: {
            labels: labels,
            datasets: [{
                label: "Vendas",
                data: valores,
                backgroundColor: 'rgba(13,110,253,0.3)',
                borderColor: '#0d6efd',
                borderWidth: 2
            }]
        }
    });
</script>

@endsection
