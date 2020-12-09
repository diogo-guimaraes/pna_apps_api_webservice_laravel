<?php
/*
|--------------------------------------------------------------------------
| commit to develop
|--------------------------------------------------------------------------
| add(model): Produto
| refactor(model): Produto
| rm(model): Produto
*/

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'nome',
        'usuario_id',
        'preco',
        'descricao',
        'vendido',
    ];

    // protected $primaryKey = 'id';
    protected $table = 'produtos';
    // public $incrementing = false;

    protected $dates = ['deleted_at'];

    // protected $hidden = ['cidade_id', 'uf_id', 'pivot'];    

    // public function telefone()
    // {
    //     return $this->hasMany(Telefone::class, 'Produto_id');
    // }

    // public function site()
    // {
    //     return $this->hasMany(Site::class, 'Produto_id');
    // }

    // public function praca_nome()
    // {
    //     return $this->hasMany(PracaNome::class, 'Produto_id')
    //     ->select(
    //         'id',
    //         'nome',
    //         'Produto_id'
    //     );
    // }

    // public function email()
    // {
    //     return $this->hasMany(Email::class, 'Produto_id');
    // }

    // public function usuario_Produto_fk()
    // {
    //     return $this->hasMany(UsuarioProdutoFk::class, 'Produto_id');
    // }

    // public function cidade()
    // {
    //     return $this->belongsTo(Cidade::class);
    // }

    // public function uf()
    // {
    //     return $this->belongsTo(Uf::class);
    // }

    

    // public function cidades()
    // {
    //     return $this->belongsToMany(Cidade::class, 'Produtos', 'id')
    //     ->select(
    //         'cidades.id',
    //         'cidades.nome',
    //     );

    // }

    // public function ufs()
    // {
    //     return $this->belongsToMany(Uf::class, 'Produtos', 'id')
    //     ->select(
    //         'ufs.id',
    //         'ufs.nome',
    //         'ufs.uf'
    //     );

    // }
}
