@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="text-center md:text-left mb-5">
        <div class="flex justify-center ">
            <div class="w-11/12 bg-white h-auto  p-10 rounded-lg">
                {{-- post --}}
                <div class="post mx-auto">


                    {{-- Author & date --}}
                    <span class="text-lg flex items-center">
                        <span class="text-lg text-gray-400 font-light">
                            {{ $post->created_at->diffForHumans() }} , </span>

                        <span class="text-gray-800">
                            &emsp13; written by :&emsp13;
                        </span>

                        @if ($post->user->id === auth()->user()->id)
                            <a href="/user/profile" class="text-gray-400 hover:underline">
                                {{ $post->user->name }}
                            </a>
                        @else
                            <span>
                                {{ $post->user->name }}
                            </span>
                        @endif

                        {{-- check if the user can (show the html for delete the post) --}}
                        @can('delete', $post)
                            <form class="ml-auto" action="{{ route('blog.delete', $post) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-800 border-2 border-red-800 hover:border-white hover:bg-red-800 hover:text-white py-2 rounded-lg text-lg px-3 duration-75">Delete</button>
                            </form>
                        @endcan

                        <a href="{{ route('blog.edit', $post) }}"
                            class="text-yellow-800 border-2 border-yellow-800 hover:border-white hover:bg-yellow-800 hover:text-white py-2 rounded-lg text-lg px-3 duration-75 ml-2">Edit</a>


                    </span>
                    {{-- post image --}}
                    <div class="w-full mb-5 mt-4">
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
                    {{-- comments --}}
                    <div class='flex flex-col mt-6'>

                        @if (count($post->comments) > 0)
                            @foreach ($post->comments as $comment)
                                {{-- comments --}}
                                <ul class="comments">
                                    {{-- comment component --}}
                                    <x-comment :comment='$comment' />
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

        const showReplyBtns = document.querySelectorAll('button[id^="show-reply-btn-"]');
        const repliesLists = document.querySelectorAll('ul[id^="replies-list-"]');

        const replyBtn = document.querySelectorAll('#reply-btn');
        const replyInput = document.getElementById('reply');

        //show add comment box
        showCommentBtn.addEventListener('click', () => {
            commentsBox.classList.remove('hidden');

        });

        //reply btn
        showReplyBtns.forEach(btn => {
            btn.addEventListener('click', () => {

                const commentId = btn.id.charAt(btn.id.length - 1);

                repliesLists.forEach(reply => {
                    const replyId = reply.id.charAt(reply.id.length - 1);
                    if (commentId === replyId) {
                        //remove hidden class
                        reply.classList.remove('hidden');

                    }
                })

            });
        });

        replyBtn.forEach(rb => {
            rb.addEventListener('click', () => {
                replyInput.focus();
            });
        });
    </script>
@endsection
