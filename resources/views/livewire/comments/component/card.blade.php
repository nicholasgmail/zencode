<div class="w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 p-3 mb-2">
    <div class="flex flex-row items-center justify-between">
        <div class="flex flex-row items-center">
            @if($avatar)
                <img class="w-14 h-14 rounded-full shadow-lg p-1"
                     src="{{$avatar}}"
                     alt="{{$name}}">
            @else
                <div class="rounded-full shadow-lg p-1">
                    <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" class="block h-9 w-auto">
                        <path
                            d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z"
                            fill="#6875F5"></path>
                        <path
                            d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z"
                            fill="#6875F5"></path>
                    </svg>
                </div>
            @endif
            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white ml-1">{{$name}}</h5>
            <span class="text-sm text-gray-500 dark:text-gray-400 ml-1">{{$time}}</span>
        </div>
        <div x-data="{ open: false }" class="flex justify-end relative">
            <button x-on:click="open = ! open"
                    class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                    type="button">
                <span class="sr-only">{{__('Меню')}}</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div x-show="open"
                 @click.outside="open = false"
                 x-transition
                 class="absolute z-10 w-44 text-base top-10 list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                <ul class="py-1">
                    <li>
                        <a wire:click.prevent="note({{$comment->id}})"
                           class="block py-2 px-4 text-sm cursor-pointer text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <svg class="inline w-1/12 mr-1 pb-1 svg_white" viewBox="0 0 22 22">
                                <path
                                    d="M2.949,19.435a.122.122,0,0,0,.034,0c.156-.036,4.427-1.319,5.24-1.564a.546.546,0,0,0,.234-.14L19.211,6.973a.77.77,0,0,0,.227-.5.687.687,0,0,0-.2-.533L16,2.7a.685.685,0,0,0-.488-.2h-.021a.773.773,0,0,0-.522.229L4.213,13.483a.557.557,0,0,0-.142.236L2.508,18.956C2.444,19.168,2.767,19.435,2.949,19.435Zm2.16-5.257,2.656,2.649c-1.216.366-2.736.825-3.786,1.138Z"></path>
                            </svg>
                            {{__('Запись')}}</a>
                    </li>
                    <li>
                        <a wire:click.prevent="remove({{$comment->id}})"
                           class="block py-2 px-4 text-sm cursor-pointer text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <svg class="inline w-1/12 mr-1 pb-1 svg_white" viewBox="0 0 22 22">
                                <path
                                    d="M2.5,6.021a.5.5,0,0,0,.5.5h.5L4.957,19a.5.5,0,0,0,.5.452H16.046a.5.5,0,0,0,.5-.452L18,6.521h.5a.5.5,0,0,0,.5-.5v-.5A.518.518,0,0,0,18.5,5H15V4a1.5,1.5,0,0,0-1.5-1.5H8A1.5,1.5,0,0,0,6.5,4V5H3a.518.518,0,0,0-.5.521Zm8.95,10.2a.725.725,0,0,1-1.45,0V8.725a.725.725,0,0,1,1.45,0Zm2.263-7.542a.725.725,0,0,1,1.444.133l-.683,7.459a.725.725,0,1,1-1.444-.132ZM8,4h5.5V5H8ZM7,8.019a.725.725,0,0,1,.788.655l.683,7.46a.725.725,0,1,1-1.444.132L6.343,8.807A.724.724,0,0,1,7,8.019Z"></path>
                            </svg>{{__('Удалить')}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div
        class="w-full bg-white text-sm text-gray-500 rounded-lg border border-gray-200 shadow-md p-3">
        <p class="mb-1 leading-tight">{{$text}}</p>
    </div>
    <br>
    @foreach($comments->sortBy([['created_at', 'desc']]) as $key=>$comment)
        <livewire:comments.component.card
            :comments="$comments"
            :comment="$comment"
            :key="$key"/>
    @endforeach
</div>
