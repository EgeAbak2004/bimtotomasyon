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
                <th scope="col">Stok</th>
                <th scope="col">tarih</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

@if (!@$message=="")
<div class="alert alert-danger" role="alert">
    <strong>danger</strong>
</div>
@endif

@if($data=="error")
<tr>
    <th colspan="6">
<div class="alert alert-danger" style="display: flex;flex-direction: column;" role="alert">
   Bim A.Ş Depolarından Ürün bulanamadı
   <a href={{route("home")}} class="mt-2">AnaSayfa Dön</a>
  </div>
</tr>
@else


            @foreach ($data as $key => $value)
                <tr class={{$value->stock == 0 ? "bg-secondary bg-gradient" : ""}}>
                    <th class={{$value->stock==0 ? "text-white":""}} scope="row">{{ $value->id }}</th>
                    <td  class={{$value->stock==0 ? "text-white":""}}> {{ $value->title }}</td>
                    <td class={{$value->stock==0 ? "text-white":""}}>{{ $value->price }}</td>
                    <td class={{$value->stock==0 ? "text-white":""}}>{{ $value->stock }}</td>
                    <td class={{$value->stock==0 ? "text-white":""}}>{{ $value->created_at }}</td>
                    <td class={{$value->stock==0 ? "text-white":""}}><img width="50rem" height="50rem" src={{asset("images/$value->file")}} alt="" srcset=""></td>
                    <form action={{route("warehouseupdate",["id"=>$value->id])}} method="post">

                        @csrf

                        <td style="display: flex; justify-content: space-between; align-items: center" style="width: 50%">
                            <div style="display: flex; align-items: center; justify-content: space-between; width: 50%; ">
                            <input type="text" class="m-2 form-control" placeholder="miktar" style="width: 8rem" name="stock">



                            <button class="btn btn-primary"
                                name="give" type="submit" style="font-size: 10pt; height: 3rem;">Teslim Al</button></td>

                                <input type="text" style="visibility: hidden" name="stockvalue" value={{$value->stock}}>
                            </div>
                    </form>
                    <form action={{route("warehousedelete",["id"=>$value->id])}} method="get">
                        @csrf
                        <td><button class="btn btn-danger" name="delete" style="height: 3rem">Sil</button></td>
                    </form>
                </tr>
            @endforeach
            @endif
        </tbody>
</body>

</html>
