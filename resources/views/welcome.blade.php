@extends('layouts.main')

@section('title', 'Gestor de Eventos')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="eventos-container" class="cold-md-12">
    <h2>Próximos Eventos</h2>
    <p class="subtitle">Veja os eventos dos próximos dias</p>
    <div id="cards-container" class="row">
        @foreach($eventos as $evento)
        <div class="card col-md-3">
            <img src="img/eventos_upload/{{ $evento->image }}" alt="{{ $evento->titulo }}">
            <div class="card-body">
                <p class="card-date">10/02/2021</p>
                <h5 class="card-title">{{ $evento->titulo }}</h5>
                <p class="card-participantes">X Participantes</p>
                <a href="/eventos/{{ $evento->id }}" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection