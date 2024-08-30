<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" type="button" id="dropdownMenuButton1" aria-expanded="false">
            <i class="fa fa-bell"></i>
            @if (Auth::user()->unreadNotifications()->count() > 0)
                <span class="badge bg-danger">{{ Auth::user()->unreadNotifications()->count() }}</span>                
            @endif
        </a>
        <ul class="dropdown-menu dropdown-lg dropdown-content" aria-labelledby="dropdownMenuButton1">
            <li class="drop-title">Notificaciones<a href="{{ route('admin.notificaciones.index') }}" class="drop-title-link"><i class="fa fa-angle-right"></i></a></li>
            <li class="slimscroll dropdown-notifications">
                <ul class="list-unstyled dropdown-oc">
                    @forelse (Auth::user()->unreadNotifications as $item)
                    <li>
                        <a href="{{ route('admin.notificaciones.read', $item->id) }}">
                            <span class="notification-badge bg-{{ $item->data['color'] ?? 'primary' }}">
                                <i style="color: white" class="{{ $item->data['icon'] }}"></i>
                            </span>
                            <span class="notification-info">{{ $item->data['message'] }}.
                                <small class="notification-date">{{ $item->created_at->diffForHumans() }}</small>
                            </span>
                        </a>
                    </li>   
                    @empty
                    <li class="text-center p-4">Sin notificaciones...</li>
                    @endforelse
                    {{-- <li>
                        <a href="#"><span class="notification-badge bg-danger"><i class="fa fa-bolt"></i></span>
                                <span class="notification-info">4 new special offers from the apps you follow!
                                    <small class="notification-date">Yesterday</small>
                                </span></a>
                    </li>
                    <li>
                        <a href="#"><span class="notification-badge bg-success"><i class="fa fa-bullhorn"></i></span>
                                <span class="notification-info">There is a meeting with <b>Ethan</b> in 15 minutes!
                                    <small class="notification-date">Yesterday</small>
                                </span></a>
                    </li> --}}
                </ul>
            </li>
        </ul>
    </li>
    <li class="dropdown user-dropdown">
        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" type="button" aria-expanded="false"><img src="{{ asset(Auth::user()->avatar) }}" alt="..." class="rounded-circle"></a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('user.perfil') }}">Perfil</a></li>
            <li role="separator" class="divider"></li>
            {{-- <li><a class="dropdown-item" href="#">Account Settings</a></li> --}}
            <li>
                {{-- <a class="dropdown-item" href="#">Cerrar Sesión</a> --}}
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                     document.querySelector('#logout-form').submit();">
                 Cerrar sesion
                </a>

                <form action="{{ route('logout') }}" method="post" id="logout-form">
                    @csrf
                    
                </form>

            </li>
        </ul>
    </li>
</ul>
