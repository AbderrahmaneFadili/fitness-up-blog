<!-- comment -->
<li>
    <!-- user name -->
    <h3 class="font-bold text-lg">
        @if ($comment->user->id === auth()->user()->id)
            <a href="{{ route('user.profile', $comment->user) }}" class="hover:underline">
                {{ $comment->user->name }}
            </a>
        @else
            {{ $comment->user->name }}
        @endif

        <span class="font-light text-gray-400">
            {{ $comment->replies->count() }}
            {{ Str::plural('Reply', $comment->replies->count()) }}
        </span>
    </h3>

    <!-- comment body -->
    <p class="text-xl leading-6">
        {{ $comment->body }}
    </p>
    <!-- reply - replies -->
    <div class="flex items-center w-28 mb-4">
        <span>
            <button class="font-bold hover:underline" id='show-reply-btn-{{ $comment->id }}'
                type="button">Reply</button>
        </span>

        <!-- check if the current user can  delete the comment (showing the html for delete)-->
        @can('delete', $comment)
            <span>
                <!-- delete comment -->
                <form action="{{ route('comments.delete', $comment) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-800 ml-2">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </span>
        @endcan

    </div>
    <!-- replies list -->
    <ul class="ml-6 mb-3 hidden" id='replies-list-{{ $comment->id }}'>

        @foreach ($comment->replies as $reply)
            <!-- Reply Comment -->
            <x-reply :reply="$reply" />
        @endforeach

        <!-- reply form -->
        {{-- Adding reply for on comment --}}
        <form action="{{ route('reply.add', $comment) }}" method="post">
            @csrf
            <div class="my-2">
                <input type="text" id='reply' name='reply' placeholder="Reply..."
                    class="w-full border-2  focus:outline-black pl-3 outline-none p-2 @error('reply')  border-red-500 @enderror"
                    value='{{ old('reply') }}' />
            </div>
            @error('reply')
                <p class="text-red-500 my-3">{{ $message }}</p>
            @enderror
            <div>
                <button type="submit" class="text-white bg-gray-900 p-2 rounded-lg text-lg px-3">Reply</button>
            </div>
        </form>
    </ul>
</li>
