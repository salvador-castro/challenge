<button type="button" class="btn btn-light mr-3" data-bs-dismiss="modal">
    Cerrar
</button>
<button type="submit" class="btn btn-{{ $btn ?? 'primary' }} btn-outline float-end form-submit">
    {!! $save ?? 'Guardar Cambios' !!}
</button>

<button type="button" class="btn btn-primary btn-outline disabled form-loader d-none float-end">
    <i class="fa fa-cog fa-spin"></i> {{ $load ?? 'Guardando ...' }}
</button>


@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.form-submit')
                .parents('form')
                .on('submit', function(event){
                    event.preventDefault();

                    $(event.target)
                        .find('.form-submit')
                        .addClass('d-none');

                    $(event.target)
                        .find('.form-loader')
                        .removeClass('d-none');

                    this.submit();
                });
        });
    </script>
@endpush
