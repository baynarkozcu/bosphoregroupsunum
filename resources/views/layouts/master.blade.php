
<!DOCTYPE html>

<html lang="tr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width = device-width, initial-scale = 1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <title>BosphoreGroup İnternational</title>
    </head>
    <body class="bg-gray-300">
        <nav class="p-6 bg-gray-400 flex justify-between mb-12">

            <ul class="flex items-center">

                <li>
                    <b><a href="{{route('dashboard')}}" class="p-3">Ana Sayfa</a></b>
                </li>

                <li>
                    <b><a href="" class="p-3">Hakkımızda</a></b>
                </li>

                <li>
                    <b><a href="{{route('getposts')}}" class="p-3">Paylaşımlar</a></b>
                </li>


            </ul>

            <ul class="flex items-center">

                @auth
                    <li>
                        <b><a href="" class="p-3">{{auth()->user()->name}}</a></b>
                    </li>
                    <li>
                        <b><a href="{{route('cikisyap')}}" class="p-3">Çıkış Yap</a></b>
                    </li>
                @endauth

                @guest
                    <li>
                        <b><a href="{{route('login')}}" class="p-3">Giriş Yap</a></b>
                    </li>

                    <li>
                        <b><a href="{{route('register')}}" class="p-3">Kayıt Ol</a></b>
                    </li>
                @endguest









            </ul>

        </nav>
        @yield('content')
    </body>


</html>
