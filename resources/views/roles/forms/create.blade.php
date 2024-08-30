{{ Form::open(['action' => route('roles.store'), 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) }}

    @include('roles.forms.fields')

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                @include('layouts.base.buttons._modal')
            </div>
        </div>
    </div>

{{ Form::close() }}

