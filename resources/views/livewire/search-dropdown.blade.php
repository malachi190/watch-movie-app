<div class="relative" x-data="{isOpen: true}" @click.away='isOpen = false'>
    <input wire:model.live.debounce.500ms='search'
    @focus='isOpen = true'
     type="text"
        class="bg-gray-800 rounded-full w-64 px-4 py-1 pl-8 focus:outline-none focus:shadow-outline text-sm"
        placeholder="Search..." id="search">
    <div class="absolute top-1 left-2">
        <i class="fa-solid fa-magnifying-glass"></i>
    </div>
    @if (strlen($search >= 2))
        <div class="absolute text-white text-sm w-64 rounded mt-4 z-10" x-show.transition.opacity="isOpen">
            @if ($searchResults->count() > 0)
                <ul class="mx-auto">
                    @foreach ($searchResults as $result)
                        <li class="border-b border-gray-600">
                            <a href="{{ route('movies.show', $result['id']) }}"
                                class="bg-gray-800 px-3 py-3 flex items-center gap-3">
                                @if ($result['poster_path'])
                                    <img src="https://image.tmdb.org/t/p/w92/.{{ $result['poster_path'] }}"
                                        alt="Poster" class="w-8">
                                @else
                                    <img src="https://via.placeholder.com/50x75" alt="" class="w-8">
                                @endif
                                <span>{{ $result['title'] }}</span>
                            </a>
                        </li>
                    @endforeach

                </ul>
            @else
                <div class="px-3 py-2 text-base">
                    No results for search "{{ $search }}"
                </div>
            @endif
        </div>
    @endif
</div>
