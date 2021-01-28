<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index(){
        $arr = [1,2,3,4,5];
        return view('welcome',
        [
            'arr' => $arr
        ]);
    }

    public function create(){
         return view('eventos.create');
    }
}
