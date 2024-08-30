@extends('layouts.crizal.app', [
    'components' => ['datatables', 'bootstrap_toggle'],
])

@section('title', 'Productos')

@section('panel-header')
    @include('layouts.crizal._panel_header', [
        'title' => 'Nuevo Artículo',
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
                    <h4 class="card-title">Crear Nuevo</h4>

                    <form action="{{ route('producto.store') }}" method="POST">
                        @csrf
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
