<nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand " href="/">Story Searcher</a>
      <div class="d-flex">
  
        <a href="/#stories" class="nav-link">Stories</a>
        @auth
        @can('admin')
        <a href="/admin/stories" class="nav-link">DashBoard</a>          
        @endcan
        <img src="{{auth()->user()->avatar}}" width="50" height="50" class="rounded-circle" alt="">
        <a href="" class="nav-link">Welcome {{auth()->user()->name}}</a>

        <form action="/logout" method="POST">
          @csrf
          <button  type="submit" href="" class="nav-link btn btn-link">Logout</button>
        </form>

        @else
        <a href="/register" class="nav-link">Register</a>
        <a href="/login" class="nav-link">Login</a>
        @endauth

        <a href="#subscribe" class="nav-link">Subscribe</a>
      </div>
    </div>
  </nav>