@extends('Admin.painel')
@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
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
                        <form action="{{route('index.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                          <div class="form-group">
                              <label for="exampleInputEmail1">Nome</label>
                              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value= "{{ isset($user->nome) ? $user->name : "" }}" name="name" aria-describedby="emailHelp"
                                placeholder="digite o seu nome" style="border-radius:25px">
  
                            </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"  id="email" value= "{{ isset($user->email) ? $user->email : "" }}"  name="email" aria-describedby="emailHelp"
                              placeholder="digite o email" style="border-radius:25px">
  
                          </div>
                          
                            <div class="form-group">
                              <label for="description">Password</label>
                              <input type="text" class="form-control @error('password') is-invalid @enderror" id="password"  name="password"  aria-describedby="emailHelp"
                                placeholder="digite a password" style="border-radius:25px">
  
                            </div>
  
                          
  
                          <div class="d-flex justify-content-center">
                          <button type="submit" class="btn btn-primary">Cadastrar</button>
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

    @error('name')
    

    <script>
      swal({
  title: "Nome",
  text: "{{ $message  }}",
  icon: "error",
  button: "OK",
});
    </script>
@enderror

@error('email')
    <div class="alert alert-danger"></div>
    <script>
      swal({
  title: "Email",
  text: "{{ $message }}",
  icon: "error",
  button: "OK",
});
    </script>
@enderror

@error('Password')
    
    <script>
      swal({
  title: "Password",
  text: "{{ $message }}",
  icon: "error",
  button: "OK",
});
    </script>
@enderror





                                    @endsection
