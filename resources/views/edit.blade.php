@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar producto</h2>
    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="sell_price">Precio de compra:</label>
            <input type="number" name="sell_price" value="{{ $product->sell_price }}" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="price">Precio de venta:</label>
            <input type="number" name="price" value="{{ $product->price }}" class="form-control">
        </div>
        
        <button type="submit" class="btn btn-dark ml-5">Actualizar</button>
    </form>
</div>
@endsection
