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
    <div class="container mt-5">
        <div class="section-title">
            <h2>Tas Belanja</h2>
          </div>
          @if (session()->has('success'))
          <div class="alert alert-success mt-2 " style="width: 100%" role="alert">
            {{ session('success') }}
          </div>                                    
           @endif                          
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="col-5 ">Product</th>
                    <th scope="col" class="col-2 text-center">Harga Satuan</th>
                    <th scope="col" class="col-2 text-center">Kuantitas</th>
                    <th scope="col" class="col-2 text-center">Total</th>
                    <th scope="col" class="col-2 text-center">Action</th>
                  </tr>
            </thead>
            <tbody>
              @foreach ( $cart as $item)
              <tr>
                <td>
                    <div class="d-flex">
                        <img src="{{ asset('storage/'. $item->product->image)  }}" alt="" width="150px">
                        <p class="ms-2">{{ $item->product->productName }}</p>
                    </div>
                </td>
                <td class= text-center>{{ $item->product->productPrice }}</td>
                <form action="/cart/{{ $item->id }}" method="post">
                  @method('put')
                  @csrf
                
                <td class= text-center>
                    <div class="center">
                      <div>
                        <input type="number" name="quantity" id="quantity" min="1" max="{{ $item->product->productLeft }}" value="{{ $item->quantity }}">
                      </div>
                    </div>
                </td>
                <td class= text-center>{{ $item->subTotal }}</td>
                <td class="d-flex border-bottom-0">
                  <div class= ms-2><button class="border-0" type="submit" style="color:blue">Update</button></div>
                </form>
                <form action="/cart/{{ $item->id }}" method="post">
                  @csrf
                  @method('delete')
                  <div class=  ms-2><button type="submit" class="border-0" style="color:red">Delete</button></div>
                </form>
                  
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @php
              $total=0;
              foreach ($cart as $item) {
                $total = $total + $item->subTotal;
              }
              
          @endphp
          <div style="margin: 5vh 0 0 37vw">
            <div class="d-flex justify-content-between align-items-center">
                <p class="my-auto">Total:</p>
                <h3 class="my-auto" style="color: #5faee3">
                  Rp. {{ $total }}
                </h3>

                <form action="/checkout" method="post">
                  @csrf
                  <input type="hidden" id="userId" name="userId" value="{{ auth()->user()->id }}">
                  <button type="submit" class="btn btn-get-started ">CheckOut</button>
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
  <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>  
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap-input-spinner.js') }}"></script>
    <script>
      $("input[type='number']").inputSpinner()
    </script>
   

  </body>