 <!-- post -->
 <div class="post mb-8">
     <!-- date -->
     <span class="text-lg text-gray-400 font-light mb-2">
         {{ $post->created_at->diffForHumans() }} ,</span>
     <!-- Author -->
     <span class="text-lg">written by :
         @if ($post->user->email === auth()->user()->email)
             <a href="/user/profile" class="text-gray-400 hover:underline">{{ $post->user->name }}</a>
         @else
             <span class="text-gray-400">
                 {{ $post->user->name }}
             </span>
         @endif
     </span>
     <!-- post image -->
     <img src='{{ asset('images/' . $post->image_path) }}' alt="post image" class="mb-5 mt-2" />
     <!-- title -->
     <h3 class="text-3xl font-bold mb-2">{{ $post->title }}</h3>
     <!-- body -->
     <p class="text-lg">
         {{ Str::length($post->body) > 20 ? Str::substr($post->body, 0, Str::length($post->body) - Str::length($post->body) / 2) . '...' : $post->body . '...' }}
     </p>
     <!-- likes & comments Counts -->
     <div class="mb-7">
         <span class='text-gray-400 font-light'>
             {{ $post->likes->count() }}
             {{ Str::plural('like', $post->likes->count()) }}
         </span>
         <span class='text-gray-400 font-light'>
             {{ $post->comments->count() }}
             {{ Str::plural('comment', $post->comments->count()) }}
         </span>
     </div>
     <!-- show more button -->
     <a href="{{ route('post', $post->id) }}" class="text-white  bg-gray-900 p-4 rounded-lg">Show
         more</a>

 </div>
