@include("Head.head")

@yield("head")

<body>
    <x-navbar/>






<div class="container">


    @foreach ($errors->all() as $error)

    <div class="alert alert-danger" role="alert">
       {{$error}}
      </div>
    @endforeach



    <form action={{route("productadd")}} method="post" enctype="multipart/form-data">

        @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Başlık</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value={{old("title")}}>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Fiyat</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="price" value={{old("price")}}>
      </div>

      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Resim</label>
        <input type="file" class="form-control" id="exampleFormControlInput1" name="file" >
      </div>

      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Ekle</button>
      </div>
    </form>
</div>
</body>
</html>
