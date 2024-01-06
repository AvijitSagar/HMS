<header>
    <nav class="navbar navbar-expand-lg hms-color hms-nav-height">
        <div class="container">
          <a class="navbar-brand text-white" href="{{route('dashboard')}}"><h1>HMS</h1></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
              <li class="nav-item mx-2">
                <a class="nav-link {{Request::routeIs('dashboard') ? 'active' : ''}}" aria-current="" href="{{route('dashboard')}}">Home</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link {{Request::routeIs('seat') ? 'active' : ''}}" href="{{route('seat')}}">Seat</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link {{Request::routeIs('meal') ? 'active' : ''}}" href="{{route('meal')}}">Meals</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link {{Request::routeIs('service') ? 'active' : ''}}" href="{{route('service')}}">Services</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link {{Request::routeIs('worker') ? 'active' : ''}}" href="{{route('worker')}}">Worker</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link {{Request::routeIs('payment') ? 'active' : ''}}" href="{{route('payment')}}">Payment</a>
              </li>
            </ul>
            <div class="dropdown">
                <button class="btn btn-secondary hms-color dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown button
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                  {{-- <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li> --}}
                  <li>
                    <form action="{{ route('logout') }}" method="POST">
                      @csrf
                      <button>Logout</button>
                    </form>
                  </li>
                </ul>
              </div>
          </div>
        </div>
      </nav>
</header>
<!-- header end -->