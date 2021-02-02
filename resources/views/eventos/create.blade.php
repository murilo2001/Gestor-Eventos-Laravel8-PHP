@extends('layouts.main')

@section('title', 'Criar Eventos')

@section('content')

<div id="evento-create-container" class="col-md-6 offset-md-3">
    <h1>Crei o seu evento</h1>
    <br>
    <form action="/eventos" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="image">Imagem do Evento:</label>
        <input type="file" id="image" name="image" class="from-control-file">
    </div>
        <br>
        <div class="form-group">
            <label for="titulo">Evento:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome do Evento">
        </div>
        <br>
        <div class="form-group">
            <label for="titulo">Cidade:</label>
            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Local do Evento">
        </div>
        <br>
        <div class="form-group">
            <label for="titulo">O evento é privado?</label>
            <select name="privado" id="privado" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="titulo">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control" placeholder="O que vai acontecer no evento ?"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Criar Evento">
    </form>
</div>

@endsection