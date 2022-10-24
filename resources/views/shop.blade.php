<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $title }}</title>>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.png') }}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Lumia - v4.7.0
  * Template URL: https://bootstrapmade.com/lumia-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>
<body>
  @include('partial.header')

  <section>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="max-height: 50vh">
        <div class="carousel-inner">
          <div class="carousel-item active no-ofv">
            <img src="{{ asset('img/banner.png') }}" class="d-block w-100 h-5" alt="...">
          </div>
          <div class="carousel-item no-ofv">
            <img src="{{ asset('img/banner.png') }}" class="d-block w-100 h-5" alt="...">
          </div>
          <div class="carousel-item no-ofv">
            <img src="{{ asset('img/banner.png') }}" class="d-block w-100 h-5" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
  </section>
  <section id="portfolio" class="portfolio p-0 my-0">
    <div class="container">
        <div class="section-title">
            <h2>Newest Product</h2>
          </div>
        <div class="row portfolio-container">
          @foreach ($new as $product)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="{{ asset('storage/'. $product->image) }}" class="img-fluid" alt="">
                {{-- <a href="#" class="link-preview" title="Preview"><i class="bi bi-bag-plus"></i></a> --}}
                <form action="/cart" method="post">
                  @csrf
                  <input type="hidden" id="productId" name="productId" value="{{ $product->id }}">
                  @auth
                    <input type="hidden" id="userId" name="userId" value="{{ auth()->user()->id }}">
                  @endauth
                  <input type="hidden" id="qunatity" name="quantity" value="1">
                  <input type="hidden" id="price" name="price" value="{{ $product->productPrice }}">
                  <button type="submit" class="link-preview" title="add to bag"><i class="bi bi-bag-plus"></i></button>
                </form>
                <a href="/shop/{{ $product->id }}" class="link-details" title="More Details"><i class="bi bi-eye"></i></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="/shop/{{ $product->id }}">{{ $product->productName }}</a></h4>
                <h5>Rp. {{ $product->productPrice }}</h5>
              </div>
            </div>
          </div>
          @endforeach
        </div>
          <div class="section-title">
            <h2>Recommended</h2>
          </div>
        <div class="row portfolio-container">
          @foreach ($recommended as $product)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="{{ asset('storage/'. $product->image) }}" class="img-fluid" alt="">
                {{-- <a href="#" class="link-preview" title="Preview"><i class="bi bi-bag-plus"></i></a> --}}
                <form action="/cart" method="post">
                  @csrf
                  <input type="hidden" id="productId" name="productId" value="{{ $product->id }}">
                  @auth
                    <input type="hidden" id="userId" name="userId" value="{{ auth()->user()->id }}">
                  @endauth
                  <input type="hidden" id="qunatity" name="quantity" value="1">
                  <input type="hidden" id="price" name="price" value="{{ $product->productPrice }}">
                  <button type="submit" class="link-preview" title="add to bag"><i class="bi bi-bag-plus"></i></button>
                </form>
                <a href="/shop/{{ $product->id }}" class="link-details" title="More Details"><i class="bi bi-eye"></i></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="/shop/{{ $product->id }}">{{ $product->productName }}</a></h4>
                <h5>Rp. {{ $product->productPrice }}</h5>
              </div>
            </div>
          </div>
          @endforeach
          
        </div>
        <div class="section-title">
            <h2>All Product</h2>
          </div>
        <div class="row portfolio-container">
          @foreach ($products as $product)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="{{ asset('storage/'. $product->image) }}" class="img-fluid" alt="">
                {{-- <a href="#" class="link-preview" title="Preview"><i class="bi bi-bag-plus"></i></a> --}}
                <form action="/cart" method="post">
                  @csrf
                  <input type="hidden" id="productId" name="productId" value="{{ $product->id }}">
                  @auth
                    <input type="hidden" id="userId" name="userId" value="{{ auth()->user()->id }}">
                  @endauth
                  <input type="hidden" id="qunatity" name="quantity" value="1">
                  <input type="hidden" id="price" name="price" value="{{ $product->productPrice }}">
                  <button type="submit" class="link-preview" title="add to bag"><i class="bi bi-bag-plus"></i></button>
                </form>
                <a href="/shop/{{ $product->id }}" class="link-details" title="More Details"><i class="bi bi-eye"></i></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="/shop/{{ $product->id }}">{{ $product->productName }}</a></h4>
                <h5>Rp. {{ $product->productPrice }}</h5>
              </div>
            </div>
          </div>
          @endforeach
        </div>
  </div>
</section>
<!-- Logout Modal-->
<div class="modal" id="logoutModal" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-danger">
                    Logout</button>
            </form>
        </div>
    </div>
  </div>
    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
  
    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
      var msg = '{{Session::get('alert')}}';
      var exist = '{{Session::has('alert')}}';
      if(exist){
        alert(msg);
      }
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/e3c5fb8671.js" crossorigin="anonymous"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  </body>