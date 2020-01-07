
<nav class="navbar navbar-expand-sm navbar-light navbar-laravel">
    <a class="navbar-brand" href="/">{{ config('app.name', 'Laravel') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="nav navbar-nav navbar-left">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{  __('auth.login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('auth.login') }}</a>
                </li>
            @else
                <li class="nav-item nav-link">
                    <a class="btn icon-btn btn-light" href="{{ route('ads.create') }}">أضف إعلان جديد</a>
                </li>
                <li class="nav-item nav-link dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/myAds">إعلاناتي</a>
                        <a class="dropdown-item" href="/myFav">تفضيلاتي</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{-- route('logout') --}}"
                           onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('auth.Logout') }}
                        </a>
                        <form id="logout-form" action="{{-- route('logout') --}}" method="POST">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>

