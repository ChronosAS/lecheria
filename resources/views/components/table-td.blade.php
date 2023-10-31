<td {{ $attributes->class([
        'text-center',
        'flex-nowrap' => !$attributes->has('class'),
        ]) }} >
        {{ $slot }}
</td>
