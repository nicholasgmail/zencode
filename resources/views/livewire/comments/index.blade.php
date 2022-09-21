<div>
    {{--Коментарии форма--}}
    <livewire:comments.component.form :comment="$comments"/>
    {{--Все комментарии--}}
    @if($comments->isNotEmpty())
        <div class="pt-12 mb-7">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="bg-brown text-white px-4 py-4">
                        @forelse ($comments as $comment)
                            <livewire:comments.component.card :comment="$comment"/>
                        @empty
                            <p>Нет комментариев</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
