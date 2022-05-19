<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Models\Produto;

class ProdutoController extends Controller
{
    public function index(){
        $produto = Produto::all();
        return view('welcome',compact('produto'));

    }

    public function create(){
        return view('sabores.create');
    }
    public function store(Request $request){

     if($request->hasFile('foto') && $request->file('foto')->isValid()){
        $request_imagem=$request->foto;
        $extension=$request_imagem->extension();
        $imagem_name=md5($request_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
        $destino=$request_imagem->move(public_path("imagens/produto"), $imagem_name);
        $dir = "/imagens/produto";
        $caminho=$dir. "/". $imagem_name;


        produto::create([
            'nome'=>$request->nome,
            'preco'=>$request->preco,
            'foto'=>$caminho,
            'descricao'=>$request->descricao,



        ]);


        return redirect()->route('pedido.tabela');
    }
    else{
        produto::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'qty'=>$request->qty,
            'image'=>$request->image,
            'description'=>$request->description,


        ]);


        return redirect()->route('pedido.tabela');
    }

}

    
}
