<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Коментарии') }}
        </h2>
    </x-slot>
    <livewire:comments.index :comment="$comment"/>
</x-app-layout>
