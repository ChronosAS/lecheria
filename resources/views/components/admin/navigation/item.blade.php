@props([
    'title',
    'route'
])

<li @class([
        'nav-item',
        'active'=> request()->routeIs($route)
    ])
>
    <a class="nav-link" href="{{ route($route) }}">
        {{ $icon }}
        <span>{{ $title }}</span></a>
</li>
