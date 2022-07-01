<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="/blog">
      <img src="/img/logo-web.png" class="logo" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{Request::is('blog*') ? 'active' : '' }}" href="/blog">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('category') ? 'active' : '' }}" href="/category">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Bookmarks</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ui kit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Lainnya</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-sidebar"></i> Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-right"></i> Logout</button>
                </form>
              </li>
            </ul>
          </li>
          @else 
          <li class="nav-item">
            <a class="nav-link {{Request::is('login') ? 'active' : ''}}" href="/login">
              <i class="bi bi-person-fill"></i> login
            </a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>