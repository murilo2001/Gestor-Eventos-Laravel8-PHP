<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\User;

class EventoController extends Controller
{
    public function index(){

        $search = request('search');

        if($search){
            $eventos = Evento::where([
                ['titulo', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $eventos = Evento::all();
        }
        
        return view('welcome',['eventos' => $eventos, 'search' => $search]);
    }

    public function create(){

         return view('eventos.create');
    }

    public function store(Request $request){
        
        /* Cria uma nova entidade Evento*/
        $evento = new Evento;

        /* Resgata a entidade do usuario */
        $user = auth()->user();

        /* Seta os atributos à entidade*/
        $evento->titulo = $request->titulo;
        $evento->data = $request->data;
        $evento->cidade = $request->cidade;
        $evento->privado = $request->privado;
        $evento->descricao = $request->descricao;
        $evento->items = $request->items; // Foi realizado alteração no model para que o value retorne um array e não uma string
        $evento->user_id = $user->id;
        
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

        /* Irá retornar a entidade do usuario cujo id foi resgatado na função */
        $donoEvento = User::where('id', '=', $evento->user_id)->first()->toArray();

        /* Retorna a view eventos.show e envia o evento contido na variavel $evento para lá */
        return view('eventos.show', ['evento' => $evento, 'donoEvento' => $donoEvento]);
    }

    public function dashboard(){

        $user = auth()->user();
        $eventos = $user->eventos;

        return view('eventos.dashboard', ['eventos' => $eventos]);
    }

    public function destroy($id){
        /* O metodo estatico findOrFail ou firstOrFail recupera o primeiro resultado da consulta, porem caso
        não retornar nada dispara uma Exception = Illuminate\Database\Eloquent\ModelNotFoundException,
        o ->delete() apaga esse registro do banco caso encontrar */
        $evento = Evento::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento excluido com sucesso!');
    }

    public function edit($id){
        /* O metodo estatico findOrFail ou firstOrFail recupera o primeiro resultado da consulta, porem caso
        não retornar nada dispara uma Exception = Illuminate\Database\Eloquent\ModelNotFoundException */
        $evento = Evento::findOrFail($id);

        return view('eventos.edit',['evento' => $evento]);
    }

    public function update(Request $request){

        $entidade = $request->all();

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
            
            $entidade['image'] = $imageName;
        }
        $evento = Evento::findOrFail($request->id)->update($entidade);
        
        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
    }

    public function participarEvento($id){

        /* Resgata a entidade do usuario autenticado */
        $user = auth()->user();

        /* attach ira inserir o id do usuario e do evento na função eventsAsParticipant(), essa
        função cria uma relação belongsToMany = Um usuario pertence a muitos eventos */
        $user->eventsAsParticipant()->attach($id);

        $evento = Evento::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no evento '.$evento->titulo);
    }
}
