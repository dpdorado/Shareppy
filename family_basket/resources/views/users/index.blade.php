@extends('dashboard')
@section('nav')
    <nav class="">
        <div class="nav flex-column " aria-orientation="vertical" >          
            <ul class="nav navbar-nav nav-pills nav-fill">
                <li class="nav-item" id="home">
                    <a class="nav-link" href="" >Home</a>
                </li>
                <li class="nav-item" id="clientes">
                    <a class="nav-link active" href="{{ url('users')}}">Usuarios</a>          
                </li>
                <li class="nav-item" id="facturas">
                    <a class="nav-link" href="">------</a>
                </li>
                <li class="nav-item" id="ofrendas">
                    <a class="nav-link" href="">------</a>
                </li>
                <li class="nav-item" id="categorias">
                    <a class="nav-link" href="">------</a>
                </li>
            </ul>
        </div>
    </nav>
@endsection
@section('main')
<div class="row">


<div class="col-sm-12">
  <div class="">
    
    <h4 class="display-4">Usuarios</h4>    
    
    <div class="float-right">
        <a style="margin: 19px;" href="{{ route('users.create')}}" class="btn btn-primary">Agregar usuario</a>
    </div> 
  </div>

  <div class="col-sm-12">

    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div>
    @endif

    @if(session()->get('failed'))
      <div class="alert alert-danger">
        {{ session()->get('failed') }}  
      </div>
    @endif
  </div>  
  <div class="table-responsive">
        <table class="table table-striped table-condensed table-bordered table-hover">
            <thead>
                <tr>
                <td>Id</td>
                <td>Nombre</td>
                <td>E-mail</td>
                <td>Rol</td>
                <td class="col-sm-2">Contraseña</td>          
                <td colspan = 2>Opciones</td>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->roles[0]->description}}</td>
                    <td>{{$user->password}}</td>
                    <td>
                        <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <p>No se encontraron usuarios registrados.</p>
                @endforelse                
            </tbody>
        </table>
        </div>
    <div>
    {{ $users->links() }}
  </div>
<div>
</div>
@endsection