@extends('layouts.master')

@section('content')


<div class="flex justify-center">
    <div class="w-6/12 bg-white p-6 rounded-lg" >
        <form action="{{route('register')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="sr-only">Adınız : </label>
                <input type="text" name="name" id="name" placeholder="Lütfen Adınızı Giriniz.." class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror"    value="{{old('name')}}">

                @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror

            </div>

            <div class="mb-4">
                <label for="name" class="sr-only">Email Adresiniz : </label>
                <input type="text" name="email" id="email" placeholder="Lütfen Email Adresinizi Giriniz.." class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{old('email')}}">

                @error('email')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
            @enderror

            </div>

            <div class="mb-4">
                <label for="name" class="sr-only">Şifreniz : </label>
                <input type="password" name="password" id="password" placeholder="Lütfen Şifrenizi Giriniz.." class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">
                @error('password')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
            @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="sr-only">Şifre Tekrar : </label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Lütfen Şifrenizi Tekrar Giriniz.." class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">
                @error('password    ')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
            @enderror
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Kayıt Ol</button>
            </div>
        </form>
    </div>
</div>

@endsection
