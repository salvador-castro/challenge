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
                            <i class="icon-pencil"></i> Editar Rol :: <strong> {{ $role->name }} </strong> ::
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
                                    @include('roles.forms.edit', ['role' => $role])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

