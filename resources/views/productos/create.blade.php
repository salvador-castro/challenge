@extends('layouts.crizal.app', [
    'components' => ['datatables', 'bootstrap_toggle'],
])

@section('title', 'Crear Producto')

@section('panel-header')
    @include('layouts.crizal._panel_header', [
        'title' => 'Crear Producto',
        'icon' => 'fas fa-plus-circle',
        'subtitle' => 'Panel Principal',
        'links' => null,
    ])
@endsection

@section('content')
    @include('flash::message')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('producto.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="titulo">Titulo:</label>
                            <input type="text" name="titulo" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea name="descripcion" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio:</label>
                            <input type="number" name="precio" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoría:</label>
                            <input type="text" name="categoria" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear Producto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
@endpush
