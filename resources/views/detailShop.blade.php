<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $title }}</title>
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
      <div class="container shadow d-flex rounded mt-5 p-4">
        <img src="{{ asset('storage/'. $product->image) }}" alt="" class="border border-secondary rounded">
        <div class="info d-flex flex-column ms-4">
            <div class="d-flex flex-column mb-auto">
            <h1>{{ $product->productName }}</h1>
            <h2 style="color: #3498db">Rp. {{ $product->productPrice }}</h2>
            <h6> Category : <span><a href="">{{ $product->category->categoryName}}</a></span></h6>
            <h6> Brand : <span><a href="">{{ $product->brand->brandName}}</a></span></h6>
            <p>{{ $product->productDescription}}</p>
            <p>Items Left : {{ $product->productLeft}} </p>
            <div class="d-flex flex-row align-items-center">
                <p class="my-auto">Quantity </p>
                <div class="center">
                  <input type="number" name="quantity" id="quantity" min="1" max="{{ $product->productLeft }}" value="1" onchange="changeQuantity()">
                </div>
            </div>
            </div>
            <div>
              <form action="/cart" method="post" class="d-inline">
                @csrf
                <input type="hidden" id="productId" name="productId" value="{{ $product->id }}">
                @auth
                  <input type="hidden" id="userId" name="userId" value="{{ auth()->user()->id }}">
                @endauth
                <input type="hidden" id="qunatity" name="quantity" value="1">
                <input type="hidden" id="price" name="price" value="{{ $product->productPrice }}">
                <button type="submit" class="btn btn-get-started ">Add To Bag</button>
              </form>

              <form action="/cart" method="post" class="d-inline">
                @csrf
                <input type="hidden" id="productId" name="productId" value="{{ $product->id }}">
                @auth
                  <input type="hidden" id="userId" name="userId" value="{{ auth()->user()->id }}">
                @endauth
                <input type="hidden" id="qunatity1" name="quantity" value="1">
                <input type="hidden" id="price" name="price" value="{{ $product->productPrice }}">
                <input type="hidden" id="option" name="option" value="buy">
                <button type="submit" class="btn btn-started">Buy Now</a>
              </form>
            </div>
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
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <!-- Template Main JS File -->
      <script src="{{ asset('js/main.js') }}"></script>
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
      <script src="{{ asset('vendor/bootstrap/js/bootstrap-input-spinner.js') }}"></script>
      <script>
        $("input[type='number']").inputSpinner()
      </script>
      <script>
        function changeQuantity(){
          let quantity = document.querySelector('#quantity').value;
          let hiddenQuantity = document.querySelector('#qunatity');
          let hiddenQuantity1 = document.querySelector('#qunatity1');

          hiddenQuantity.value=quantity;
          hiddenQuantity1.value=quantity;
        }
        
      </script>
      <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
          alert(msg);
        }
      </script>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    </body>