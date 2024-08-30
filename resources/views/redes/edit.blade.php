@extends('layouts.crizal.app', [
    'components' => [
        'datatables',
        'bootstrap_toggle'
    ]
])

@section('title', 'Inicio')

@section('panel-header')
    @include('layouts.crizal._panel_header', [
        'title' => 'Red - '.$red->name,
        'icon' => 'fas fa-sitemap',
        'subtitle' => 'Panel Principal',
        'links' => null
    ])
@endsection

@section('content')
    @include('flash::message')

    <div class="row">
        <div class="col-md-4">
            <div class="card card-white">
              <div class="card-body">
                <form action="{{ route('redes.update',$red) }}" method="post">
                    @csrf
                    @include('redes._form', [
                        'red' => $red,
                    ])

                    @include('layouts.shared.btn', [
                        'cancelar' => route('redes.index'),
                        'save' => 'Guardar',
                    ])

                </form>
              </div>
            </div>
        </div>
        <div class="col-md-8">
            @livewire('cajero-red', ['red' => $red])
        </div>
    </div>




@endsection


@push('scripts')



    
@endpush
