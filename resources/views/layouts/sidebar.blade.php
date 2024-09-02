<aside class="w-64 bg-white h-screen shadow-lg">
    <div class="py-4 px-3 bg-gray-50">
        <!-- Logo -->
        <div class="shrink-0 flex items-center justify-center mb-5">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
            </a>
        </div>
        <ul class="space-y-2">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                    <i class="nav-icon fas fa-tachometer-alt mr-3"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('articulos.index') }}" class="nav-link flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                    <i class="nav-icon fas fa-box mr-3"></i>
                    <span>Artículos</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
