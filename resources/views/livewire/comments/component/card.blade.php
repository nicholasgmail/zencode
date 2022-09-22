<div class="w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 p-3">
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
        <div class="flex justify-end">
            <button id="dropdownButton" data-dropdown-toggle="dropdown"
                    class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                    type="button">
                <span class="sr-only">Open dropdown</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdown"
                 class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700"
                 data-popper-reference-hidden="" data-popper-escaped=""
                 data-popper-placement="bottom"
                 style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 210px);">
                <ul class="py-1" aria-labelledby="dropdownButton">
                    <li>
                        <a href="#"
                           class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                    </li>
                    <li>
                        <a href="#"
                           class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export
                            Data</a>
                    </li>
                    <li>
                        <a href="#"
                           class="block py-2 px-4 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div
        class="w-full bg-white text-sm text-gray-500 rounded-lg border border-gray-200 shadow-md p-3">
        <p class="mb-1 leading-tight">{{$text}}</p>
    </div>
    {{--<livewire:comments.component.card_all :comment="$comment"/>--}}
</div>
