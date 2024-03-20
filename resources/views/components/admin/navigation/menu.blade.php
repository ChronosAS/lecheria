@props([
    'header',
    'name',
    'icon',
    'title',
    'route'
])

<li @class([
        'nav-item',
        'active'=> request()->routeIs(Str::beforeLast($route, '.').'*')
        ])
>
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#{{ $name }}"
        aria-expanded="true" aria-controls="{{ $name }}">
        {{ $icon }}
        <span>{{ $title }}</span>
    </a>
    <div id="{{ $name }}" class="collapse" aria-labelledby="heading{{ $name }}" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">{{ $header }}:</h6>
            {{ $link }}
        </div>
    </div>
</li>
