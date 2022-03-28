@extends('Admin.painel')
@section('content')
  
            <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
              </ol>
            </div>
  
  
  
  
  
              <div class="row d-flex justify-content-center mb-5 w-100">
                  <div class="col-lg-6">
                    <!-- Form Basic -->
                    <div class="card mb-4">
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
  
                      </div>
                      <div class="card-body">
                        <form action="{{route('sabores.atualizar',$produto->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                          <div class="form-group">
                              <label for="exampleInputEmail1">Nome</label>
                              <input type="text" class="form-control" id="nome" value= "{{ isset($produto->nome) ? $produto->nome : "" }}" name="nome" aria-describedby="emailHelp"
                                placeholder="digite o nome do produto" style="border-radius:25px">
  
                            </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Preço</label>
                            <input type="number" class="form-control" id="preco" value= "{{ isset($produto->preco) ? $produto->preco : "" }}"  name="preco" aria-describedby="emailHelp"
                              placeholder="digite o preço do produto" style="border-radius:25px">
  
                          </div>
                          
                            <div class="form-group">
                              <label for="description">Descrição</label>
                              <input type="text" class="form-control" id="descricao"  name="descricao"  aria-describedby="emailHelp"
                                placeholder="digite a quantidade do produto" style="border-radius:25px">
  
                            </div>
  
                          <div class="form-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" value= "{{ isset($produto->foto) ? $produto->foto : "" }}" id="foto" name="foto" style="border-radius:25px; color:black">
                              <label class="custom-file-label" for="customFile" style="border-radius:25px">fotográfia</label>
                            </div>
                          </div>
  
                          <div class="d-flex justify-content-center">
                          <button type="submit" class="btn btn-primary">Atualizar</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
              </div>
  
  
          </div>
          <!---Container Fluid-->
        </div>
        <!-- Footer -->
  
        <!-- Footer -->
      </div>
    </div> 
                                    @endsection
