<nav class="navbar navbar-expand-lg p-3" style="background-color: #25364F; color: white;">
        <span class="navbar-brand">Zeknologyy</span>
        <div class="navbar-nav">
        @guest
                <a href="/" class="nav-link text-white">Home</a>
                <a href="{{ route('login') }}" class="nav-link text-white">Login</a>
        @endguest
        @auth
                @if(auth()->user()->role == 'admin')
                <a class="nav-link text-white" href="{{ route('homeAdmin') }}">Home</a>
                @else
                <a class="nav-link text-white" href="{{ route('home') }}">Home</a>
                <a class="nav-link text-white" href="{{ route('keranjang') }}">Keranjang</a>
                <a class="nav-link text-white" href="{{ route('summary') }}">Summary</a>
                @endif
                <a class="nav-link text-white" href="{{ route('logout') }}" onclick="return confirm('Yakin ingin logout?')">Logout</a>
        @endauth
        </div>
        @auth
        <span class="navbar-text ms-auto" style="color: #F4F1DE;"> Hallo {{ auth()->user()->nama }} </span>
        @endauth
</nav>