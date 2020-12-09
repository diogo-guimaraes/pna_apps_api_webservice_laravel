<?php

namespace App\Http\Controllers\PNA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\API\BaseController as BaseController;

use App\Http\Requests\StoreProduto as StoreProduto;
use App\Http\Requests\UpdateProduto as UpdateProduto;

use App\Produto;


class ProdutoController extends BaseController
{
    private $produto;
    private $result_show;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        try 
        {
            $data = $request->except('page');
            $filter_array = array();

            foreach ($data as $key => $value) {
                $filter_array[] = [$key, 'LIKE', '%' . $value . '%'];
            }
           return $this->result_show = $this->produto
                ->where($filter_array)
                // ->with('telefone.tipotelefone', 'site', 'cidade', 'uf');

            //$success = $this->result_show->paginate($request->per_page, ["*"], "produtos_por_pagina");
            // $success = $this->result_show->paginate(5, ["*"], "produtos_por_pagina");
                 ->get();

            // return $this->sendSuccess($success, '', $this->successStatus);
        } catch (\Exception $e) {
            if (env('APP_DEBUG')) {
                return $this->sendError($e->getMessage(), '', $this->errorInternalServer);
            }
            return $this->sendError('Produto não foi encontrada!', '', $this->errorInternalServer);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try 
        {
            $data = $request->input();      

            $success = $this->produto->create($data);
            return $this->sendSuccess($success, '', $this->successStatus);
        } catch (\Exception $e) {
            if (env('APP_DEBUG')) {
                return $this->sendError($e->getMessage(), '', $this->errorUnauthorised);
            }
            return $this->sendError('O produto não foi criada!', '', $this->errorInternalServer);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)

    {    
        try {
          
            $data = $request->input();

            $id_key = array_keys($data)[0];
            $id_value = array_values($data)[0];

            if ($id_key == "id") {
                return  $this->result_show = $this->produto
                    // ->with('telefone.tipotelefone', 'email', 'site', 'cidade', 'uf')
                ->findOrFail($id_value);

                // $success = $this->result_show;
                // return $this->sendSuccess($success, '', $this->successStatus);
            } else {
                return $this->sendError('Produto não foi encontrado!', '', $this->errorInternalServer);
            }
        } catch (\Exception $e) {
            if (env('APP_DEBUG')) {
                return $this->sendError($e->getMessage(), '', $this->errorInternalServer);
            }
            return $this->sendError('Produto não foi encontrado!', '', $this->errorInternalServer);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->input();
        $id_key = array_keys($data)[0];
        $id_value = array_values($data)[0];


        try {

            $data = $request->input();

            $id_key = array_keys($data)[0];
            $id_value = array_values($data)[0];

            if ($id_key == "id") {

                foreach ($data as $key => $value) {
                    if ($key == "cnpj") {
                        return $this->sendError('O CNPJ não pode ser alterado.', '', $this->errorUnprocessableEntity);
                    }
                }

                $this->produto->findOrFail($id_value)->update($data);

                $this->result_show = $this->produto->with('telefone.tipotelefone', 'site', 'cidade', 'uf')
                    ->findOrFail($id_value);

                $success = $this->result_show;
                return $this->sendSuccess($success, '', $this->successStatus);
            } else {
                return $this->sendError('Não foi possível atualizar os dados', '', $this->errorInternalServer);
            }
        } catch (\Exception $e) {
            if (env('APP_DEBUG')) {
                return $this->sendError($e->getMessage(), '', $this->errorInternalServer);
            }
            return $this->sendError('Não foi possível atualizar os dados', '', $this->errorInternalServer);
        }
    }

    /**
     * SoftDelete the specified resource from storage.
     *
     * * Arquivar => Objeto não é deletado do sistema permanente.
     * * Restaurar => Objeto pode ser restaurado, após ser arquivado.
     * * Remover => Objeto pode ser deletado permanentemente. 
     * 
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $data = $request->input();

            $id_key = array_keys($data)[0];
            $arquivar_key = array_keys($data)[1];
            $remover_key = array_keys($data)[2];
            $restaurar_key = array_keys($data)[3];

            $id_value = array_values($data)[0];
            $arquivar_value = array_values($data)[1];
            $remover_value = array_values($data)[2];
            $restaurar_value = array_values($data)[3];

            if ($id_key == "id") {

                if ($arquivar_key == "arquivar" && $arquivar_value == "true") {

                    $this->produto->findOrFail($id_value)->delete();

                    $this->result_show = "Arquivado com sucesso";
                } elseif ($restaurar_key == "restaurar" && $restaurar_value == "true") {

                    $this->produto->withTrashed()->findOrFail($id_value)->restore();

                    $this->result_show = "Restaurado com sucesso";
                } elseif ($remover_key == "remover" && $remover_value == "true") {

                    $this->produto->findOrFail($id_value)->forceDelete();

                    $this->result_show = "Removido com sucesso";
                }

                $success = $this->result_show;

                return $this->sendSuccess($success, '', $this->successStatus);
            }
        } catch (\Exception $e) {

            if (env('APP_DEBUG')) {
                return $this->sendError($e->getMessage(), '', $this->errorInternalServer);
            }

            return $this->sendError('Operação não realizada!', '', $this->errorInternalServer);
        }
    }
}
