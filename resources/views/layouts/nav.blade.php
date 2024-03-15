<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" style="height: 55px;">
    <h3 class="text-light ms-4"><b>KASIR</b></h3>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end mt-3" id="navbarCollapse">
      {{-- <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul> --}}

      <form action="/logout" method="post" class="">
        @csrf
        <button type="submit" class="btn btn-primary">Logout</button>
    </form>
    </div>
  </nav>
