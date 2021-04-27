<div class="mb-2 bg-gray-400 rounded">

    <small ><a class="ml-3" href="{{route('userposts' , $post->user)}}" >{{$post->user->name}}</a></small> <p class="text-gray-600 text-right mr-12">{{$post->created_at->diffForHumans()}}</p>

    <b><a href="{{route('singlepost', $post->id)}}"><h3 class="mb-2 ml-8"> {{$post->title}}</h3></a></b>

    <p class="ml-8">{{$post->content}}</p>


</div>

<div class="flex items-center mb-12  ml-8 ">

    @if (! $post->likedBy(auth()->user()))

    <form action="{{route('likepost', $post)}}" method="POST">
        @csrf

        <button class="btn">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>

        </button>
    </form>

    @else

    <form action="{{route('unlikepost', $post)}}" method="POST">
        @csrf
        @method('DELETE')

        <button class="btn">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="red" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>

        </button>
    </form>

    @endif

    @can('delete', $post)
        <form action="{{route('deletepost', $post->id)}}" method="POST">
            @csrf
            @method('DELETE')

            <button class="btn ml-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="green">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>

            </button>
        </form>
    @endcan

    <span class="ml-6 ">{{$post->getLikes->count()}}</span>

</div>
