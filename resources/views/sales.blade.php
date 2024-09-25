@include('Head.head')

@yield('head')

<body>
    <x-navbar />


    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ismi</th>
                <th scope="col">fiyat</th>
                <th scope="col">stok</th>
                <th scope="col">tarih</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @if ($data == 'error')
            <tr>
                <th colspan="6">
                    <div class="alert alert-danger" role="alert">
                        Bim A.Ş Mağazasında Ürün Olmadı satınlım olmuyor
                      </div>
                </th>
            </tr>

            @else
                @foreach ($data as $item)
                    @if ($item->Is == 1)
                        <tr class="{{ $item->stock == 0 ? 'bg-secondary bg-gradient' : '' }}">
                            <th scope="row" class={{ $item->stock == 0 ? 'text-white' : '' }}>{{ $item->id }}</th>
                            <td class={{ $item->stock == 0 ? 'text-white' : '' }}>{{ $item->title }}</td>
                            <td class={{ $item->stock == 0 ? 'text-white' : '' }}>{{ $item->price }}</td>
                            <td class={{ $item->stock == 0 ? 'text-white' : '' }}>{{ $item->stock }}</td>
                            <td class={{ $item->stock == 0 ? 'text-white' : '' }}><img
                                    src={{ asset("images/$item->file") }} width="50rem" height="50rem" alt=""
                                    srcset=""></td>
                            <td class={{ $item->stock == 0 ? 'text-white' : '' }}>{{ $item->updated_at }}</td>

                            <th>
                                <form action={{ route('createsales') }} method="POST" style="display: flex; gap: 1rem;">
                                    @csrf
                                    <input type="text" name="Take"  class="form-control" style="width: 8rem" placeholder="miktar"><button
                                        class="btn btn-primary" type="submit"><i class="fa-solid fa-basket-shopping m-1"></i>Sepete Ekle</button>
                                    <input type="text" style="visibility: hidden" name="id"
                                        value={{ $item->id }}>
                                </form>
                            </th>
                        </tr>
                    @else
                    @endif
                @endforeach
            @endif


        </tbody>
    </table>
</body>

</html>
