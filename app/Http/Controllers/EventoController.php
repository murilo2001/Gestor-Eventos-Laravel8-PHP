<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
{
    public function index(){
        $eventos = Evento::all();
        return view('welcome',['eventos' => $eventos]);
    }

    public function create(){
         return view('eventos.create');
    }

    public function store(Request $request){

        $evento = new Evento;
        $evento->titulo = $request->titulo;
        $evento->cidade = $request->cidade;
        $evento->privado = $request->privado;
        $evento->descricao = $request->descricao;
        /* OBS: Foi realizado alteração no model para que o value retorne um array e não uma string */
        $evento->items = $request->items;
        
        /* Image Upload*/
        /* Verifica se possui alguma imagem no request e se ela é valida */
        if($request->hasFile('image') && $request->file('image')->isValid()){
            
            /* Resgata a imagem da request */
            $requestImage = $request->image;
            /* Resgata a extensão da imagem */
            $extension = $requestImage->extension();
            /* Resgata o nome da imagem concatenado com o tempo now (agora) concatenado com a extensao
            OBS: O md5 gera uma string alfa-numérica de 32 caracteres */
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            
            /* Move a imagem que foi feito o upload para a pasta img/eventos_upload */
            $requestImage->move(public_path('img/eventos_upload'), $imageName);

            $evento->image = $imageName;
        
        }

        $evento->save();

        return redirect('/')->with('msg','Evento criado com sucesso !');
    }

    public function show($id){

        /* O metodo estatico findOrFail ou firstOrFail recupera o primeiro resultado da consulta, porem caso
        não retornar nada dispara uma Exception = Illuminate\Database\Eloquent\ModelNotFoundException */
        $evento = Evento::findOrFail($id);

        /* Retorna a view eventos.show e envia o evento contido na variavel $evento para lá */
        return view('eventos.show', ['evento' => $evento]);
    }
}
