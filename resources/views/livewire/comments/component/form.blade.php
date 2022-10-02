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
                                <input wire:model="name" id='name' type="text"
                                       class="relative block w-full px-3 py-2 border
                                        border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none
                                        focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                @if($errors->has('name'))
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                @endif
                            </div>
                            <div class="flex-initial">
                                <label for="email" class="text-sm">Email</label>
                                <input wire:model="email" id='email' type="text"
                                       class="relative block w-full px-3 py-2 border
                                        border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none
                                        focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                @if($errors->has('email'))
                                    @error('email') <span class="error">{{ $message }}</span> @enderror
                                @endif
                            </div>
                            <div class="flex-initial">
                                <div class="flex flex-col relative">
                                    @if($errors->has('photoFile'))
                                        @error('photoFile') <span class="error">{{ $message }}</span> @enderror
                                    @elseif($photoFile !== null)
                                        <label for="photo" class="text-sm">Добавлена картинка</label>
                                    @else
                                        <label for="photo" class="text-sm">Добавить картинку</label>
                                    @endif
                                    <input type="file" class="mt-1" wire:model="photoFile" id="photo">
                                </div>
                                <div class="absolute" wire:loading wire:target="photoFile"> Uploading...</div>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between items-baseline pt-4">
                            <div class="flex-1 text-sm w-3/5">
                                <label for="title">Коментарий</label>
                                <textarea id="comment_text" wire:model="comment_text" rows="9"
                                          class="relative block w-full px-3 py-2 border
                                        border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none
                                        focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"></textarea>
                                @if($errors->has('comment_text'))
                                    @error('comment_text') <span class="error">{{ $message }}</span> @enderror
                                @endif
                            </div>
                            <button
                                type="submit"
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
