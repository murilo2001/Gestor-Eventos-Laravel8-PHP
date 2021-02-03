<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $casts = [
        /* Quando for retornado um dado 'items' será interpretado como array e não como string */
        'items' => 'array',
        'data' => 'date'
    ];

    /* A dfinição da variavel guarded vazia informa ao laravel que tudo que for enviado via POST
    pode ser atualizado = não tem nenhuma restrição , poderia também ser colocado um campo 
    especifico */
    protected $guarded = [];

    /* Criação de relação entre evento e usuario, um evento percente a um usuario
        - Retoranara apenas o evento pertencente ao usuario (dono)
    */
    public function user(){
        return $this->belongsTo('App/Models/User');
    }

    public function users(){
        /* belongsToMany = Um evento pertence a muitos usuarios */
        return $this->belongsToMany('App\Models\User');
    }
}
