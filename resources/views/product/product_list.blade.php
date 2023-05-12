<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body class="g-sidenav-show  bg-gray-100">
 @include('layouts.menu')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('layouts.navbar')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product List</li>
                  </ol>
                </nav>
            </div>
            <div class="col-md-12 mt-1">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{asset('')}}app-assets/img/inkedkal-visuals-square1.jpg" class="rounded mx-auto d-block" width="80%" alt=""> 
                            </div>
                            <div class="col-md-6 mt-5">
                                <h2></h2>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <h4>{{$products->produce_name}}</h4>
                                        </tr>
                                        <tr>
                                            <td>Price</td>
                                            <td>:</td>
                                            <td>Rp. {{number_format($products->price)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Demension</td>
                                            <td>:</td>
                                            <td>{{$products->dimension}}</td>
                                        </tr>
                                        <tr>
                                            <td>Price Unit</td>
                                            <td>:</td>
                                            <td>{{$products->unit}}</td>
                                        </tr>
                                       
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                 <form method="post" action="{{url('product_detail', $products->id)}}" enctype="multipart/form-data">
                                                    @csrf
                                                    {{-- <input type="text" name="jumlah_pesan" class="form-control" required=""> --}}
                                                    <button type="submit" class="btn btn-info mt-2">Buy</button>
                                                </form>
                                            </td>
                                        </tr>
                                       
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('layouts.js')
</body>
</html>