<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    
    $arr = [1,2,3,4,5];

    return view('welcome',
    [
        'arr' => $arr
    ]);
});

Route::get('/produtos', function () {
    return view('produtos');
});