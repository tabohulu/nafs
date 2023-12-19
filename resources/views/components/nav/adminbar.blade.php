 <!-- Topbar Start -->
 
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid sticky-top bg-white shadow-sm">
      <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
          <a href="/" class="navbar-brand" target="_blank">
            <img src="/img/HClogo.jpg" alt="Logo" />
            <!-- <h1 class="m-0 text-uppercase text-primary">
              <i class="fa fa-clinic-medical me-2"></i>Medinova
            </h1> -->
          </a>
          
                <a class="nav-item nav-link"href="{{route('logout')}}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a>
                
            
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto py-0">
              <li style="list-style: none;"><a href="/admin" class="nav-item nav-link @if($menu==1) active @endif">予約</a></li>
              <li style="list-style: none;"><a href="/admin/seminars" class="nav-item nav-link @if($menu==2) active @endif">セミナー</a></li>
              <li style="list-style: none;"><a href="/admin/products" class="nav-item nav-link @if($menu==3) active @endif">健康商品</a></li>
              <li style="list-style: none;"><a href="/admin/services" class="nav-item nav-link @if($menu==7) active @endif">健康サービス</a></li>
              <li style="list-style: none;"><a href="/admin/staffinfo" class="nav-item nav-link @if($menu==4) active @endif">社員情報</a></li>
              <li style="list-style: none;"><a href="/admin/announcements" class="nav-item nav-link @if($menu==5) active @endif">お知らせ</a></li>
              <li style="list-style: none;"><a href="/admin/members" class="nav-item nav-link @if($menu==6) active @endif">会員制</a></li>
              <li style="list-style: none;"><a href="/admin/settings" class="nav-item nav-link @if($menu==8) active @endif">その他</a></li>
            </ul>
            <form id="logout-form" action="{{route('logout')}}" method="POST">
                @csrf
              </form>
          </div>
        </nav>
              @if($menu==1)
                <div class="card-title">
                    <ul class="row" style="list-style: none;">
                        <li style="list-style: none;" class="col-sm-2"></li>
                        <li style="list-style: none;" class="col-sm-2"></li>
                        <li style="list-style: none;" class="col-sm-2"></li>
                        <li style="list-style: none;" class="col-sm-1"><a href="/admin">カレンダー</a></li>
                        <li style="list-style: none;" class="col-sm-1"><a href="/admin/reservations">一覧</a></li>
                        <li style="list-style: none;" class="col-sm-1"><a href="/admin/reservations/create">休み</a></li>
                    </ul>
                </div>
                @elseif($menu==2)
                <div class="card-title">
                    <ul class="row" style="list-style: none;">
                        <li style="list-style: none;" class="col-sm-2"></li>
                        <li style="list-style: none;" class="col-sm-2"></li>
                        <li style="list-style: none;" class="col-sm-2"></li>
                        <li style="list-style: none;" class="col-sm-1"><a href="/admin/seminars">一覧</a></li>
                        <li style="list-style: none;" class="col-sm-1"><a href="/admin/seminars/create">新規</a></li>
                    </ul>
                </div>
                @elseif($menu==3)
                <div class="card-title">
                    <ul class="row" style="list-style: none;">
                        <li style="list-style: none;" class="col-sm-2"></li>
                        <li style="list-style: none;" class="col-sm-2"></li>
                        <li style="list-style: none;" class="col-sm-2"></li>
                        <li style="list-style: none;" class="col-sm-1"><a href="/admin/products">一覧</a></li>
                        <li style="list-style: none;" class="col-sm-1"><a href="/admin/products/create">新規</a></li>
                    </ul>
                </div>
                @elseif($menu==7)
                <div class="card-title">
                    <ul class="row" style="list-style: none;">
                        <li style="list-style: none;" class="col-sm-2"></li>
                        <li style="list-style: none;" class="col-sm-2"></li>
                        <li style="list-style: none;" class="col-sm-2"></li>
                        <li style="list-style: none;" class="col-sm-1"><a href="/admin/services">一覧</a></li>
                        <li style="list-style: none;" class="col-sm-1"><a href="/admin/services/create">新規</a></li>
                    </ul>
                </div>
                @elseif($menu==4)
                <div class="card-title">
                    <ul class="row" style="list-style: none;">
                        <li style="list-style: none;" class="col-sm-2"></li>
                        <li style="list-style: none;" class="col-sm-2"></li>
                        <li style="list-style: none;" class="col-sm-2"></li>
                        <li style="list-style: none;" class="col-sm-1"><a href="/admin/staffinfo">一覧</a></li>
                        <li style="list-style: none;" class="col-sm-1"><a href="/admin/staffinfo/create">新規</a></li>
                    </ul>
                </div>
                @elseif($menu==5)
                <div class="card-title">
                    <ul class="row" style="list-style: none;">
                        <li style="list-style: none;" class="col-sm-2"></li>
                        <li style="list-style: none;" class="col-sm-2"></li>
                        <li style="list-style: none;" class="col-sm-2"></li>
                        <li style="list-style: none;" class="col-sm-1"><a href="/admin/announcements">一覧</a></li>
                        <li style="list-style: none;" class="col-sm-1"><a href="/admin/announcements/create">新規</a></li>
                    </ul>
                </div>
                @elseif($menu==6)
                <div class="card-title">
                    <ul class="row" style="list-style: none;">
                        <li style="list-style: none;" class="col-sm-2"></li>
                        <li style="list-style: none;" class="col-sm-2"></li>
                        <li style="list-style: none;" class="col-sm-2"></li>
                        <li style="list-style: none;" class="col-sm-1"><a href="/admin/members">一覧</a></li>
                        <li style="list-style: none;" class="col-sm-1"><a href="/admin/members/create">新規</a></li>
                    </ul>
                </div>
                <hr>
                @endif
      </div>
    </div>
    <!-- Navbar End -->

    {{--<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
            <a href="index.html" class="navbar-brand">
            <img src="/img/HClogo.jpg" alt="Logo" />
            <!-- <h1 class="m-0 text-uppercase text-primary">
              <i class="fa fa-clinic-medical me-2"></i>Medinova
            </h1> -->
          </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                    <li style="list-style: none;"><a href="/admin" class="nav-item nav-link @if($menu==1) active @endif">予約</a></li>
              <li style="list-style: none;"><a href="/admin/seminar" class="nav-item nav-link @if($menu==2) active @endif">セミナー</a></li>
              <li style="list-style: none;"><a href="/admin/products" class="nav-item nav-link @if($menu==3) active @endif">健康商品</a></li>
              <li style="list-style: none;"><a href="/admin/staffinfo" class="nav-item nav-link @if($menu==4) active @endif">社員情報</a></li>
              <li style="list-style: none;"><a href="/admin/announcements" class="nav-item nav-link @if($menu==5) active @endif">お知らせ</a></li>
              
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>--}}