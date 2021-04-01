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
<div class="container">
    <div class="row">
       <div class="col-sm-12 bg-light">           
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
                </thead>
                <tbody>
                @forelse($carts as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->count}}</td>
                            <td>
                                <form action="{{ route('carts.destroy', $item->id)}}" method="post">                                    
                                    @csrf
                                    @method('DELETE')                                    
                                    <button type="submit" class="btn btn-link btn-sm text-danger">x</button>
                                </form>
                                
                            </td>
                        </tr>                    
                        @empty
                            <p>No se encontraron producto registrados.</p>
            @endforelse 
                </tbody>
            </table>                        

       </div>
       
    </div>
</div>
@endsection