@extends('layouts.app')

@section('title', 'História | GlamourTech')

@section('content')

<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
            <img src="{{ asset('imagens/salao.png') }}" class="img-fluid rounded shadow" alt="Foto do salão">
        </div>
        <div class="col-md-6">
            <h2 class="mb-4">Nossa História</h2>
            <p class="fs-5">
                Fundado em 1995 por Terezinha Marchesi, o Salão GlamourTech nasceu com a missão de oferecer beleza, cuidado e inovação para seus clientes. Com mais de duas décadas de tradição na cidade de Araruna, o salão se destacou pela qualidade dos serviços e pelo atendimento humanizado, sempre respeitando a individualidade de cada cliente.
            </p>
            <p class="fs-5">
                Ao longo dos anos, o GlamourTech acompanhou as tendências e tecnologias do mercado da beleza, tornando-se referência na região. Terezinha, uma profissional criativa e respeitada, sempre acreditou que beleza é também autoestima — e é por isso que cada atendimento é feito com carinho, dedicação e excelência.
            </p>
            <p class="fs-5">
                Hoje, o GlamourTech é muito mais do que um salão: é um espaço onde clientes se sentem em casa, valorizados e confiantes, prontos para brilhar em qualquer ocasião.
            </p>
        </div>
    </div>
</div>

@endsection
