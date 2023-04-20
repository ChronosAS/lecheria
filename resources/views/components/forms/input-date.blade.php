@props([
    'name',
    'placeholder' => 'MM/DD/YYYY',
    'wire' => 'debounce'
])

<div
    class="mt-1 relative"
    x-data="{ value : @entangle($name) }"
    x-init="new Pikaday({field: $refs.input, format: 'MM/DD/YYYY'})"
    x-on:change="value = $event.target.value"
>
    <input
        type="text"
        id="{{ $name }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        x-ref="input"
        x-bind:value="value"
        wire:model.{{ $wire }}="{{ $name }}"
        @class([
            'block w-full sm:text-sm rounded-md shadow-sm',
            'border-slate-300 focus:ring-lime-500 focus:border-lime-500 placeholder-slate-300' => !$errors->has($name),
            'border-red-300 focus:ring-red-500 focus:border-red-500 text-red-900 placeholder-red-300' => $errors->has($name)
        ])
    >
    @error($name)
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
        </div>
    @enderror
</div>
@error($name)
    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
@enderror

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
@endpush
