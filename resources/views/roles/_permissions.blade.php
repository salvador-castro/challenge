<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <h3><i class="icon-lock"></i> Permisos</h3>
            <div>
                <div class="row">
                    @foreach($group as $g)
                        <div class="col-lg-4">
                            <div class="border mb-4">
                                <div class="card-header">
                                    <i class="icon-lock-open"></i> <span class="fw-bold">{{ strtoupper($g) }}</span>
                                </div>
                                <div class="card-body">
                                    <div style="box-sizing: border-box; padding-left: 10px;">
                                        @foreach ($permisos as $p)
                                            @if($p->group_name == $g)
                                                <div class="checkbox">
                                                    <label class="checkbox-inline" for="ch-{{$p->name}}">
                                                        @isset($role)
                                                            <input
                                                                data-toggle="toggle"
                                                                data-onstyle="success"
                                                                data-offstyle="info"
                                                                data-on="SI"
                                                                data-off="NO"
                                                                data-size="mini"
                                                                {{ $role->permissions->contains($p->id) ? 'checked' : '' }}
                                                                type="checkbox"
                                                                name="permissions[]"
                                                                id="ch-{{$p->name}}"
                                                                value="{{$p->name}}"> {{$p->display_name}}
                                                        @else
                                                            <input
                                                                data-toggle="toggle"
                                                                data-onstyle="success"
                                                                data-offstyle="info"
                                                                data-on="SI"
                                                                data-off="NO"
                                                                data-size="mini"
                                                                type="checkbox"
                                                                name="permissions[]"
                                                                id="ch-{{$p->name}}"
                                                                value="{{$p->name}}"> {{$p->display_name}}
                                                        @endisset
                                                        <small class="text-muted">{{ $p->permissions->pluck('name')->implode(', ') }}</small>
                                                    </label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
