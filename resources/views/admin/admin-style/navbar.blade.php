<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/images/epwesto_logo1.png" height="60">
            </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown active">
                    <a style="color:#c9d700"class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Properties
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/home/createspace">Add New Property</a>
                        <a class="dropdown-item" href="/list/search">Property Listings</a>
                        <a class="dropdown-item" href="/home/ownerlist">My Registered Properties</a>
                    </div>
                </li>

                  <li class="nav-item">
                       <a style="color:#c9d700" class="nav-link" href="/home/appointment">Appointment <span class="badge badge-danger" id="count-notification">{{auth()->user()->unreadNotifications->count()}}</span><span class="caret"></span></a>             
                    </li>
                    
                <li class="nav-item dropdown active">
                    <a style="color:#c9d700" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Account
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/home/registerowner">Register Owner Account</a>
                        <a class="dropdown-item" href="/home/accountlist">Account List</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a style="color:#c9d700" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Subscribers</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="{{ route('admin.subscribe.list') }}" class="dropdown-item">Subscriber's List</a>
                    </div>
                </li>
              </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                 <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a style="color:#c9d700" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a style="color:#c9d700" class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @else
                    <li class="nav-item dropdown">
                        <a style="color:#c9d700" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>                     
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>