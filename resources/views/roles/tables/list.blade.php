<table id="tabla-roles" class="table table-bordered table-hover table-head-bg-primary" style="width:100%;" >
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($roles as $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td>
                {{ $role->name }} <br>
                <small>
                    {{ $role->permissions->pluck('display_name')->implode(' - ') }}
                </small>
            </td>
            <td>
                <a href="{{ route('roles.edit', $role) }}"><i class="icon-pencil m-2 large"></i></a>
                <a href="#" data-toggle="modal" data-target="#modal-delete-role{{$role->id}}"><i class="icon-trash m-2 large" ></i></a>
                @include('roles.modals.delete', [ 'role' => $role ])
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="11" class="text-center">
                {{ no_data('Sin Registros') }}
            </td>
        </tr>
    @endforelse
    </tbody>
</table>

@push('scripts')
    <script>
        jQuery(document).ready(function($){
            $('#tabla-roles').DataTable();
        });
    </script>
@endpush
