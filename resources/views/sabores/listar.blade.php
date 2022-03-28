@extends('Admin.painel')
@section('content')
<script src="/admin/jquery.js"></script>
<script src="/admin/bootstrap.bundle.min.js"></script>

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
                <th scope="col">Preço</th>
                <th scope="col">Descrição</th>
                <th scope="col">Foto</th>
                <th scope="col">Acções</th>



              </tr>
            </thead>
            <tbody>
                @foreach ($produto as $listar )


              <tr>
                <th scope="row">{{ $listar->nome }}</th>
                <td>{{ $listar->preco}}</td>
                <td>{{ $listar->descricao }}</td>
                <td>{{ $listar->foto}}</td>
                <td>
                <div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
   
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="{{route('sabores.editar', $listar->id)}}">Editar</a>
    <a class="dropdown-item" href="{{route('sabores.eliminar', $listar->id)}}">Eliminar</a>
   <script>
       swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your imaginary file is safe!");
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