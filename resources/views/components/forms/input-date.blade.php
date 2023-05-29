@props(['options'=> []])

@php
    $options = array_merge([
        'dateFormat' => 'd-m-Y',
        'enableTime' => false,
        'altFormat' => 'd-m-Y',
        'altInput' => true,
        'allowInput' =>true
    ])
@endphp

<div wire:ignore>
    <input
        x-data="{
            init() {
                flatpickr(this.$refs.input, {{ json_encode((object)$options) }});
            }
        }"
        x-ref="input"
        type="text"
        {{ $attributes->merge(['class' => 'form-control border-dark']) }}
    />
</div>
