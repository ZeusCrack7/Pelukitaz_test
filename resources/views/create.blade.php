@extends('layouts.app')

@section('content')
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container" style="margin-top: 80px">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h4>Agregar nuevo producto</h4>
                    <div class="mb-2">
                        <input class="form-control" type="text" name="name" placeholder="Nombre del item" aria-label="default input example">
                        <input class="form-control mt-2" type="text" name="sell_price" placeholder="Precio de compra" aria-label="default input example">
                        <input class="form-control mt-2" type="text" name="price" placeholder="Precio de venta" aria-label="default input example">
                        <input class="form-control mt-2" type="text" name="existencia" placeholder="Cantidad" aria-label="default input example">
                    </div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Categoría</button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <button type="button" class="btn btn-primary" data-category-id="1">Dulces Picosos</button>
                                    <button type="button" class="btn btn-primary" data-category-id="2">Bebidas</button>
                                    <button type="button" class="btn btn-primary" data-category-id="3">Chocolates</button>
                                    <button type="button" class="btn btn-primary" data-category-id="4">Dulces</button>
                                    <button type="button" class="btn btn-primary" data-category-id="5">Productos y accesorios</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="formFile" class="form-label mt-4">Inserte imagen del item</label>
                    <input class="form-control" type="file" name="image_path" id="formFile">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-dark ml-5">Guardar cambios</button>
    </form>
@endsection