<div class="modal fade" id="modal-delete-role{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="modal-create-banco-title">
                    <i class="icon-wallet"></i> Rol :: <strong> {{ $role->denominacion }}</strong> ::
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('roles.forms.delete', [ 'role' => $role])
            </div>
        </div>
    </div>
</div>
