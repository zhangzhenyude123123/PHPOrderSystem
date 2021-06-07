<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
    <div class="container-fluid">
    <div class="container">
        <!-- Branding Image -->
        <a class="navbar-brand" href="{{route('root')}}">
            Carnival System
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

{{--        <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav mr-auto">

            </ul>
                @guest
                    <!-- Authentication Links -->
                    <ul class="navbar-nav navbar-right">
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="navbar-nav nav-item native"><a class="nav-link" href="{{ route('mainpage') }}">Dashboard</a></li>
                    <ul class="navbar-nav navbar-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="https://cdn.learnku.com/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/60/h/60" class="img-responsive img-circle" width="30px" height="30px">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('users.show', Auth::id()) }}">Personal Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" id="logout" href="#">
                                    <form action="{{ route('logout') }}" method="POST">
                                        {{ csrf_field() }}
                                        <button class="btn btn-block btn-danger" type="submit" name="button">Quit</button>
                                    </form>
                                </a>
                            </div>
                        </li>
                    </ul>
                @endguest
            </ul>
        </div>
    </div>
    </div>
</nav>


