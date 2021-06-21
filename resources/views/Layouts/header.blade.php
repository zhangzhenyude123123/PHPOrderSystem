<nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-shrink" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{route('firstpage.show')}}">
            <img  id = "logopic" src="{{URL::asset('image/navbar-logo-base.svg')}}" alt="..." /></a>

        <div class="collapse navbar-collapse" id="navbarResponsive">
                @guest
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @else
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('mainpage') }}">Dashboard</a></li>
                    <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                {{ csrf_field() }}
                                <button class="btn btn-block btn-danger" type="submit" name="button">Quit</button>
                            </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>


