<div>
    {{--Коментарии форма--}}
    <livewire:comments.component.form :comment="$comment"/>
    {{--Все комментарии--}}

    <div class="pt-12 mb-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-brown text-white px-4 py-4">
                    @json($comment)
                </div>
            </div>
        </div>
    </div>
</div>
