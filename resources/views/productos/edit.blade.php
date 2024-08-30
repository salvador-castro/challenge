@extends('layouts.crizal.app', [
    'components' => [
        'datatables',
        'bootstrap_toggle'
    ]
])

@section('title', 'Productos Edit')

@section('panel-header')
    @include('layouts.crizal._panel_header', [
        'title' => 'Editar Articulo',
        'icon' => 'fas fa-edit',
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
                    <form action="{{ route('producto.update', $producto) }}" method="post">
                        @csrf
                        @method('put')
                        @include('productos._form')
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