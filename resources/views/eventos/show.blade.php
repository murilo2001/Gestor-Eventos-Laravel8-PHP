@extends('layouts.main')

@section('title', $evento->titulo)

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
        <img src="/img/eventos_upload/{{ $evento->image }}" class="img-fluid" alt=" {{$evento->titulo}}"
        width="503" height="335">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{ $evento->titulo }}</h1>
            <p class="evento-cidade"><ion-icon name="location-outline"></ion-icon> {{ $evento->cidade }}</p>
            <p class="evento-participantes"><ion-icon name="people-outline"></ion-icon> X Participantes</p>
            <p class="evento-dono"><ion-icon name="star-outline"></ion-icon> Dono do Evento</p>
            <a href="#" class="btn btn-primary" id="evento-submit">Confirmar Presença</a>
            <h3>O evento conta com:</h3>
            <ul id="items-list">
                @foreach($evento->items as $item)
                    <li><ion-icon name="play-outline"></ion-icon> <span>{{ $item }}</span></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-12" id="descricao-container">
            <h3>Sobre o evento</h3>
            <p class="evento-descricao"> {{ $evento->descricao }}</p>
        </div>
    </div>
</div>

@endsection