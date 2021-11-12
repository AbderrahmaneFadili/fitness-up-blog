@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <div class="h-auto text-center md:text-left mb-5">
        <div class="flex justify-center">
            <div class="w-11/12 bg-white py-20 px-10 rounded-lg flex">
                @if (count($posts) > 0)
                    {{-- latest Posts --}}
                    <div class="w-4/6 mr-7">
                        {{-- post --}}

                        @foreach ($posts as $post)
                            <div class="post mb-8">
                                {{-- date --}}
                                <span class="text-lg text-gray-400 font-light mb-2">
                                    {{ $post->created_at->diffForHumans() }} ,</span>
                                {{-- Author --}}
                                <span class="text-lg">written by :
                                    <span class="text-gray-400">
                                        {{ $post->user->name }}
                                    </span>
                                </span>
                                {{-- post image --}}
                                <img src='{{ asset('images/' . $post->image_path) }}' alt="post image"
                                    class="mb-5 mt-2" />
                                {{-- title --}}
                                <h3 class="text-3xl font-bold mb-2">{{ $post->title }}</h3>
                                {{-- body --}}
                                <p class="text-lg">
                                    {{ Str::length($post->body) > 20 ? Str::substr($post->body, 0, Str::length($post->body) - Str::length($post->body) / 2) . '...' : $post->body . '...' }}
                                </p>
                                {{-- likes & comments Counts --}}
                                <div class="mb-7">
                                    <span class='text-gray-400 font-light'>
                                        {{ $post->likes()->count() }}
                                        {{ Str::plural('like', $post->likes->count()) }}
                                    </span>
                                </div>
                                <a href="{{ route('post', $post->id) }}"
                                    class="text-white  bg-gray-900 p-4 rounded-lg">Show
                                    more</a>

                            </div>
                        @endforeach
                        {{ $posts->links() }}
                    </div>
                    {{-- side bar --}}
                    <div class="sidebar w-1/4 fixed right-24 top-36">
                        <hr class="mb-4" />
                        {{-- Categories --}}
                        <h1 class='font-bold text-3xl mb-5'>Categories</h1>
                        <ul class="text-xl">
                            @foreach ($categories as $category)
                                <li class="mb-2">
                                    <a href="/" class="hover:underline">{{ $category->title }}</a>
                                </li>
                            @endforeach
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
                @else
                    <h1 class="font-bold text-3xl">No Posts</h1>
                @endif
            </div>
        </div>
    </div>
@endsection
