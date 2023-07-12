@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 80px">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between">
                        <h4>Inventario de productos</h4>
                        <h4>Agregar nuevo(s) producto(s)<a href="{{ route('products.create') }}" class="ml-2 btn btn-success btn-sm"><i class="bi bi-plus-circle fs-6" ></i></a></h4>                        
                        <h4>Inserte filtro aquí</h4>
                    </div>
                </div>
                <hr>
                <ul class="list-group">
                    @foreach($products as $pro)
                    @if($pro->category_id !== 1)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">
                                    <img src="/images/{{ $pro->image_path }}"
                                        class="card-img-top mx-auto"
                                        style="height: 80px; width: 80px;display: block;"
                                        alt="{{ $pro->image_path }}"
                                    >
                                </div>
                                <div class="col-lg-6">
                                    <a href=""><h6 class="card-title">{{ $pro->name }}</h6></a>
                                    <p>Precio de venta: ${{ $pro->price }}</p>
                                    <p>Existencia: {{ $pro->existencia }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $pro->id }}" id="id" name="id" >
                                        <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                        <input type="hidden" value="{{ $pro->price }}" id="price" name="price">
                                        <input type="hidden" value="{{ $pro->image_path }}" id="img" name="img">
                                        <input type="hidden" value="{{ $pro->slug }}" id="slug" name="slug">
                                        <input type="hidden" value="1" id="quantity" name="quantity">
                                        <button class="btn btn-secondary btn-sm mr-2">Botón 1</button>
                                        <button class="btn btn-dark btn-sm" style="margin-right: 10px;"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-2">
                                    <form action="{{ route('products.update', $pro->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <div class="d-flex justify-content-start">
                                            <label for="existencia">Existencias:</label>
                                            <input type="number" class="form-control form-control-s" id="existencia" name="existencia" value="{{ $pro->existencia }}">
                                            <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <hr>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection