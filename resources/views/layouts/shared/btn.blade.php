<div class="float-end">
    @if (!is_null($cancelar))
    <a href="{{ $cancelar }}" role="button" class="btn btn-light mr-3 ml-2">
        <i class="ti-close"></i> Cancelar
    </a>    
    @endif
    
    <button type="submit" class="btn btn-{{ $color ?? 'primary' }} btn-outline form-submit">
        <i class="ti-save"></i> {{ $text ?? 'Guardar Cambios' }}
    </button>
    
    <button type="button" class="btn btn-{{ $color ?? 'primary' }} btn-outline disabled form-loader d-none">
        <i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Guardando ...
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
</div>