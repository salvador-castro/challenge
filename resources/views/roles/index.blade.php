@extends('layouts.crizal.app', [
    'components' => [
        'datatables'
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
    @include('flash::message')
    <div class="row">
        <div class="col-12 mb-3">
            <a class="btn btn-primary" href="{{ route('roles.create') }}">
                <i class="icon-plus"></i> Nuevo Rol
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @include('roles.tables.list')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
