@extends('layouts.crizal.app', [
    'components' => [
        'datatables',
        'bootstrap_toggle'
    ]
])

@section('title', 'Inicio')

@section('panel-header')
    @include('layouts.crizal._panel_header', [
        'title' => 'Bienvenido',
        'icon' => 'icon-user',
        'subtitle' => 'Panel Principal',
        'links' => null
    ])
@endsection

@section('content')
    @include('flash::message')


    @include('shared.indicadores', [ 'user' => new App\Models\User() ])



    @include('dashboard.cajeros')








  
  





@endsection


@push('styles')

<link rel="stylesheet" href="{{ asset('templates/crizal/plugins/full-calendar/core/main.css') }}" />
<link rel="stylesheet" href="{{ asset('templates/crizal/plugins/full-calendar/daygrid/main.css') }}" />
<link rel="stylesheet" href="{{ asset('templates/crizal/plugins/full-calendar/timegrid/main.css') }}" />
<link rel="stylesheet" href="{{ asset('templates/crizal/plugins/full-calendar/list/main.css') }}" />

@endpush



@push('scripts')



@endpush