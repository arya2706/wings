<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body class="g-sidenav-show  bg-gray-100">
 @include('layouts.menu')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('layouts.navbar')
    <div class="container-fluid py-4">
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
                      <h6 class="mb-0 text-sm">Rinso.</h6>
                      <p class="mb-0 text-xs">Hi! I need more information..</p>
                    </div>
                    <a class="btn btn-info pe-3 ps-3 mb-0 ms-auto" href="javascript:;">Buy</a>
                  </li>
                  
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