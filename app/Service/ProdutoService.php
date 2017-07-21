<?php

namespace App\Service;

use App\Models\Produto;

class ProdutoService
{

    /**
     * App\Models\Produto
     */
    protected $produtoM;

    function __construct(Produto $produto)
    {
        $this->produtoM = $produto;
    }

    /**
     * Metodo responsavel por listar todos os produtos cadastrados
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAll($perPage = 10){
        return $this->produtoM->paginate($perPage);
    }

    /**
     * Metodo responsavel por cadastrar um produto
     * @param $produto array(name, price)
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function insert($produto){
        return $this->produtoM->create($produto);
    }

    /**
     * Metodo responsavel por atualizar o produto
     * @param $produto
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function update($produto, $id){
        $prod = $this->produtoM->findOrFail($id);
        $prod->fill($produto)->save();
        return $prod;
    }

    /**
     * Metodo responsavel por remover um produto cadastrado
     * @param $id
     * @return bool
     */
    public function delete($id){
        $prod = $this->produtoM->findOrFail($id);
        $prod->delete();
        return true;
    }

}
