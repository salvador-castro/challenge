<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="card card-white">
            <div class="card-heading clearfix">
                <h4 class="card-title">Cajeros</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive invoice-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Saldo</th>
                                <th class="text-center">Compronantes</th>
                                <th class="text-center">Ingresar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\User::activos()->get() as $item)
                            <tr>
                                <th scope="row">{{ $item->name }}</th>
                                <td>
                                    <span class="label label-success">$ 500</span>
                                </td>
                                <td class="text-center">
                                    <span class="label label-warning">2</span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('user.show', $item) }}" class="">
                                        <i class="fas fa-sign-in-alt"></i>
                                    </a>
                                </td>
                            </tr>                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>