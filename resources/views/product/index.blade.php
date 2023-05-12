<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body class="g-sidenav-show  bg-gray-100">
 @include('layouts.menu')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('layouts.navbar')
    <div class="container-fluid py-4">
        @include('sweetalert::alert')
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
              </ol>
            </nav>
        </div>
        <div class="row">
          <div class="col-xl-9">
            <div class="card h-100">
              <div class="card-header pb-0 p-3">
                <h6 class="mb-0">Product</h6>
              </div>
              <div class="card-body p-3">
                <ul class="list-group">
                    <li class="list-group-item border-0 d-flex align-items-center px-40 mb-2">
                    <div class="avatar me-6">
                        <img src="{{asset('')}}app-assets/img/inkedkal-visuals-square1.jpg" alt="kal" class="border-radius-lg shadow">
                    </div>
                    <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $products_soclin->produce_name}}</h6>
                        <strike class="mb-0 text-xs">Rp. 15,000</strike>
                        <p class="mb-0 text-xs">Rp. {{ number_format($products_soclin ->price )}}</p>
                    </div>
                    <a class="btn btn-info pe-3 ps-3 mb-0 ms-auto" href="{{url('product_list',$products_soclin->id)}}">Buy</a>
                    </li>
                    <hr>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item border-0 d-flex align-items-center px-40 mb-2">
                    <div class="avatar me-6">
                        <img src="{{asset('')}}app-assets/img/inkedkal-visuals-square1.jpg" alt="kal" class="border-radius-lg shadow">
                    </div>
                    <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $products_giv->produce_name}}</h6>
                        <p class="mb-0 text-xs">Rp. {{ number_format($products_giv ->price )}}</p>
                    </div>
                    <a class="btn btn-info pe-3 ps-3 mb-0 ms-auto" href="{{url('product_list',$products_giv->id)}}">Buy</a>
                    </li>
                    <hr>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item border-0 d-flex align-items-center px-40 mb-2">
                    <div class="avatar me-6">
                        <img src="{{asset('')}}app-assets/img/inkedkal-visuals-square1.jpg" alt="kal" class="border-radius-lg shadow">
                    </div>
                    <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $products_soclin_liquid->produce_name}}</h6>
                        <p class="mb-0 text-xs">Rp. {{ number_format($products_soclin_liquid ->price )}}</p>
                    </div>
                    <a class="btn btn-info pe-3 ps-3 mb-0 ms-auto" href="{{url('product_list',$products_soclin_liquid->id)}}">Buy</a>
                    </li>
                    <hr>
                </ul>
              </div>
            </div>
          </div>
      </div>
    </div>
  </main>
 @include('layouts.js')
</body>
</html>