@props([
    'route',
    'title'
])

<a @class(['collapse-item']) href="{{ route($route) }}">{{ $title }}</a>
