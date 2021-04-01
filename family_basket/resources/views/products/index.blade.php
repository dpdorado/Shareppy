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
<div class="container-fluid">
    <div class="card">
        <div class="card-header ">                            
            <h4 class="display-4">Productos</h4>    
            
            <div class="float-right">
                <a style="margin: 19px;" href="{{ route('products.create')}}" class="btn btn-primary">Agregar producto</a>
            </div>         
        </div>
        <div class="card-body">
            <div class="row">    
                <div class="col-12">       
                    <!-- column -->
                    <div class="row">
                        @forelse($products as $product)
                        <div class="col-lg-3 col-md-6">
                            <!-- Card -->
                            <div class="card  border border-primary">                    
                                <img class="card-img-top img-responsive" src='/uploads/{{$product->img_path}}' alt="Card image cap">                                
                                <div class="card-body">
                                    <h4 class="card-title">{{$product->name}}</h4>
                                    <div class="card-text">
                                        <p>{{$product->description}}</p>                                        
                                    </div>                        
                                    <div class="row">                                    
                                            <a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Editar</a>
                                        
                                            <form action="{{ route('products.destroy', $product->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Borrar</button>
                                            </form>
                                    </div>
                                    <!--<button class="btn btn-primary" (click)="listBuy(restaurant.id)" role="button">Ingresar</button>-->                                    
                                </div>
                            </div>
                            <!-- Card -->
                        </div>
                        <!-- column -->
                        @empty
                            <p>No se encontraron usuarios registrados.</p>
                        @endforelse 
                                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

