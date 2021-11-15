@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <div class="h-auto text-center md:text-left mb-5">
        <div class="flex justify-center">
            <div class="w-11/12 bg-white py-20 px-10 rounded-lg flex">
                @if (count($posts) > 0)
                    <!-- latest Posts -->
                    <div class="w-4/6 mr-7">


                        @foreach ($posts as $post)
                            <!-- post component -->
                            <x-post :post="$post" />
                        @endforeach
                        <!-- paginations links -->
                        {{ $posts->links() }}
                    </div>
                    <!-- side bar -->
                    <div class="sidebar w-1/4 fixed right-24 top-36">
                        <hr class="mb-4" />
                        <!-- Categories -->
                        <h1 class='font-bold text-3xl mb-5'>Categories</h1>
                        <ul class="text-xl">
                            @foreach ($categories as $category)
                                <li class="mb-2">
                                    <a href="/" class="hover:underline">{{ $category->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <!-- Search -->
                        <h1 class='font-bold text-3xl mt-4 mb-5'>Search</h1>
                        <!-- search form -->
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
