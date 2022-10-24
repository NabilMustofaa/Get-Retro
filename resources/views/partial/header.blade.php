

<nav id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-between">

      <div class="logo me-auto d-flex align-items-center">
        <h1><a href="/">Get.Retro</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        <nav id="navbar" class="navbar order-last order-lg-0">
          <ul>
            <li><a class="nav-link scrollto" href="/">Home</a></li>
            <li><a class="nav-link scrollto" href="/shop">Shop</a></li>
            <li><a class="nav-link scrollto" href="/category">Category</a></li>
            <li><a class="nav-link scrollto" href="/brand">Brand</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
      </div>

      
      <!-- .navbar -->

      <div class="header-social-links d-flex align-items-center">
        <div class="input-group rounded">
          <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
              <span class="input-group-text border-0" id="search-addon">
              <i class="bi bi-search"></i>
          </span>
        </div>
        @auth
          @if (Auth::user()->admin == 1)
          <a href="/dashboard" ><i class='bi bi-clipboard-data' style="font-size: 1.5rem"></i></a>
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="bi bi-person" style="font-size: 1.5rem"></i></a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="userDropdown">
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
              </a>
          </div>
          
        
          @else
          <a href="/cart" ><i class="bi bi-bag" style="font-size: 1.2rem"></i></a>
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="bi bi-person" style="font-size: 1.5rem"></i></a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="userDropdown">
              <a class="dropdown-item" href="/checkout">
                    <i class="fa fa-history fa-sm fa-fw mr-2 text-gray-400"></i>
                    Riwayat
              </a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
              </a>
          </div>
          
          @endif
        
        
        @else
        <a href="/cart" ><i class="bi bi-bag" style="font-size: 1.2rem"></i></a>
        <a href="/login" ><i class="bi bi-person" style="font-size: 1.5rem"></i></a>
        
        @endauth
        
      </div>
      
    </div>

    

  </nav><!-- End Header -->