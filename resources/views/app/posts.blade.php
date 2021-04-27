
@extends('layouts.master')

@section('content')

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


<div class="flex justify-center">




    <div class="w-7/12 bg-gray-200 p-6 rounded-lg">

        @foreach ($posts as  $post)
            @include('widgets.post')
        @endforeach

        {{$posts->links()}}




    </div>


</div>

@else

    <div class="flex justify-center">

        Hiçbir Post Bulunamadı..

    </div>


@endif




@endsection
