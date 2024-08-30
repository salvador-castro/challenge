@extends('layouts.crizal.app', [
    'components' => [
        'datatables',
        'bootstrap_toggle'
    ]
])

@section('title', 'Inicio')

@section('panel-header')
    @include('layouts.crizal._panel_header', [
        'title' => 'Mi Perfil',
        'icon' => 'icon-user',
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
                    <h4 class="card-title">Datos de Usuario</h4>
                    <form action="{{ route('user.updatePerfil') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                          <label for="avatar" class="form-label">Cambiar Foto de Perfil</label>
                          <input type="file" class="form-control" name="avatar" id="avatar">
                          @error('avatar')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for="name">Nombre</label>
                          <input required value="{{ old('name', $user->name) }}" type="text"
                            class="form-control" name="name" id="name" placeholder="Ingresar Nombre">
                            @error('name')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input required value="{{ old('email', $user->email) }}" type="email"
                            class="form-control" name="email" id="email" placeholder="Ingresar Email">
                            @error('email')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for="phone" class="form-label">Teléfono Celular</label>
                          <input required value="{{ old('phone', $user->phone) }}" type="text" class="form-control" name="phone" id="phoneAdd" placeholder="Código de pais + teléfono con codigo de area sin el 15">
                          <small>Ej: (549)115778-9999</small>
                          <small class="text-danger" id="phoneAddMsg"></small>
                          @error('phone')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>


                        
                        
                        {{-- <div class="mb-3">
                          <label for="numero" class="form-label">Tu Número Favorito</label>
                          <input type="text" class="form-control" name="numero" id="numero" value="{{ Auth::user()->numero }}">
                          @error('numero')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}

                        @include('layouts.shared.btn', [
                            'text' => 'Actualizar',
                            'cancelar' => null,
                        ])

                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection


@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script>


    $(document).ready(function(){
      
      $("#phoneAdd").mask("(999)99-9999-9999");

      $("#phoneAdd").on("blur", function() {
          var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );
          
          if( last.length == 9 ) {
            $('#phoneAdd').removeClass('is-invalid');
            $('#phoneAddMsg').html('');
          }else{
            $('#phoneAdd').addClass('is-invalid');
            $('#phoneAddMsg').html('Ingresar un celular valido');
          }
      });


    });


</script>

    
@endpush
