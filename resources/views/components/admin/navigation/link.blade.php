@props([
    'route',
    'title'
])

<a @class(['collapse-item','active'=> request()->routeIs(Str::beforeLast($route, '.'),'*')]) href="{{ route($route) }}">{{ $title }}</a>
