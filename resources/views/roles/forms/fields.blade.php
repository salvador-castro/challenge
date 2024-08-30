<input autocomplete="false" type="hidden" type="text" style="display:none;">
<fieldset class="mb-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <label for="name">Nombre</label>
                    <input value="{{ $role->name }}" type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="no utilizar espacios" required>
                </div>
            </div>
            @include('roles._permissions', ['role', $role])
        </div>
    </div>
</fieldset>


@push('scripts')
    
@endpush
