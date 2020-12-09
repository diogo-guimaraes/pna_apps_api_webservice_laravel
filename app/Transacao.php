<?php
/*
|--------------------------------------------------------------------------
| commit to develop
|--------------------------------------------------------------------------
| add(model): Transacao
| refactor(model): Transacao
| rm(model): Transacao
*/

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transacao extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'comprador_id',
        'vendedor_id',
        'prduto_id',
        'cep',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'estado',
    ];

    protected $table = 'transacoes';
    protected $dates = ['deleted_at'];

    // protected $hidden = ['cidade_id', 'uf_id', 'pivot'];    

}
