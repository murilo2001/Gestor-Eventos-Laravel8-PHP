<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;

Route::get('/',[EventoController::class, 'index']);
Route::get('/eventos/create',[EventoController::class, 'create']);

Route::get('/produtos', function () {
    /* Verifica a request procurando o nome search */
    $busca = request('search');
    return view('produtos',['busca' => $busca]);
    /* exemplo: /produtos?search=camisa    nesse caso $busca vai receber camisa */
});

/* Rota contendo parametros opicionais, caso não for passado nada o id será null */
Route::get('/produtos_teste/{id?}', function ($id = null) {
    return view('produto', ['id' => $id]);
});

/* Rota padrao
Route::get('/produtos', function () {
    return view('produtos');
}); */

/* Rota contendo parametro obrigatorio
Route::get('/produtos/{id}', function ($id) {
    return view('produto', ['id' => $id]);
}); */