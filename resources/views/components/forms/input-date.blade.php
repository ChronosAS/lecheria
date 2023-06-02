@props([
    'options'=> [],
    'name',
    'show' => '',
    'wire' => 'debounce'
])

@php
    $options = array_merge([
        'dateFormat' => 'd-m-Y',
        'enableTime' => false,
        'altFormat' => 'd-m-Y',
        'altInput' => true,
        'allowInput' =>true
        ],$options)
@endphp

<div wire:ignore @if($show) x-show="{{ $show }}" @endif>
    <input
        x-data="{
            value: @entangle($attributes->wire('model')),
            instance: undefined,
            init() {
                $watch('value', value => this.instance.setDate(value,false));
                this.instance = flatpickr(this.$refs.input, {{ json_encode((object)$options) }});
            }
        }"
        x-ref="input"
        x-bind:value="value"
        id ={{ $name }}
        name ={{ $name }}
        wire:model.{{ $wire }} = {{ $name }}
        type="text"
        {{ $attributes->merge(['class' => 'form-control border-dark']) }}
    />
</div>
