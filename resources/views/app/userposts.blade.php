
@extends('layouts.master')

@section('content')

<div class="flex  justify-center">
    <div  class="text-left w-7/12">
        <div class="p-6">



            <h1 class="text-2xl  font-bold mb-1">{{$user->name}}</h1>
            <p class=" text-left">{{$posts->count()}} Adet Paylaşımı Mevcut..</p>

            <div class="float-right ">

                <div >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="red" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div> <span class=" ml-2 " >{{$user->receiveAllLikes->count()}} </span>
            </div>




        </div>
    </div>
</div>

<div class="flex justify-center mb-6">




    <div class="w-7/12 bg-gray-400 p-6 rounded-lg">


        <form action="{{route('addpost')}}" method="POST">
            @csrf

            <div class="mb-6">
                <label for="title" class="sr-only">Gönderi Başlık</label>
                <textarea name="title" id="title" cols="30" rows="1" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('title') border-red-500 @enderror" placeholder="Gönderi Başlığını Giriniz..." value="{{old('title')}}"></textarea>

                @error('title')

                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>

                @enderror
            </div >


            <label for="body" class="sr-only">Gönderi</label>
            <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Gönderi İçeriği Giriniz..." value="{{old('body')}}"></textarea>

            @error('body')

            <div class="text-red-500 mt-2 text-sm">
                {{$message}}
            </div>

            @enderror

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium ">Paylaş</button>
        </form>

    </div >
</div >







@if (count($posts) > 0)


<div class="flex  justify-center">

    <div class="w-7/12 bg-gray-200 p-6 rounded-lg">
        @foreach ($posts as  $post)
            @include('widgets.post')
        @endforeach

        {{$posts->links()}}




    </div>


</div>

@else

    <div class="flex justify-center">

        Hiçbir Paylaşımınız Bulunamadı..

    </div>


@endif




@endsection
