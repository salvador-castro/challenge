@extends('layouts.crizal.app', [
    'components' => ['datatables', 'bootstrap_toggle'],
])

@section('title', 'Productos Listar')

@section('panel-header')
    @include('layouts.crizal._panel_header', [
        'title' => 'Artículos',
        'icon' => 'fas fa-newspaper',
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

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Titulo</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Categoría</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($productos as $producto)
                                    <tr>
                                        <td>{{ $producto->id }}</td>
                                        <td>{{ $producto->titulo }}</td>
                                        <td>{{ $producto->descripcion }}</td>
                                        <td>{{ $producto->precio }}</td>
                                        <td>{{ $producto->categoria }}</td>
                                        <td>
                                            <a href="{{ route('producto.show', $producto->id) }}" class="btn btn-info btn-sm">Ver</a>
                                            <a href="{{ route('producto.edit', $producto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('producto.destroy', $producto->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?');">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No hay productos disponibles.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

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
