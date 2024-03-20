@props([
    'title',
    'route',
    'url'
])

<li @class([
        'nav-item',
        'active'=> request()->is($url)
    ])
>
    <a class="nav-link" href="{{ route($route) }}">
        {{ $icon }}
        <span>{{ $title }}</span></a>
</li>
