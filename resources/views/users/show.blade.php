@extends('layouts.crizal.app', [
    'components' => [
        'datatables',
        'bootstrap_toggle'
    ]
])

@section('title', 'Inicio')

@section('panel-header')
    @include('layouts.crizal._panel_header', [
        'title' => 'Perfil de '.$user->email,
        'icon' => 'icon-user',
        'subtitle' => 'Perfil de usuario',
        'links' => null
    ])
@endsection

@section('content')
    @include('flash::message')


    @include('shared.indicadores', [ 'user' => $user ])
    

    <div class="row">
        <div class="col-md-6">
            @livewire('listado-movimientos-user', ['user' => $user])
        </div>
    </div>





@endsection


@push('scripts')



    
@endpush
