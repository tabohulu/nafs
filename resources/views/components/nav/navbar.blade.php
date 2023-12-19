 <!-- Topbar Start -->
 <div class="container-fluid py-2 border-bottom d-none d-lg-block">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center">
              <a class="text-decoration-none text-body pe-3" href="#">
                <i class="bi bi-telephone me-2"></i>090-7730-3957</a>
                
              <span class="text-body">|</span>

              <a class="text-decoration-none text-body px-3" href="#">
                <i class="bi bi-envelope me-2"></i>info@hcmedical-opa.com</a>

                <span class="text-body">|</span>

              <div class="text-body px-3" href=""
                >平日　9:30-12:00/13:00-18:00 <br>
                土日　9:30-12:00/13:00-18:00
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

    <!-- Navbar Start -->
    <div class="container-fluid sticky-top bg-white shadow-sm">
      <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
          <a href="/" class="navbar-brand">
            <img src="./img/HClogo.jpg" alt="Logo" />
            <!-- <h1 class="m-0 text-uppercase text-primary">
              <i class="fa fa-clinic-medical me-2"></i>Medinova
            </h1> -->
          </a>
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
              <li style="list-style: none;"><a href="/" class="nav-item nav-link @if($menu==1) active @endif">ホーム</a></li>
              <li style="list-style: none;"><a href="/services" class="nav-item nav-link @if($menu==2) active @endif">健康サービス項目</a></li>
              <li style="list-style: none;"><a href="/products" class="nav-item nav-link @if($menu==3) active @endif">健康商品</a></li>
              <li style="list-style: none;"><a href="/members" class="nav-item nav-link @if($menu==4) active @endif">会員制内容</a></li>
              <li style="list-style: none;"><a href="/contact" class="nav-item nav-link @if($menu==5) active @endif">コンタクト</a></li>
              <li style="list-style: none;"><a href="/seminar" class="nav-item nav-link @if($menu==6) active @endif">セミナー</a></li>
              
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <!-- Navbar End -->