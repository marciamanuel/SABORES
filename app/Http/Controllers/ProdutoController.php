<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

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

        $validated = $request->validate([
            'nome' => 'bail|required|unique:produtos|max:255',
            'preco' => 'required',
            'foto' => 'required',
            'descricao' => 'min:5',
        ]);

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


        return redirect()->route('sabores.listar');
    }
    else{
        produto::create([
            'nome'=>$request->nome,
            'preco'=>$request->preco,
            'foto'=>$request->foto,
            'descricao'=>$request->descricao,

        ]);


        return redirect()->route('sabores.listar');
    }

        }
            public function tabela(){

                $produto = Produto::all();
        return view('sabores.listar',compact('produto'));
            }

            public function edit($id){

                $produto = Produto:: where('id',$id)->first();
                return view('sabores.editar',compact('produto'));
            }

            public function update(Request $request,$id){



                if($request->hasFile('foto') && $request->file('foto')->isValid()){
                    $request_imagem=$request->foto;
                    $extension=$request_imagem->extension();
                    $imagem_name=md5($request_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
                    $destino=$request_imagem->move(public_path("imagens/produto"), $imagem_name);
                    $dir = "/imagens/produto";
                    $caminho=$dir. "/". $imagem_name;
    
    
                    produto::where('id',$id)->update([
                        'nome'=>$request->nome,
                        'preco'=>$request->preco,
                        'foto'=>$caminho,
                        'descricao'=>$request->descricao,
                    ]);
    
    
                    return redirect()->route('sabores.listar');
                }
                else{
                    produto::where('id',$id)->update([
                        'nome'=>$request->nome,
                        'preco'=>$request->preco,
                        'foto'=>$request->foto,
                        'descricao'=>$request->descricao,
    
    
                    ]);
    
    
                    return redirect()->route('sabores.listar');
                }

              
    


    
}



public function eliminar($id){
    $produto = Produto::where('id',$id)->delete(); 

    return redirect()->route('sabores.listar');
}

}