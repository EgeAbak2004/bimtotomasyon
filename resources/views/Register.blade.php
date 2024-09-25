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
<form action={{route("register")}} method="post">
    @csrf
        </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Ad</label>
        <label for="exampleFormControlInput1" class="form-label">Ad</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
      </div>

      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Eposta</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" name="email">
      </div>

      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Şifre</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" name="password">
      </div>

      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Şifre Kotrol</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" name="password_confirmation">
      </div>

      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Oluştur</button>
      </div>
    </form>
    </div>
</body>
</html>
