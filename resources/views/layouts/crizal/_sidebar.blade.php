<div class="page-sidebar-inner">
    <div class="page-sidebar-menu">
        <ul class="accordion-menu">

            @include('layouts.crizal.sidebar._menu_badge', [
                'title' => 'Inicio',
                'icon' => 'menu-icon icon-home4',
                'route' => route('admin.home'),
            ])




            <li class="menu-divider"></li>

            @include('layouts.crizal.sidebar._menu', [
                'title' => 'Usuarios',
                'icon' => 'menu-icon fas fa-users-cog',
                'route' => '',
                'items' => [
                    ['route' => route('user.create'), 'text' => 'Crear una nuevo', 'icon' => 'icon-plus'],
                    ['route' => route('user.index'), 'text' => 'Listar', 'icon' => 'icon-users'],
                    ['route' => route('roles.index'), 'text' => 'Roles', 'icon' => 'icon-layers'],
                ],
            ])

            @include('layouts.crizal.sidebar._menu', [
                'title' => 'Articulos',
                'icon' => 'menu-icon fas fa-newspaper',
                'route' => '',
                'items' => [
                    ['route' => route('producto.create'), 'text' => 'Nuevo Articulo', 'icon' => 'icon-plus'],
                    ['route' => route('producto.index'), 'text' => 'Articulos', 'icon' => 'fas fa-newspaper']
                ],
            ])

            {{-- Menu Section Módulos --}}


            {{-- Menu Item Usuarios --}}

            {{-- @can('view', new \App\User()) --}}
            {{-- Usuarios --}}
            {{-- @include('layouts.crizal.sidebar._menu', [
                        'title' => 'Usuarios',
                        'icon' => 'menu-icon fas fa-users-cog',
                        'route' => '',
                        'items' => [
                            ['route' => route('usuarios.index'), 'text' => 'Listar', 'icon' => 'icon-menu'],
                            ['route' => route('roles.index'), 'text' => 'Roles', 'icon' => 'icon-layers'],
                        ]
                    ])                     --}}
            {{-- @endcan --}}

            {{-- @can('view', new Modules\AdminAlert\Entities\AdminAlert())
                    @include('layouts.crizal.sidebar._menu', [
                        'title' => 'Avisos',
                        'icon' => 'menu-icon icon-bell',
                        'route' => '',
                        'items' => [
                            ['route' => route('adminalert.index'), 'text' => 'Listado', 'icon' => 'icon-menu'],
                            ['route' => route('adminalert.create'), 'text' => 'Crear Nuevo', 'icon' => 'icon-plus'],
                        ]
                    ])
                @endcan --}}

            {{-- @can('view', new Modules\Turnero\Entities\Institution())
                    @include('layouts.crizal.sidebar._menu', [
                        'title' => 'Instituciones',
                        'icon' => 'menu-icon icon-briefcase',
                        'route' => '',
                        'items' => [
                            ['route' => route('organizaciones.index'), 'text' => 'Listado', 'icon' => 'icon-menu'],
                            ['route' => route('organizaciones.create'), 'text' => 'Crear Nuevo', 'icon' => 'icon-plus'],
                        ]
                    ])
                @endcan --}}

            {{-- @can('feriados', new Modules\Agenda\Entities\Calendar())
                    @include('layouts.crizal.sidebar._menu_badge', [
                        'title' => 'Feriados',
                        'icon' => 'menu-icon fas fa-calendar-times',
                        'route' => route('feriados.index')
                    ])                    
                @endcan
                --}}
            {{-- @include('layouts.base.sidebar._menu', [
                    'title' => 'Vistas Calendarios',
                    'icon' => 'icon-calendar',
                    'route' => '',
                    'items' => [
                        ['route' => route('agenda.calendarView',['all']), 'text' => 'Todos', 'icon' => 'fas fa-calendar-alt'],
                        ['route' => route('agenda.calendarView',['all',1]), 'text' => 'Publica En Agenda', 'icon' => 'fas fa-calendar'],
                    ]
                ])                     --}}





            {{-- <li>
                <a href="#!" data-bs-toggle="modal" data-bs-target="#modalSoporte">
                    <i class="menu-icon icon-public"></i><span>DGSI</span><span class="label label-danger">1.0</span>
                </a>
            </li> --}}
        </ul>
    </div>
</div>
