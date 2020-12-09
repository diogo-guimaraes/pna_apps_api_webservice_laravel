<?php
/*
|--------------------------------------------------------------------------
| commit to develop
|--------------------------------------------------------------------------
| add(migration): transacoes
| refactor(migration): transacoes
| rm(migration): transacoes
*/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| transacoes => Definições dos campos
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

class CreateTransacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacoes', function (Blueprint $table) {
            $table->increments('id');   
           
            $table->integer('comprador_id')->unsigned();
            $table->foreign('comprador_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->integer('vendedor_id')->unsigned();
            $table->foreign('vendedor_id')->references('id')->on('users')->onDelete('cascade');
           
            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
            
            $table->string('cep');
            $table->string('rua');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');           
        
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
        Schema::dropIfExists('transacoes');
    }
}
