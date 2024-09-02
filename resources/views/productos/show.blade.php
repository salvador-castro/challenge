@extends('layouts.crizal.app', [
    'components' => [
        'datatables',
        'bootstrap_toggle'
    ]
])

@section('title', 'Detalle del Producto')

@section('panel-header')
    @include('layouts.crizal._panel_header', [
        'title' => 'Detalles del Producto',
        'icon' => 'fas fa-info-circle',
        'subtitle' => 'Panel Principal',
        'links' => null
    ])
@endsection

@section('content')
    @include('flash::message')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $producto->titulo }}</h3>
                    <p>{{ $producto->descripcion }}</p>
                    <p>Precio: {{ $producto->precio }}</p>
                    <p>Categoría: {{ $producto->categoria }}</p>

                    <a href="{{ route('producto.index') }}" class="btn btn-primary">Volver a la lista</a>
                    <a href="{{ route('producto.edit', $producto->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('producto.destroy', $producto->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?');">Eliminar</button>
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
