<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="card card-white">
      

        <div>
            {{-- Success is as dangerous as failure. --}}
        
            @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{ session('message') }}</strong> 
                    </div>
                    
                    <script>
                      $(".alert").alert();
                    </script>
            @endif
            @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>{{ session('error') }}</strong> 
                    </div>
                    
                    <script>
                      $(".alert").alert();
                    </script>
            @endif
        
            <div class="row">
                <div class="col-md-12">
                    <h4 class="card-title">Cajeros Asignados</h4>
                        <a target="_blank" href="{{ route('link.whatsapp', $red->url) }}">
                            Link
                        </a>
                        {{ route('link.whatsapp', $red->url) }}
                        <hr>

                        @cannot('asignarPersonal', $red)
                            <p class="text-danger">No tiene permisos para gestionar personal en redes</p>
                        @endcannot
                        <div class="table-responsive invoice-table">
                            <table class="table">
                                <tbody>
                                    @foreach ($users as $u)
                                        <tr>
                                            {{-- <th scope="row">#1236</th>
                                            <td><span class="label label-success">Finished</span></td>
                                            <td><img src="img/email/1.jpg" alt="..." class="rounded-circle me-3">Jamara Karle</td> --}}
                                            <td>
                                                <img src="{{ $u->avatar }}" alt="{{ $u->name }} {{ $u->lastname }}" class="rounded-circle me-3">
                                            </td>
                                            <td>{{ $u->name }} ({{ $u->phone }})</td>
                                            <td>
                                                @can('asignarPersonal', $red)
                                                    <button wire:click="quitar({{$u->id}})" 
                                                        {{-- data-toggle="tooltip" data-placement="top" title="quitar a {{ $u->name }} {{ $u->lastname }}" --}}
                                                        class="btn btn-icon btn-danger btn-round btn-xs">
                                                        <i class="fa fa-minus"></i>
                                                    </button>                                                                        
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
            
                </div>
            </div>
        
            <hr>
        
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      <input wire:model="search" type="text"
                        class="form-control" name="" id="" placeholder="Buscar Usuario...">
                    </div>
                </div>
            </div>
            <div class="row">
                <h4 class="card-title">Disponibles</h4>
                <div class="col-lg-12 col-md-12">
                    <div class="table-responsive invoice-table">
                        <table class="table">
                            <tbody>
                                <div wire:loading wire:target="search">
                                    <div class="row p-5 text-center">
                                        <div class="col-md-12">
                                            <h1 class="text-muted">
                                                <i class="fa fa-spinner fa-spin mr-2" aria-hidden="true"></i> Buscando...
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($admins as $u)
                                <div wire.loading.remove>
                                    <tr>
                                        {{-- <th scope="row">#1236</th>
                                        <td><span class="label label-success">Finished</span></td>
                                        <td><img src="img/email/1.jpg" alt="..." class="rounded-circle me-3">Jamara Karle</td> --}}
                                        <td>
                                            <img src="{{ $u->avatar }}" alt="{{ $u->name }}" class="rounded-circle me-3">
                                        </td>
                                        <td>{{ $u->name }} ({{ $u->phone }})</td>
                                        <td>
                                            @can('asignarPersonal', $red)
                                                <button wire:click.prevent="agregar({{$u->id}})" 
                                                    {{-- data-toggle="tooltip" data-placement="top" title="Agregar a {{ $u->name }} {{ $u->lastname }}" --}}
                                                    class="btn btn-icon btn-primary btn-round btn-xs">
                                                    <i class="fa fa-plus"></i>
                                                </button>                                                                    
                                            @endcan
                                        </td>
                                    </tr>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-2">
                            {{ $admins->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        




    </div>
</div>
