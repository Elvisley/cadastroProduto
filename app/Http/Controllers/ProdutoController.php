<?php

namespace App\Http\Controllers;

use App\Service\ProdutoService;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    protected $produtoService;

    function __construct(ProdutoService $service)
    {
        $this->produtoService = $service;
    }

    public function index(){
        $produtos = $this->produtoService->findAll(10);

        return view('produto.index')->with('produtos',$produtos);
    }

    public function store(Request $request){

        $dados = $request->all();

        $this->produtoService->insert($dados);

        return redirect()->route("produto.index");
    }

    public function update(Request $request, $id){

        $dados = $request->all();

        $this->produtoService->update($dados, $id);

        return redirect()->route("produto.index");

    }

    public function destroy($id){
        $this->produtoService->delete($id);
        return redirect()->route("produto.index");
    }
}
