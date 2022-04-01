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
          <form action="{{route('users.atualizar',$user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="exampleInputEmail1">Nome</label>
              <input type="text" class="form-control" id="name" value="{{ isset($user->name) ? $user->name : "" }}" name="name" aria-describedby="emailHelp" placeholder="digite o seu nome" style="border-radius:25px">

            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="digite o seu email" style="border-radius:25px">

            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Password</label>
              <input type="text" class="form-control" id="password" value="{{ isset($user->password) ? $user->password : "" }}" name="password" aria-describedby="emailHelp" placeholder="digite a sua password" style="border-radius:25px">

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
<script>
              swal("O registro foi atualizado com suceso!", {
                icon: "success",
              });
            </script>
@endsection