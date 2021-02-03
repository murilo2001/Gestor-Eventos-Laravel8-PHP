@extends('layouts.main')

@section('title', 'Editando Eventos: '. $evento->titulo)

@section('content')

<div id="evento-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{ $evento->titulo }}</h1>
    <br>
    <form action="/eventos/update/{{ $evento->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <!-- <div class="observacao"> • largura recomendada: <strong>503</strong>, altura recomendada: <strong>335</strong></div> -->
        <div class="observacao"> • dimensoes recomendadas para melhor resolução: <strong>largura: 503 || altura: 335</strong></div>
        <label for="image">Imagem do Evento:</label>
        <input type="file" id="image" name="image" class="from-control-file">
        <img src="/img/eventos_upload/{{ $evento->image }}" alt="{{ $evento->titulo }}" class="img-preview">
    </div>
        <br>
        <div class="form-group">
            <label for="titulo">Evento:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome do Evento" value="{{ $evento->titulo }}">
        </div>
        <br>
        <div class="form-group">
            <label for="date">Data do Evento:</label>
            <input type="date" class="form-control" id="data" name="data" value="{{ $evento->data->format('Y-m-d') }}" >
        </div>
        <br>
        <div class="form-group">
            <label for="titulo">Cidade:</label>
            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Local do Evento" value="{{ $evento->cidade }}"> 
        </div>
        <br>
        <div class="form-group">
            <label for="titulo">O evento é privado?</label>
            <select name="privado" id="privado" class="form-control">
                <option value="0" {{$evento->privado == 0 ? "selected='selected'" : ""}}>Não</option>
                <option value="1" {{$evento->privado == 1 ? "selected='selected'" : ""}}>Sim</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="titulo">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control" placeholder="O que vai acontecer no evento ?">{{ $evento->descricao }}</textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="titulo">Adicione itens de infraestrutura:</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Palco"> Palco
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cerveja grátis"> Cerveja grátis
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open Food"> Open food
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Brindes"> Brindes
            </div>
        </div>
        <br>
        <input type="submit" class="btn btn-primary" value="Criar Evento">
    </form>
</div>

@endsection