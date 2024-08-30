@extends('layouts.crizal.app', [
    'components' => [
        'datatables',
        'bootstrap_toggle'
    ]
])

@section('title', 'Inicio')

@section('panel-header')
    @include('layouts.crizal._panel_header', [
        'title' => 'Red',
        'icon' => 'fas fa-sitemap',
        'subtitle' => 'Panel Principal',
        'links' => null
    ])
@endsection

@section('content')
    @include('flash::message')


    <div class="row">
        <div class="col-md-12">
            
        </div>
    </div>




@endsection


@push('scripts')



    
@endpush
