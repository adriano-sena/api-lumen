<?php

namespace App\Http\Controllers;
use App\Serie;
use Illuminate\Http\Request;

/**
 * Class BaseController
 * @package App\Http\Controllers
 *
 * Esta classe representa um controle abstrato que pode ser herdado por outros controllers
 * para que possuam o comportamento das principais requisições rest
 */
abstract class BaseController
{

    protected $classe;

    public function index(Request $request)
    {
        return $this->classe::paginate($request->per_page);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * Método para persistir um recurso na base de dados
     *
     * retorna o valor em json e o status da requisição http
     */
    public function store(Request $request)
    {
        return response()->json($this->classe::create($request->all()), 201);//201 status created do http
    }

    public function show(int $id)
    {
        $serie = $this->classe::find($id);
        if(is_null($serie)){
            return response()->json('',204); //status 204 é um sucesso para req, sem recurso no db
        }
        return response()->json($serie);
    }

    /**
     * @param int $id
     * @param Request $request
     *
     * O método fill preenche e atualiza o recurso a ser atualizado com as novas
     * informações
     */
    public function update(int $id, Request $request)
    {
        $serie = $this->classe::find($id);
        if(is_null($serie)){
            return response()->json([
                'erro' => 'recurso não encontrado'],
                404); //user gera um erro no sistema
        }
        $serie->fill($request->all());//atualizao com todos os dados do request
        $serie->save();
        return response()->json($serie);
    }

    /**
     * @param int $id
     * @param Request $request
     *
     * O método destroy retorna a quantidade de series que ele conseguiu remover
     * desta forma sabemos se obtivemos sucesso ou falha na remoção de alguma serie do db
     */
    public function destroy(int $id, Request $request)
    {
        $qtdRecursosRemovidos = $this->classe::destroy($id);
        if($qtdRecursosRemovidos === 0 ){
            return response()->
                json(['erro' => 'O recurso desejado não existe no sistema'],
                404);
        }

        return response()->json('',204);

    }
}


