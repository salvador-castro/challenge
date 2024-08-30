<form action="{{ route('roles.update', $role) }}" method="post">
@csrf
@include('roles.forms.fields', ['role' => $role])

<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            @include('layouts.shared.btn', [
                'cancelar' => route('roles.index'),
            ])
        </div>
    </div>
</div>

</form>


@push('scripts')
    <script>
        $(document).ready(function() {
            $('#name').on('keyup', function() {
                var name = $(this).val();
                var slug = name.replace(' ', '');
                $('#name').val(slug);
            });
        });
    </script>
@endpush