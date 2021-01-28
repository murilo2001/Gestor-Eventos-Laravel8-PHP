@extends('layouts.main')

@section('title', 'Gestor de Eventos')

@section('content')

<h1>Titulo</h1>
<img src="/img/banner.jpg" alt="Banner">
@if(10>5)
    <p>A condição é true</p>
<br>
@endif

@for ($i = 0; $i < count($arr); $i++)
        <p>{{ $arr[$i] }}</p>
@endfor

@php
    $str = 'Murilo';
    echo $str
@endphp

{{-- Esté e um comentario do Blade, não aparece na view--}}

@endsection