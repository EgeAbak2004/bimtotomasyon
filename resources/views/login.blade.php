@include("Head.head")

@yield("head")

<x-navbar/>

<body>
    <div class="container">
        <div class="alert alert-danger" role="alert">
<ul>
    @foreach ($errors->all() as $error)

    <li>{{$error}}</li>
    @endforeach

</ul>



<form action={{route("login")}} method="post">
    @csrf
        </div>

      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Eposta</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" name="email" value={{old("email")}}>
      </div>

      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Şifre</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" name="password" value="">
      </div>


      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Giriş Yap</button>
      </div>
    </form>
    </div>
</body>
</html>
