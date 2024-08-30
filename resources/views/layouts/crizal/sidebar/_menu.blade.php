<li>
    <a href="#!">
        <i class="{{ $icon }}"></i><span>{{ $title }}</span><i class="accordion-icon fa fa-angle-left"></i>
    </a>
    <ul>
        @isset($items)
        @forelse($items as $item)
            @if(isset($item['submenu']) && $item['submenu'])
            <li>
                <a href="{{ $item['route'] }}">{{ Arr::get($item,'title') }}</a>
                {{-- @include('layouts.base.sidebar._submenu', [
                    'id' =>  Arr::get($item,'id'),
                    'title' => Arr::get($item,'title'),
                    'items' => Arr::get($item,'items'),
                    'icon' => Arr::get($item, 'icon')
                ]) --}}
            </li>
            @else
            <li class="{{ setActiveUrl(Arr::get($item, 'route')) }}">
                <a href="{{ Arr::get($item, 'route', '#') }}">
                    <i class="{{ Arr::get($item, 'icon', 'fas fa-genderless') }}"></i> {{ Arr::get($item, 'text') }}
                </a>
            </li>
            @endif
        @empty
            <li>
                <span class="sub-item"> Sin opciones </span>
            </li>
        @endforelse
        @endisset
    
    </ul>
</li>
