<div>
    @php
        $classes = 'block appearance-none bg-white placeholder-gray-600 border border-yellow-200 rounded w-full py-2 px-4 text-gray-700 leading-5 focus:outline-none focus:border-yellow-500 focus:placeholder-gray-400 focus:ring-2 focus:ring-rose-300'
    @endphp
    <div class="pt-12 mb-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-xl sm:rounded-lg">
                <form wire:submit.prevent="save" class="bg-brown text-white px-4 py-4">
                    <div class="flex flex-col">
                        <div class="flex flex-row justify-start items-baseline gap-6">
                            <div class="flex-initial">
                                <label for="name" class="text-sm">Имя</label>
                                <input wire:model.lazy="name" id='name' type="text"
                                       class="relative block w-full px-3 py-2 border
                                        border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none
                                        focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                            </div>
                            <div class="flex-initial">
                                <label for="mail" class="text-sm">Email</label>
                                <input wire:model.lazy="mail" id='mail' type="text"
                                       class="relative block w-full px-3 py-2 border
                                        border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none
                                        focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                            </div>
                        </div>
                        <div x-data="{ comment_text: @entangle('comment_text') }">
                            <div x-html="comment_text"></div>
                        </div>
                        <div class="flex flex-col justify-between items-baseline pt-4">
                            <div class="flex-1 text-sm w-3/5">
                                <label for="title">Коментарий</label>
                                <textarea id="editor" wire:model.lazy="comment_text" rows="9"
                                          class="relative block w-full px-3 py-2 border
                                        border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none
                                        focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"></textarea>
                            </div>
                            <button
                                class="py-2 px-4 bg-yellow-700 text-white font-semibold rounded-lg shadow-md hover:bg-yellow-900 focus:outline-none mt-4"
                                tabindex="-1">
                                Сохранить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
