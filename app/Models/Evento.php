<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $casts = [
        /* Quando for retornado um dado 'items' será interpretado como array e não como string */
        'items' => 'array'
    ];

    /* Ira interpretar o campo date retornando sempre um date */
    protected $dates = ['date'];

    /* Criação de relação entre evento e usuario, um evento percente a um usuario
        - Retoranara apenas o evento pertencente ao usuario (dono)
    */
    public function user(){
        return $this->belongsTo('App/Models/User');

    }
}
