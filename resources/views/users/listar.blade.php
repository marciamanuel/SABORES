@extends('Admin.painel')
@section('content')
<script src="/admin/jquery.js"></script>
<script src="/admin/bootstrap.bundle.min.js"></script>
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




          <table class="table mb-5">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                



              </tr>
            </thead>
            <tbody>
                @foreach ($user as $listar )


              <tr>
                <th scope="row">{{ $listar->name }}</th>
                <td>{{ $listar->email}}</td>
                <td>{{ $listar->password }}</td>
               
                <td>
                <div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
   
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="{{route('users.editar', $listar->id)}}">Editar</a>
    <a class="dropdown-item" href="{{route('users.eliminar', $listar->id)}}">Eliminar</a>
   <script>
       swal({
  title: "Tens a certeza?",
  text: "O registro será eliminado!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("O registro foi apagado com suceso!", {
      icon: "success",
    });
  } 
});
   </script>
  </div>
</div>


                </td>

              </tr>
              @endforeach
            </tbody>
          </table>
         

@endsection