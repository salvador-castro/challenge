<form action="{{ route('roles.delete', $role) }}" method="post">
@csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <h4 class="text-center">Está seguro que desea eliminar el rol <strong>{{$role->name}}</strong>?</h4>
                <h3 class="text-center text-danger"><i class="icon-exclamation"></i> Esta acción no puede revertirse.</h3>
                @include('layouts.shared.btnModal', [
                    'text' => 'Eliminar',
                    'color' => 'danger',
                ])
            </div>
        </div>
    </div>
</form>
