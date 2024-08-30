<div>
    {{-- Be like water. --}}
    <div class="card card-white">
        <div class="card-heading clearfix">
            <b class="card-title">Movimientos</b>
            <div class="float-end">
                <a href="#" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i>
                    Agregar
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive invoice-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>Ingreso</th>
                            <th>Egreso</th>
                            <th>Fichas</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movimientos as $item)
                        <tr>
                            <td>Tipo</td>
                            <td>Ingreso</td>
                            <td>Egreso</td>
                            <td>Fichas</td>
                            <td>Fecha</td>                            
                        </tr>                                
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
