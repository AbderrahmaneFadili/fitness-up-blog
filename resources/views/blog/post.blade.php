@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <div class=" text-center md:text-left mb-5">
        <div class="flex justify-center ">
            <div class="w-11/12 bg-white  p-10 rounded-lg">
                {{-- post --}}
                <div class="post mx-auto ">
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
                    <div class="w-full mb-5 mt-2">
                        <img src='{{ asset('images/' . $post->image_path) }}' alt="post image" class="w-full h-full" />
                    </div>

                    {{-- title --}}
                    <h3 class="text-3xl font-bold mb-2">{{ $post->title }}</h3>
                    {{-- body --}}
                    <p class="text-lg mb-7">
                        {{ $post->body }}
                    </p>
                </div>

                {{-- posts likes --}}
                <div class="posts-likes flex items-center">

                    @if (!$post->likedBy(auth()->user()))
                        <form action="{{ route('post.likes.store', $post) }}" method="post">
                            @csrf
                            <button class="font-bold text-xl flex items-center" type="submit">
                                <img class="w-8" src="{{ asset('images/unlike.svg') }}" alt="unlike" />
                                <span class="ml-1 mt-2">Like</span>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('post.likes.destroy', $post) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="font-bold text-xl flex items-center" type="submit">
                                <img class="w-8" src="{{ asset('images/like.svg') }}" alt="like" />
                                <span class="ml-1 mt-2">Unlike</span>
                            </button>
                        </form>
                    @endif


                    <span class="ml-2 text-xl mt-2">
                        {{ $post->likes->count() }}
                        {{ Str::plural('like', $post->likes->count()) }}
                    </span>

                    <button type="button" id='show-comment-btn' class="hover:underline ml-2 text-xl mt-2 font-bold ">
                        {{ $post->comments->count() }}
                        {{ Str::plural('Comment', $post->comments->count()) }}
                    </button>
                </div>

                {{-- post comments --}}
                <div class="hidden mt-7" id='comments-box'>
                    {{-- comment form --}}
                    <div class="">
                        <form action="{{ route('comments.add', $post) }}" method="post">
                            @csrf
                            <div class="my-2">
                                <input type="text" id='comment' name='comment' placeholder="Write a comment..."
                                    class="w-full border-2  pl-3 outline-none p-2 @error('comment')
                                        border-red-500 @enderror"
                                    value='{{ old('comment') }}' />
                            </div>
                            @error('comment')
                                <p class="text-red-500 my-3">{{ $message }}</p>
                            @enderror
                            <div>
                                <button type="submit"
                                    class="text-white bg-gray-900 p-2 rounded-lg text-lg px-3">Comment</button>
                            </div>
                        </form>
                    </div>
                    {{-- comments list --}}
                    <div class='flex flex-col mt-6'>
                        {{-- comments --}}
                        @if (count($post->comments) > 0)
                            @foreach ($post->comments as $comment)


                                <ul>
                                    <li>
                                        {{-- user name --}}
                                        <h3 class="font-bold text-lg">
                                            @if ($comment->user->name === auth()->user()->name)
                                                <a href="/user/profile" class="hover:underline">
                                                    {{ $comment->user->name }}
                                                </a>
                                            @else
                                                {{ $comment->user->name }}
                                            @endif

                                        </h3>
                                        {{-- comment body --}}
                                        <p class="text-xl leading-6">
                                            {{ $comment->body }}
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
                                        <ul class="ml-6 mb-3 hidden">
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
                            @endforeach
                        @else
                            <p class="text-lg">No comments yet.</p>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const commentsBox = document.getElementById('comments-box');
        const showCommentBtn = document.getElementById('show-comment-btn');

        showCommentBtn.addEventListener('click', () => {
            commentsBox.classList.remove('hidden');
        });
    </script>
@endsection
