@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <div class="h-auto text-center md:text-left mb-5">
        <div class="flex justify-center">
            <div class="w-11/12 bg-white py-20 px-10 rounded-lg flex">
                {{-- latest Posts --}}
                <div class="w-4/6 mr-7">
                    {{-- post --}}

                    @foreach ($posts as $post)
                        <div class="post mb-8">
                            <p class="text-lg text-gray-400 font-light mb-2">updated at {{ date('Y/m/d') }}</p>
                            <img src='{{ $post['image'] }}' alt="post image" class="mb-5" />
                            <h3 class="text-3xl font-bold mb-2">{{ $post['title'] }}</h3>
                            <p class="text-lg mb-7">
                                {{ $post['body'] }}
                            </p>
                            <a href="{{ route('post', $post['id']) }}" class="text-white  bg-gray-900 p-4 rounded-lg">Show
                                more</a>

                        </div>
                    @endforeach
                </div>
                {{-- side bar --}}
                <div class="sidebar w-1/4 fixed right-24 top-32">
                    <hr class="mb-4" />
                    {{-- Categories --}}
                    <h1 class='font-bold text-3xl mb-5'>Categories</h1>
                    <ul class="text-xl">
                        <li class="mb-2">
                            <a href="/" class="hover:underline">Endurance</a>
                        </li>
                        <li class="mb-2">
                            <a href="/" class="hover:underline">Strength</a>
                        </li>
                        <li class="mb-2">
                            <a href="/" class="hover:underline">Flexibility</a>
                        </li>
                        <li class="mb-2">
                            <a href="/" class="hover:underline">Balance</a>
                        </li>
                    </ul>
                    {{-- Search --}}
                    <h1 class='font-bold text-3xl mt-4 mb-5'>Search</h1>
                    {{-- search form --}}
                    <form action="" method="post">
                        <div class="mb-3">
                            <input type='search' required name='search' id='search'
                                class="w-full border-2  pl-3 outline-none p-2" placeholder="Search post..." />
                        </div>
                        <div>
                            <button type="submit"
                                class="w-full text-white bg-gray-900 p-2 rounded-lg text-lg">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
