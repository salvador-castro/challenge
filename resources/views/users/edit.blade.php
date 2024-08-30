@extends('layouts.crizal.app', [
    'components' => [
        'datatables',
        'bootstrap_toggle'
    ]
])

@section('title', 'Usuarios')

@section('panel-header')
    @include('layouts.crizal._panel_header', [
        'title' => 'Editar Usuario',
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

                    <form action="{{ route('user.update',$user) }}" method="post">
                        @csrf

                        @include('users._form', [
                            'user' => $user
                        ])
                    
                    </form>
                    

                </div>
            </div>
            
        </div>
    </div>



@endsection


@push('scripts')



    
@endpush
