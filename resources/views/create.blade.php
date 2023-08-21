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
                    <input type="hidden" name="category_id" id="category_id" value="">
                    <input type="hidden" name="id_sucursal" id="id_sucursal" value="">
                </div>
                <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        Categoría
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <button type="button" class="btn btn-dark category-button" data-category-id="4">Dulces Picosos</button>
                        <button type="button" class="btn btn-dark category-button" data-category-id="6">Bebidas</button>
                        <button type="button" class="btn btn-dark category-button" data-category-id="5">Chocolates</button>
                        <button type="button" class="btn btn-dark category-button" data-category-id="7">Dulces</button>
                        <button type="button" class="btn btn-dark category-button" data-category-id="2">Productos y accesorios</button>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        Sucursal
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <button type="button" class="btn btn-dark sucursal-button" data-sucursal-id="1">Zacatecas</button>
                        <button type="button" class="btn btn-dark sucursal-button" data-sucursal-id="2">Guadalupe</button>
                    </div>
                </div>
            </div>
                </div>
                <label for="formFile" class="form-label mt-4">Inserte imagen del item</label>
                <input accept="image/*" class="form-control" type="file" name="image_path" id="formFile">
            </div>
        </div>
        </div>
        <button type="submit" class="btn btn-dark ml-5">Guardar cambios</button>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.category-button').on('click', function() {
            var categoryId = $(this).data('category-id');
            $('#category_id').val(categoryId);
        });

        $('.sucursal-button').on('click', function() {
            var sucursalId = $(this).data('sucursal-id');
            $('#id_sucursal').val(sucursalId);
        });
    });
</script>
@endsection
