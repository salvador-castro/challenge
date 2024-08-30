@extends('layouts.crizal.app', [
    'components' => [
        'bootstrap_toggle'
    ]
])

@section('title', 'Gestion de Roles')

@section('panel-header')
    @include('layouts.crizal._panel_header', [
        'title' => 'Gestión de Roles',
        'icon' => 'fas fa-lock',
        'subtitle' => 'Panel Principal',
        'links' => null
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-12 mb-3">
            <a href="{{ route('roles.index') }}" class="btn btn-primary">
                <i class="icon-arrow-left"></i> Volver
            </a>
        </div>
        <div class="col-12">
            @include('flash::message')
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">
                            <i class="icon-plus"></i> Crear Rol
                        </div>
                        <div class="card-tools">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="pills-datos" role="tabpanel" aria-labelledby="pills-datos-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('roles.store') }}" method="post">
                                    @csrf
                                    <input autocomplete="false" type="hidden" type="text" style="display:none;">
                                    <fieldset class="mb-4">
                                        <div class="row">
                                            <div class="col-lg-12">

                                                <div class="row">
                                                    <div class="col-lg-5 col-md-12">
                                                        <label for="name">Nombre</label>
                                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="no utilizar espacios" required>
                                                        {{-- {{ Form::inputGroup([
                                                            'name' => 'name',
                                                            'label' => 'Nombre Rol',
                                                            'placeholder' => 'no utilizar espacios',
                                                            'extra' => 'autocomplete=a',
                                                            'required' => true,
                                                            'value' => old('name')
                                                        ], $errors) }} --}}
                                                    </div>
                                                </div>
                                                @include('roles._permissions')
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                @include('layouts.shared.btn', [
                                                    'text' => 'Guardar',
                                                    'color' => 'primary',
                                                    'cancelar' => route('roles.index')
                                                ])
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@push('scripts')
    <script>
        $(document).ready(function() {
            $('#name').on('keyup', function() {
                var name = $(this).val();
                var slug = name.replace(' ', '').toLowerCase();
                $('#name').val(slug);
            });
        });
    </script>
@endpush