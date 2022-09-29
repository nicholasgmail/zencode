<div>
    {{--Коментарии форма--}}
    <livewire:comments.component.form :comment="$comments"/>
    @if($comments->isNotEmpty())
        <div class="pt-12 mb-7">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="bg-brown text-white px-4 py-4">
                        @forelse ($comments_parents->sortBy([['created_at', 'desc']]) as $key=>$comment)
                            <livewire:comments.component.card
                                :comments="$comments"
                                :comment="$comment"
                                :key="$key"/>
                        @empty
                            <p>Нет комментариев</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    @endif
    <x-modal.info wire:model="isDialogOpen" maxWidth="2xl">
        <x-slot name="title">
            Оставить комментарий
        </x-slot>
        <x-slot name="content">
            <livewire:comments.component.form :comment="$comments"/>
        </x-slot>
        <x-slot name="footer">
        </x-slot>
    </x-modal.info>
</div>
