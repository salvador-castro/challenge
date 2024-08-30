@extends('layouts.crizal.app', [
    'components' => [
        'datatables',
        'bootstrap_toggle'
    ]
])

@section('title', 'Usuarios')

@section('panel-header')
    @include('layouts.crizal._panel_header', [
        'title' => 'Alta de Usuario',
        'icon' => 'fas fa-users-cog',
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
                    <h4 class="card-title">Crear Nuevo</h4>

                    <form action="{{ route('user.store') }}" method="post">
                        @csrf

                        @include('users._form', [
                            'user' => new App\Models\User
                        ])
                    
                    </form>
                    

                </div>
            </div>
            
        </div>
    </div>



@endsection


@push('scripts')



    
@endpush
