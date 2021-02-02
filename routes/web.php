<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;

/* Action Index = padronização do laravel, todos registros */
Route::get('/',[EventoController::class, 'index']);

/* Action Create = padronização do laravel, criação de registros */
Route::get('/eventos/create', [EventoController::class, 'create']);

/* Action Create = padronização do laravel, Enviar registro ao banco */
Route::post('/eventos', [EventoController::class, 'store']);

/* Action Show = padronização do laravel, mostrar um registro especifico */
Route::get('/eventos/{id}', [EventoController::class, 'show']);

/* Rota padrao que retorna view contato ao acessar rota '/contatos' */
Route::get('/contatos', function() {
    return view('contato');
});

/* Rota que verifica request GET procurando search (busca)
Route::get('/produtos', function () {
    /* Verifica a request procurando o nome search *
    $busca = request('search');
    return view('produtos',['busca' => $busca]);
    /* exemplo: /produtos?search=camisa    nesse caso $busca vai receber camisa *
}); */

/* Rota contendo parametros opicionais, caso não for passado nada o id será null *
Route::get('/produtos_teste/{id?}', function ($id = null) {
    return view('produto', ['id' => $id]);
}); */

/* Rota padrao
Route::get('/produtos', function () {
    return view('produtos');
}); */

/* Rota contendo parametro obrigatorio
Route::get('/produtos/{id}', function ($id) {
    return view('produto', ['id' => $id]);
}); */