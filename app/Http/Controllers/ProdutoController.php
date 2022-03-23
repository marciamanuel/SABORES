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
}
