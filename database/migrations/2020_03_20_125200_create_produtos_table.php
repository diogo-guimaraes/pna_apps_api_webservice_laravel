<?php
/*
|--------------------------------------------------------------------------
| commit to develop
|--------------------------------------------------------------------------
| add(migration): produtos
| refactor(migration): produtos
| rm(migration): produtos
*/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| produtos => Definições dos campos
|--------------------------------------------------------------------------
|
| ('nome'); nome da empresa -> Rede Atenas Hits
| ('cnpj') cnpj (único) da empresa -> 24685141000153
| ('endereco'); logradouro da empresa -> Avenida Calama
| ('numero'); numero do prédio da empresa -> 1256
| ('bairro'); Bairro onde a empresa principal se localiza -> Centro
| ('cep'); cep logradouro da empresa -> 76820608
| ('cidade_id'); ID que referência a qual Cidade pertence a empresa  -> 4382 (Port Velho)
| ('uf_id'); ID que referência a qual Estado pertence a empresa -> 21 (Rondônia)
|
*/

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');   
            $table->string('nome')->unique();   
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->float('preco', 15, 2);
            $table->longText('descricao');          
            $table->boolean('vendido')->default(0);
            $table->string('foto')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
