<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Watch.com</title>
    @vite('resources/css/app.css')
    {{-- @vite('resources/js/app.js') --}}

    @livewireStyles
</head>

<body class="font-mono bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div x-data="{ open: false }" @click.away='open = false'
            class="container-fluid mx-auto flex flex-row justify-between items-center px-4 py-6 w-full gap-8 relative">
            <div class="mx-5 justify-start w-1/4 md:w-full -ml-2 md:ml-0">
                <a href="{{ route('movies.index') }}" class="inline-flex flex-1 justify-center items-center gap-3">
                    <img src="{{ asset('asset/logo.jpg') }}" alt="" class="w-[15%] h-[15%] rounded-[60%]">
                    <span class="text-2xl md:text-2xl">Watch</span>
                </a>
            </div>

            <div class="md:hidden block mx-2 justify-end px-5">
                <i class="fa-solid fa-bars text-2xl cursor-pointer" id="open" @click="open = true"></i>
            </div>

            <div class="w-full p-5 mx-auto max-w-[92%] flex flex-row items-baseline justify-center text-center gap-4 bg-gray-700 fixed top-0 h-fit z-10 transition ease-in duration-100 mt-2 rounded-sm translate-y-0"
                id="navbar" x-show="open">
                <ul class="flex flex-col items-start justify-start text-start gap-4 w-full">
                    <li class="ml-0">
                        <a href="{{ route('movies.index') }}" class="text-lg">
                            Movies
                        </a>
                    </li>
                    <li class="ml-0">
                        <a href="{{route('shows.index')}}" class="text-lg">
                            TV Shows
                        </a>
                    </li>
                    <li class="ml-0">
                        <a href="{{route('actors.index')}}" class="text-lg">
                            Actors
                        </a>
                    </li>
                    <li class="ml-0">
                        <livewire:search-dropdown>
                    </li>

                </ul>

                <div class="mx-3 flex justify-end w-1/3">
                    <button><i class="fa-solid fa-xmark" id="close" @click='open = false'></i></button>
                </div>
            </div>


            <ul class="hidden md:flex flex-row items-center justify-center w-full text-start gap-4">
                <li class="md:ml-16 ml-0">
                    <a href="{{ route('movies.index') }}">
                        Movies
                    </a>
                </li>
                <li class="ml-0 md:ml-6">
                    <a href="{{route('shows.index')}}">
                        TV Shows
                    </a>
                </li>
                <li class="ml-0 md:ml-6">
                    <a href="{{route('actors.index')}}">
                        Actors
                    </a>
                </li>
            </ul>

            <ul class="hidden md:flex items-center justify-between">
                <livewire:search-dropdown>
                    <li class="ml-4">
                        <a href="">
                            <img src="{{ asset('asset/images.jpg') }}" alt=""
                                class="w-[2rem] h-[2rem] rounded-full">
                        </a>
                    </li>
            </ul>
        </div>
    </nav>
    @yield('content')
    @livewireScripts
</body>

</html>
