<nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="/">Travel Blogger<i></i> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="/blog" class="nav-link">Blog</a></li>
            <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
            <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
        </ul>

        {{-- <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())

            <li class="dropdown">
              <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello {{ Auth::user()->name }} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                <li><a tabindex="-1" href="{{ route('posts.index') }}">Posts</a></li>
                <li><a tabindex="-1" href="{{ route('categories.index') }}">Categories</a></li>
                <li><a tabindex="-1" href="{{ route('tags.index') }}">Tags</a></li>
                <li role="separator" class="divider"></li>
                <li> <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                 </form></li>
              </ul>
            </li>

            @else
              {{-- <a href="{{ route('login') }}" class="btn btn-default">Login</a> --}}
              {{-- <a href="{{ route('register') }}" class="btn btn-default">Register</a> --}}

            {{-- @endif --}}

          {{-- </ul> --}} 
      </div>
    </div>
  </nav>

