<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;

/* Action Index = padronização do laravel, todos registros */
Route::get('/',[EventoController::class, 'index']);

/* Action Create = padronização do laravel, criação de registros */
Route::get('/eventos/create', [EventoController::class, 'create'])->middleware('auth'); //->middleware('auth') essa rota ficara restrita para apenas usuarios logados

/* Action Show = padronização do laravel, mostrar um registro especifico */
Route::get('/eventos/{id}', [EventoController::class, 'show']);

/* Action Create = padronização do laravel, Enviar registro ao banco */
Route::post('/eventos', [EventoController::class, 'store']);

/* Action Destroy = padronização do laravel, Deletar registro do banco */
Route::delete('/eventos/{id}', [EventoController::class, 'destroy'])->middleware('auth'); //->middleware('auth') essa rota ficara restrita para apenas usuarios logados

/* Action Edit = padronização do laravel, Tela de edição de registros do banco */
Route::get('/eventos/edit/{id}', [EventoController::class, 'edit'])->middleware('auth'); //->middleware('auth') essa rota ficara restrita para apenas usuarios logados

/* Action Update = padronização do laravel, atualiza os registros do banco (PUT) */
Route::put('/eventos/update/{id}', [EventoController::class, 'update'])->middleware('auth'); //->middleware('auth') essa rota ficara restrita para apenas usuarios logados

Route::get('/dashboard', [EventoController::class, 'dashboard'])->middleware('auth'); //->middleware('auth') essa rota ficara restrita para apenas usuarios logados

Route::post('/eventos/participar/{id}', [EventoController::class, 'participarEvento'])->middleware('auth');


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

