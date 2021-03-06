<!-- one reply -->
<li class="mb-3">
    <!-- user name -->
    <h3 class="font-bold text-lg">
        @if ($reply->user->id === auth()->user()->id)
            <a href="{{ route('user.profile', $reply->user) }}" class="hover:underline">
                {{ $reply->user->name }}
            </a>
        @else
            {{ $reply->user->name }}
        @endif
    </h3>
    <!-- reply body -->
    <p class="text-xl leading-6">
        {{ $reply->body }}
    </p>
    <span class="mt-3 flex">
        <button class="font-bold hover:underline" type="button" id="reply-btn">Reply</button>
        <!-- delete reply -->
        <!-- check if the current user can  delete the comment reply (showing the html for delete)-->
        @can('delete', $reply)
            <span>
                <form action="{{ route('replies.delete', $reply) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-800 ml-2">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </span>
        @endcan

    </span>
</li>
