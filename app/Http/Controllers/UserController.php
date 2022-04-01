<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
        return view('welcome',compact('user'));

    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'bail|required|unique:produtos|max:255',
            'email' => 'required',
            'password' => 'required',
         
        ]);

    if($request->hasFile('foto') && $request->file('foto')->isValid()){
        $request_imagem=$request->foto;
        $extension=$request_imagem->extension();
        $imagem_name=md5($request_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
        $destino=$request_imagem->move(public_path("imagens/produto"), $imagem_name);
        $dir = "/imagens/produto";
        $caminho=$dir. "/". $imagem_name;


        user::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,



        ]);


        return redirect()->route('users.listar');
    }
    else{
        user::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
         
        ]);


        return redirect()->route('users.listar');
    }

        }
            public function tabela(){

                $user = User::all();
        return view('users.listar',compact('user'));
            }

            public function edit($id){

                $user = User:: where('id',$id)->first();
                return view('users.editar',compact('produto'));
            }

            public function update(Request $request,$id){



                if($request->hasFile('foto') && $request->file('foto')->isValid()){
                    $request_imagem=$request->foto;
                    $extension=$request_imagem->extension();
                    $imagem_name=md5($request_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
                    $destino=$request_imagem->move(public_path("imagens/produto"), $imagem_name);
                    $dir = "/imagens/produto";
                    $caminho=$dir. "/". $imagem_name;
    
    
                    user::where('id',$id)->update([
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'password'=>$request->password,
                    ]);
    
    
                    return redirect()->route('users.listar');
                }
                else{
                    user::where('id',$id)->update([
                        'name'=>$request->name,
                        'email'=>$request->preco,
                        'password'=>$request->foto,
                      
    
    
                    ]);
    
    
                    return redirect()->route('users.listar');
                }

              
    


    
}



public function eliminar($id){
    $user = User::where('id',$id)->delete(); 

    return redirect()->route('users.listar');
}
}
