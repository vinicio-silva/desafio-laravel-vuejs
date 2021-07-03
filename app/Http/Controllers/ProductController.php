<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
  public function getProdutos() {
    $produtos = Product::all();
    return json_encode($produtos, JSON_UNESCAPED_UNICODE );
  }

  public function getProduto($id) {
    $produto = Product::find($id);
    return response()->json($produto);
  }

  public function addProduto(Request $request) {
    $produto = new Product;
    $produto->codProduto = $request->codProduto;
    $produto->nomeProduto = $request->nomeProduto;
    $produto->valorProduto = $request->valorProduto;
    $produto->estoque = $request->estoque;
    $produto->nomeCidade = $request->nomeCidade;

    if($produto->save()){
      return response()->json(['status' => true, 'message' => 'Produto adicionado com sucesso!']);
    } else {
      return response()->json(['status' => false, 'message' => 'Houve um problema. Tente novamente!']);
    }
  }

  public function deleteProduto($id) {
    $produto = Product::find($id);
    if($produto->delete()){
      return response()->json(['status' => true, 'message' => 'Produto deletado com sucesso!']);
    } else {
      return response()->json(['status' => false, 'message' => 'Houve um problema. Tente novamente!']);
    }
  }

  public function updateProduto(Request $request, $id) {
    $produto = Product::where('id',$id)->first();
    $produto->codProduto = $request->codProduto;
    $produto->nomeProduto = $request->nomeProduto;
    $produto->valorProduto = $request->valorProduto;
    $produto->estoque = $request->estoque;
    $produto->nomeCidade = $request->nomeCidade;

    if($produto->save()){
      return response()->json(['status' => true, 'message' => 'Produto editado com sucesso!']);
    } else {
      return response()->json(['status' => false, 'message' => 'Houve um problema. Tente novamente!']);
    }
  }

}
