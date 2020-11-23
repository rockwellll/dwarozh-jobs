
    <form
          wire:submit.prevent="submit">
        <button type="submit" class="focus:outline-none">
            <svg class="w-5 h-5 text-primary mx-1" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                      clip-rule="evenodd"></path>
            </svg>

        </button>
        <span>{{$isFavorited}}</span>
    </form>
