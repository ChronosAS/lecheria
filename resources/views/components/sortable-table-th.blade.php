<a role="button" wire:click.prevent="sortBy('{{ $field }}')" class="flex text-decoration-none">
    <span class="mr-1">
        {{ $title }}
    </span>
    <x-icons.sort-icon :sortAsc="$sortAsc" :sortField="$sortField" field="{{ $field }}"/>
</a>
