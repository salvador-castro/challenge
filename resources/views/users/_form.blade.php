<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
          <label for="" class="form-label">Nombre</label>
          <input value="{{ $user->name ?? '' }}" type="text"
            class="form-control" name="name" id="" aria-describedby="helpId" placeholder="Ingresar Nombre">
            @error('name')
                <small id="helpId" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
          <label for="" class="form-label">Usuario</label>
          <input value="{{ $user->email ?? '' }}" type="text"
            class="form-control" name="email" id="" aria-describedby="helpId" placeholder="Ingresar Nombre con el que inicia sesión">
            @error('email')
                <small id="helpId" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono Celular</label>
            <input required value="{{ old('phone', $user->phone) }}" type="text" class="form-control" name="phone" id="phoneAdd" placeholder="Código de pais + teléfono con codigo de area sin el 15">
            <small>Ej: (549)115778-9999</small>
            <small class="text-danger" id="phoneAddMsg"></small>
            @error('phone')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
          <label for="" class="form-label">Password</label>
          <input type="password"
            class="form-control" name="password" id="" aria-describedby="helpId" placeholder="Ingresar Password">
            @error('password')
                <small id="helpId" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
          <label for="" class="form-label">Porcentaje</label>
          <input value="{{ old('porcentaje', $user->porcentaje) }}" required min="0" max="100" type="porcentaje"
            class="form-control" name="porcentaje" id="" aria-describedby="helpId" placeholder="Ingresar porcentaje">
            @error('porcentaje')
                <small id="helpId" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <input name="active" type="checkbox" data-toggle="toggle" data-on="1" data-off="0" data-onstyle="success" data-offstyle="danger" data-size="mini" {{ $user->active ? 'checked' : '' }}>
        <label class="form-check-label" for="">Activo</label>
    </div>
    <div class="col-md-12 mt-3">
        <h4 class="card-title">Asignar Roles</h4>
        @foreach ($roles as $role)
            <div class="checkbox">
                <label for="ch-{{$role->name}}">
                    <input {{$user->roles->contains($role->id) ? 'checked' : ''}} type="checkbox" name="roles[]" id="ch-{{$role->name}}" value="{{$role->name}}">
                    {{$role->name}}
                    <br>
                    <small class="text-muted">{{ $role->permissions->pluck('display_name')->implode(', ') }}</small>
                </label>
            </div>
        @endforeach
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('layouts.shared.btn', [
            'text' => 'Guardar',
            'color' => 'primary',
            'cancelar' => route('user.index')
        ])
    </div>
</div>



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
