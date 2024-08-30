@extends('layouts.crizal.app', [
    'components' => [
        'datatables',
        'bootstrap_toggle'
    ]
])

@section('title', 'Inicio')

@section('panel-header')
    @include('layouts.crizal._panel_header', [
        'title' => 'Redes',
        'icon' => 'fas fa-sitemap',
        'subtitle' => 'Panel Principal',
        'links' => null
    ])
@endsection

@section('content')
    @include('flash::message')




    <div class="row">
        <div class="col-md-12">
            <div class="float-end">
                <!-- Modal trigger button -->
                <button type="button" class="btn btn-primary btn" data-bs-toggle="modal" data-bs-target="#agregarRed">
                    <i class="fas fa-plus"></i> Agregar
                </button>
                
                <!-- Modal Body -->
                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                <div class="modal fade" id="agregarRed" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="rednueva" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="rednueva">Agregar Red</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('redes.store') }}" method="post">
                                    @csrf
                                    @include('redes._form', [
                                        'red' => new App\Models\Red,
                                    ])
                                    @include('layouts.shared.btnModal', [
                                        'save' => 'Guardar',
                                    ])

                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <!-- Optional: Place to the bottom of scripts -->
                <script>
                    const myModal = new bootstrap.Modal(document.getElementById('agregarRed'), options)
                
                </script>
            </div>            
        </div>
    </div>
    <div class="row">
        @foreach ($redes as $red)
        <div class="col-md-4">
            <div class="card card-white">
                <div class="card-heading clearfix">
                    <h4 class="card-title">{{ $red->name }}</h4>
                </div>
                <div class="card-body">
                    <p>
                        {{ $red->description }}
                    </p>
                    <p>
                        <strong>Cajeros:</strong> {{ $red->users->count() }}
                    </p>

                    <div class="row">
                        <div class="col-6">
                            <a target="_blank" href="{{ route('link.whatsapp', $red->url) }}">
                                Link
                            </a>                            
                        </div>
                        <div class="col-6">
                            <div class="float-end">
                                <a href="{{ route('redes.edit', $red) }}">
                                    <i class="fas fa-edit"></i> Editar
                                </a>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
        @endforeach
    </div>




@endsection


@push('scripts')



    
@endpush
