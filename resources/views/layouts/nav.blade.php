<nav class="tabs is-boxed">
      <div class="container">
        
          <ul>
			
			      <router-link tag="li" to="/" exact><a>Home</a></router-link>
            <router-link tag="li" to="/about"><a>About</a></router-link>
            <router-link tag="li" to="/promoters"><a>Promoters</a></router-link>
            <router-link tag="li" to="/networks"><a>Networks</a></router-link>
            <router-link tag="li" to="/locations"><a>Locations</a></router-link>
            <router-link tag="li" to="/top"><a>Most Watched</a></router-link>
            <router-link tag="li" to="/contact"><a>Contact</a></router-link>
              @if (! Auth::check())
                  <li><a href="{{ url('/login') }}">Login</a></li>
                  {{-- <li><a href="{{ url('/register') }}">Register</a></li> --}}
              @else 
                  <router-link tag="li" to="/submit"><a>Submit</a></router-link>
                  <li><a href="{{ url('/logout') }}">Logout</a></li>
              @endif
          </ul>
          
      </div>
    </nav>