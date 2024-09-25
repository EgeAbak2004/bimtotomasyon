@include('Head.head')

@yield('head')

<body>
    <x-navbar />

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ürün Adı</th>
                <th scope="col">Kim Aldı</th>
                <th scope="col">fiyat</th>
                <td>resim</td>
                <th>miktar</th>
                <th scope="col">tarih</th>
                <th>sil</th>
            </tr>
        </thead>
        <tbody>




            @auth


                @if ($data == 'error')
                <tr>
                    <th colspan="8">
                        <div class="alert alert-primary" role="alert">
                            Sayın Müşterimiz Şuan Da Sepetiniz Ürün Yoktur
                          </div>
                    </th>
                </tr>
                @else

            @foreach ($data as $key => $item)
                @if ($item->salesuser->email == Auth::user()->email)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->salesuser->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td><img width="50rem" height="50rem" src={{ asset("images/$item->file") }} alt=""
                                srcset=""></td>
                        <td>{{ $item->stock }}</td>
                        <td>{{ $item->updated_at }}</td>


                        <th>
                            <form action={{ route('historydelete', ['id' => $item->id]) }} method="get">
                                <button class="btn btn-danger" type="submit">Sil</button>
                            </form>
                        </th>
                    </tr>
                @else
                @endif
            @endforeach
            @endauth


            @endif




        </tbody>

    </table>
<table style="margin-left: 1rem">
    <tr>
        @if ($data != "error")

        <th  style="display: flex; align-items: center">

            <h5 style="width: auto; margin: 0rem; text-align: center; background-color: rgb(255, 255, 255); height: 10%";>toplam sepet Tutarınız {{ $total }}₺</h5>
            <form action={{ route('historyupdate') }} method="get" style="display: flex; justify-content: center;  flex-flow: row-reverse; align-items: center">
                <input type="text" style="visibility: hidden;" name="email" value={{ Auth::user()->email }}>
                <input type="text" style="visibility: hidden" name="total" value={{ $total }}>

<div style="display: flex; justify-content: start; height: 100%">
<button class="btn btn-primary m-2" type="submit" style="">Satın Al</button>
</div>


            </form>
        </th>


        @endif
    </tr>
</table>
</body>

</html>
