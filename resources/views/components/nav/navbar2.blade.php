<!-- Topbar Start -->
<div class="container-fluid py-2 border-bottom d-none d-lg-block">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center">
              <a class="text-decoration-none text-body pe-3" href="#">
                <i class="bi bi-telephone me-2"></i>{{--\App\Models\HomeSettings::where('key','tel')->first()->value--}}</a>
                
              <span class="text-body">|</span>

              <a class="text-decoration-none text-body px-3" href="#">
                <i class="bi bi-envelope me-2"></i>{{--\App\Models\HomeSettings::where('key','email')->first()->value--}}</a>

                <span class="text-body">|</span>

              <div class="text-body px-3" href=""
                >平日　{{--\App\Models\HomeSettings::where('key','weekdays')->first()->value--}} <br>
                土日　{{--\App\Models\HomeSettings::where('key','weekends')->first()->value--}}
                </div>
                
                <a
                href="/appointment"
                class="btn btn-primary "
                >予約フォーム</a>
            </div>
          </div>
          <!-- <div class="col-md-6 text-center text-lg-end">
            <div class="d-inline-flex align-items-center">
              <a class="text-body px-2" href="">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a class="text-body px-2" href="">
                <i class="fab fa-twitter"></i>
              </a>
              <a class="text-body px-2" href="">
                <i class="fab fa-linkedin-in"></i>
              </a>
              <a class="text-body px-2" href="">
                <i class="fab fa-instagram"></i>
              </a>
              <a class="text-body ps-2" href="">
                <i class="fab fa-youtube"></i>
              </a>
            </div>
          </div> -->
        </div>
      </div>
    </div>
    <!-- Topbar End -->
<nav class="navbar navbar-expand-sm bg-white navbar-light py-3 py-lg-0 sticky-top">

<!-- <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0"> -->

  <div class="collapse navbar-collapse container-fluid bg-white">
  <a href="/" class="navbar-brand">
            <img src="/img/HClogo.jpg" alt="Logo" />
          </a>
    <!-- Links -->
    {{--<ul class="navbar-nav ms-auto">
    <li style="list-style: none;" class="nav-item">
    <a href="/" class="nav-link @if($menu==1) active @endif">ホーム</a>
    </li>
    <li class="nav-item" style="list-style: none; margin-left:10px"><a href="/services" class="nav-link @if($menu==2) active @endif">健康サービス項目</a></li>
              <li class="nav-item" style="list-style: none; margin-left:10px"><a href="/products" class="nav-link @if($menu==3) active @endif">健康商品</a></li>
              <li class="nav-item" style="list-style: none; margin-left:10px"><a href="/members" class="nav-link @if($menu==4) active @endif">会員制内容</a></li>
              <li class="nav-item" style="list-style: none; margin-left:10px"><a href="/contact" class="nav-link @if($menu==5) active @endif">コンタクト</a></li>
              <li class="nav-item" style="list-style: none; margin-left:10px"><a href="/seminar" class="nav-link @if($menu==6) active @endif">セミナー</a></li>
              <li class="nav-item" style="list-style: none; margin-left:10px"><a href="/appointment" class="nav-link @if($menu==7) active @endif">予約</a></li>
    </ul>--}}

    <ul class="navbar-nav ms-auto">
    <li style="list-style: none;" class="nav-item">
    <a href="/" class="nav-link ">Home</a>
    </li>
    <li class="nav-item" style="list-style: none; margin-left:10px"><a href="/shop"     class="nav-link ">Shop</a></li>
    <li class="nav-item" style="list-style: none; margin-left:10px"><a href="/about"     class="nav-link">About Us</a></li>
    <li class="nav-item" style="list-style: none; margin-left:10px"><a href="/contact"      class="nav-link ">Contact</a></li>
    </ul>
  </div>

</nav>