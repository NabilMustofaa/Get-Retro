<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Product</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('partial.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                
                @include('partial.topbar')
                <div class="container-fluid mx-4 w-60">
                <h1 class="h3 mb-5 text-gray-800">Add Product</h1>
                <form action="/dashboard/product" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="width: 60vw">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Product</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control @error('productName')
                              is-invalid
                               @enderror" id="productName" name="productName" placeholder="Nama Product..." value="{{ old('productName') }}">
                            </div>
                            @error('productName')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="exampleFormControlTextarea1">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('productDescription')
                                is-invalid
                                 @enderror " id="productDescription" name="productDescription" rows="3" >{{ old('productDescription') }}</textarea>
                            </div>
                            @error('productDescription')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Harge</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control @error('productPrice')
                              is-invalid
                               @enderror" id="productPrice" name="productPrice"placeholder="Harga Product..." value="{{ old('productPrice') }}">
                            </div>
                            @error('productPrice')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control @error('productLeft')
                              is-invalid
                               @enderror" id="productLeft" name="productLeft"placeholder="Jumlah Product..." value="{{ old('productLeft') }}">
                            </div>
                            @error('productLeft')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>  
                          <div class="form-group row">
                            <label for="inputState" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-4" >
                                <select id="categoryId" name="categoryId" class="form-control">
                                    @foreach ($categories as $item)
                                    @if (old('categoryId')==$item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->categoryName }}</option>
                                    @else
                                    <option value="{{ $item->id }}" >{{ $item->categoryName }}</option>
                                    @endif
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            <div class="form-group row">
                                <label for="inputState" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-4" >
                                    <select id="brandId" name="brandId" class="form-control">
                                        @foreach ($brands as $item)
                                        @if (old('brandId')==$item->id)
                                        <option value="{{ $item->id }}" selected>{{ $item->brandName }}</option>
                                        @else
                                        <option value="{{ $item->id }}" >{{ $item->brandName }}</option>
                                        @endif
                                            
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="image">Gambar</label>

                                <div class="col-sm-4">
                                    <input class=" @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                                    @error('image')
                                    <div class="invalid-feedback">
                                    {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="image"></label>
                                <img class="img-fluid img-preview col-sm-4 my-2" src="" >
                            </div>
                            <button class="btn btn-primary px-5" type="submit">
                                Add Produt
                            </button> 
                        </div>
                    </form> 
                    </div>
            </div>
            </div>   
    </div>               
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
        function previewImage() {
        const image= document.querySelector('#image')
        const imgPreview =document.querySelector('.img-preview')

        imgPreview.style.display='flex'
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload=function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }}
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>