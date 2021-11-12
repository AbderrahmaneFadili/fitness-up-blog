@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <div class=" text-center md:text-left mb-5">
        <div class="flex justify-center ">
            <div class="w-11/12 bg-white  p-10 rounded-lg">
                {{-- post --}}
                <div class="post mx-auto ">
                    <p class="text-lg text-gray-400 font-light mb-2">
                        {{ $post->created_at->diffForHumans() }}
                    </p>

                    <div class="w-full mb-5">
                        <img src='{{ asset('images/' . $post->image_path) }}' alt="post image" class="w-full h-full" />
                    </div>


                    <h3 class="text-3xl font-bold mb-2">{{ $post->title }}</h3>

                    <p class="text-lg mb-7">
                        {{ $post->body }}
                    </p>
                </div>

                {{-- posts likes --}}
                <div class="posts-likes flex items-center">
                    <form action="/" method="post">
                        <button class="font-bold text-xl flex items-center" type="submit">
                            <img class="w-8" src="{{ asset('images/unlike.svg') }}" alt="like" />
                            <span class="ml-1 mt-2">Like</span>
                        </button>
                    </form>

                    <span class="ml-2 text-xl mt-2">
                        12 likes
                    </span>

                    <button type="button" class="hover:underline ml-2 text-xl mt-2 font-bold ">22 Comments</button>
                </div>

                {{-- post comments --}}
                <div class="hidden">
                    {{-- comment form --}}
                    <div class="">
                        <form action="/" method="post">
                            <div class="my-2">
                                <input type="text" id='comment' name='comment' placeholder="Write a comment..."
                                    class="w-full border-2  pl-3 outline-none p-2" />
                            </div>

                            <div>
                                <button type="submit"
                                    class="text-white bg-gray-900 p-2 rounded-lg text-lg px-3">Comment</button>
                            </div>
                        </form>
                    </div>
                    {{-- comments list --}}
                    <div class='flex flex-col mt-6'>
                        {{-- comment --}}
                        <ul>
                            <li>
                                {{-- user name --}}
                                <h3 class="font-bold text-lg">Abdo fadili</h3>
                                {{-- comment body --}}
                                <p class="text-xl leading-6">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                </p>
                                {{-- reply - replies --}}
                                <div class="flex items-center justify-between w-32 mb-4">
                                    <span>
                                        <button class="font-bold hover:underline" type="button">Reply</button>
                                    </span>
                                    <span>
                                        <button class="font-bold hover:underline" type="button">Replies</button>
                                    </span>
                                </div>
                                {{-- replies list --}}
                                <ul class="ml-6 mb-3">
                                    {{-- one reply --}}
                                    <li class="mb-3">
                                        {{-- user name --}}
                                        <h3 class="font-bold text-lg">Sara smith</h3>
                                        {{-- comment body --}}
                                        <p class="text-xl leading-6">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit?
                                        </p>
                                        <span class="mt-3">
                                            <button class="font-bold hover:underline" type="button">Reply</button>
                                        </span>
                                    </li>
                                    {{-- one reply --}}
                                    <li class="mb-3">
                                        {{-- user name --}}
                                        <h3 class="font-bold text-lg">Sara smith</h3>
                                        {{-- comment body --}}
                                        <p class="text-xl leading-6">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit?
                                        </p>
                                        <span class="mt-3">
                                            <button class="font-bold hover:underline" type="button">Reply</button>
                                        </span>
                                    </li>
                                </ul>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
