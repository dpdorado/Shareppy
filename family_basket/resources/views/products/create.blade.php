@extends('dashboard')
@section('nav')
<nav class="">
        <div class="nav flex-column " aria-orientation="vertical" >          
            <ul class="nav navbar-nav nav-pills nav-fill">
                <li class="nav-item" id="home">
                    <a class="nav-link" href="" >Home</a>
                </li>
                <li class="nav-item" id="clientes">
                    <a class="nav-link" href="{{ url('users')}}">Usuarios</a>          
                </li>
                <li class="nav-item" id="facturas">
                    <a class="nav-link active" href="{{ url('products')}}">Productos</a>
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
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Registrar producto</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif    
      <form method="post" action="{{ route('products.store') }} " accept-charset="UTF-8" enctype="multipart/form-data">
          @csrf     
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" name="name" value="" />
            </div>

            <div class="form-group">
                <label for="description">Descripcion:</label>
                <input type=text class="form-control" name="description" value="" />
            </div>

            <div class="form-group">
                <label for="price">Precio:</label>
                <input type=text class="form-control" name="price" value="" />
            </div>
                       
            <div class="form-group">
              <label class="col-md-4 control-label">Nuevo Archivo</label>
              <div class="col-md-6">                
                <input accept="image/*" type="file" name="imagen"  class="form-control">
              </div>
            </div>
                              
          <div class="text-right">
            <a href="{{ route('users.index')}}" class="btn btn-danger">Cancelar y volver</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
      </form>
  </div>
</div>
</div>
@endsection
