@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 5px">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="col-lg-12">
                <div class="text">-</div>
                <div class="d-flex justify-content-between mt-3">
                    <hr>
                    <h4>Inventario de productos</h4>
                    <h4>Agregar nuevo(s) producto(s)<a href="{{ route('products.create') }}" class="ml-2 btn btn-success btn-sm"><i class="bi bi-plus-circle fs-6"></i></a></h4>
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
                                style="height: 80%; width: 60% ;display: block;"
                                alt="{{ $pro->image_path }}"
                            >
                        </div>
                        <div class="col-lg-6">
                            <h6 class="card-title mb-2">{{ $pro->name }}</h6>
                            <p>Precio de compra: ${{ $pro->sell_price }}</p>
                            <p>Precio de venta: ${{ $pro->price }}</p>
                            <p>Stock: {{ $pro->stock }}</p>
                            <p>Utilidad: {{ $pro->utilidades }}</p>
                            <p>Sucursal: {{ $pro->id_sucursal == 1 ? 'Guadalupe ' : 'Zacatecas' }}</p>
                        </div>
                        <div class="col-lg-3">
                            <form action="{{ route('cart.store') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $pro->id }}" id="id" name="id" >
                                <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                <input type="hidden" value="{{ $pro->sell_price }}" id="price" name="price">
                                <input type="hidden" value="{{ $pro->image_path }}" id="img" name="img">
                                <input type="hidden" value="{{ $pro->slug }}" id="slug" name="slug">
                                <input type="hidden" value="1" id="quantity" name="quantity">
                            </form>
                            <form action="{{ route('products.destroy', $pro->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-sm" style="margin-right: 10px;"><i class="fa fa-trash"></i></button>
                            </form>
                            <a href="{{ route('products.edit', $pro->id) }}" class="btn btn-warning btn-sm mt-2"><i class="fa fa-edit"></i></a>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-2">
                            <form action="{{ route('inventory.store') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $pro->id }}" name="product_id">
                                <input type="number" class="form-control form-control-s" name="quantity" placeholder="Agregar inventario">
                                <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-plus-circle fs-6"></i></button>
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
