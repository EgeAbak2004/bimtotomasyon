@include('Head.head')

@yield('head')

<body>
    <x-navbar />
 <ul class="list-group">

        @if ($data == 'error')
        <div class="alert alert-primary" role="alert">
            Hiç Bir Sonuç Bulanamadı
          </div>
        @else
            @foreach ($data as $item)
                <li class="list-group-item" style="display: flex; justify-content: space-between">ismi {{ $item->title }}
                    fiyat {{ $item->price }} stock {{ $item->stock }} <img width="50rem" height="50ree"
                        src={{ asset("images/$item->file") }} alt="" srcset=""></li>
            @endforeach
        @endif
    </ul>

</body>

</html>
