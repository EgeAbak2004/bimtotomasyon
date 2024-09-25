<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid" style="display: flex; justify-content: space-between">
     <img src={{asset("images/logo/logo.png")}} width="80rem" alt="" srcset="">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link {{Route::is("home") ? "active" : ""}}" aria-current="page" href={{route("home")}}>AnaSayfa</a>
          <a class="nav-link {{Route::is("sales") ? "active" : ""}}" href={{route("sales")}}> Satış</a>
          <a class="nav-link {{Route::is("warehouse") ? "active" : ""}}" href={{route("warehouse")}}> Depo</a>
          <a class="nav-link {{Route::is("add") ? "active" : ""}}" href={{route("add")}}>Depola Ekle</a>
         @guest
           <a class="nav-link {{Route::is("register") ? "active" : ""}}" href={{route("registerview")}}>Hesap Oluştur</a>
           <a class="nav-link {{Route::is("login") ? "active": ""}}" href={{route("loginview")}}>Giriş Yap</a>

         @endguest

        </div>

      </div>
      <h1></h1>
      @auth
<div class="collapse navbar-collapse" style="justify-content: end; gap: 2rem">
<a class="nav-link"><i class="fa-solid fa-user m-1 text-primary"></i>{{Auth::user()->name}}</a>

           <a href={{route("history")}} class="nav-link {{Route::is("history") ? "active" : ""}}"><i class="fa-solid fa-basket-shopping text-primary m-2"></i>sepet</a>
           <a href="" class="nav-link"><i class="fa-solid fa-coins m-1 text-primary"></i>{{Auth::user()->price}}₺</a>
           <a class="nav-link" ><i class="fa-solid fa-right-from-bracket text-primary m-2"></i>Çıkış</a>
        </div>
@endauth
    </div>
    <form class="d-flex m-2" action={{route("search")}} method="GET" role="search">
        <input class="form-control me-2" type="search" name="name"  value={{old("name")}}  >
        <button class="btn btn-outline-success" type="submit" >Ara</button>
      </form>
  </nav>


