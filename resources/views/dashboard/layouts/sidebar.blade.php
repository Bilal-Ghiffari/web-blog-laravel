<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
                <span data-feather="file"></span>
                Post
              </a>
            </li>
          </ul>
          <div class="pt-8"></div>
          <ul class="nav flex-column">
            <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             {{ auth()->user()->name }}
           </a>
           <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
             <li><a class="dropdown-item" href="/blog"><i class="bi bi-layout-sidebar"></i>Back to home</a></li>
             <li><hr class="dropdown-divider"></li>
             <li>
               <form action="/logout" method="POST">
                 @csrf
                 <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-right"></i> Logout</button>
               </form>
             </li>
           </ul>
         </li>
          </ul>
        </div>
</nav>
