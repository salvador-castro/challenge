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
                                @foreach ($productos as $producto)
                                    {{-- {{ dd($producto) }} --}}
                                @endforeach
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
