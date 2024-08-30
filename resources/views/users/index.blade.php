@extends('layouts.crizal.app', [
    'components' => [
        'datatables',
        'bootstrap_toggle'
    ]
])

@section('title', 'Inicio')

@section('panel-header')
    @include('layouts.crizal._panel_header', [
        'title' => 'Usuarios',
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
                    {{-- <h4 class="card-title">Title</h4> --}}
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="users-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $u)
                                    <tr>
                                        <td>{{ $u->id }}</td>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>
                                            @if ($u->active == 1)
                                                <span class="badge bg-success">Activo</span>
                                            @else
                                                <span class="badge bg-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('user.edit', $u) }}" class="btn btn-info btn-sm text-white"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('user.show', $u) }}" class="btn btn-warning btn-sm text-white"><i class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            
        </div>
    </div>



@endsection


@push('scripts')



    
@endpush
