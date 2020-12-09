<div x-data="{ show: false }">
        {{$trigger}}

    <div x-show="show" tabindex="0"
         class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed flex items-center justify-center">
        <div @click.away="show = false" class="z-50 relative p-3 mx-auto my-0 max-w-full" style="width: 600px;">
            <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden px-2">
                <header class="mt-3">
                    <button @click={show=false}
                            class="fill-current hover:text-gray-600 absolute @if(app()->getLocale() == "en")right-0  @else left-0 @endif top-0 m-6 font-3xl font-bold">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    {{$header}}
                </header>
                <main class="flex-grow">
                    {{$content}}
                </main>
                <footer class="px-6 py-3 flex w-full justify-end items-center">
                    {{$footer}}
                </footer>
            </div>
        </div>
        <div class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50"></div>
    </div>
</div>
