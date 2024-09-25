@include("Head.head")

@yield("head")
<body>
<x-navbar/>



<table class="table">
    <thead>
      <tr>
        <th scope="col"  >#</th>
        <th scope="col">ismi</th>
        <th scope="col">fiyat</th>
        <th scope="col">stok</th>
        <th>resim</th>
        <th scope="col">tarih</th>
      </tr>
    </thead>
    <tbody>

        @if($data=="error")
<tr>
    <th colspan="6">
        <div class="alert alert-danger" role="alert">
            Bim A.Ş mağazasında ürün bulanamadı
          </div>
    </th>

</tr>
        @else



        @foreach ($data as $item)
        @if ($item->Is==1)
        <tr class={{$item->stock == 0 ? "bg-secondary bg-gradient":""}}>
            <th class={{$item->stock==0 ? "text-white":""}} scope="row">{{$item->id}}</th>
            <td class={{$item->stock==0 ? "text-white":""}}>{{$item->title}}</td>
            <td class={{$item->stock==0 ? "text-white":""}}>{{$item->price}}</td>
            <td class={{$item->stock==0 ? "text-white":""}}>{{$item->stock}}</td>
            <td class={{$item->stock==0 ? "text-white":""}}><img width="55rem" height="55rem" src={{asset("images/$item->file")}} alt="" srcset=""></td>
            <td class={{$item->stock==0 ? "text-white":""}}>{{$item->updated_at}}</td>
            <th></th>
          </tr>
        @else

        @endif


  @endforeach

  @endif

    </tbody>
  </table>
</body>
</html>
