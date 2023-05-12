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
            @include('sweetalert::alert')
            {{-- <div class="col-md-12">
                <a href="{{ url('home') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div> --}}
            <div class="col-md-12 mt-2">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                  </ol>
                </nav>
            </div>
            <div class="col-md-12 mt-1">
                <div class="card">
                    <form method="post" action="{{url('checkout_detail')}}" enctype="multipart/form-data">
                        @csrf
                    @foreach ($product_details as $product)
                    @if ($product->sub_total == null)
                    <input type="hidden" name="id[]" id="id" value="{{$product->id}}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('') }}app-assets/img/inkedkal-visuals-square1.jpg" class="rounded mx-auto d-block" width="50%" alt="">
                            </div>
                            <div class="col-md-2 mt-3">
                                <h6>{{ $product->produce_name }}</h6>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Price</td>
                                            <td>:</td>
                                            <td class="harga">Rp. {{ number_format($product->price) }}
                                            <input type="hidden" name="price" value="{{$product->price}}"></td>
                                        </tr>
                                        <tr>
                                            <td>Price Unit</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" name="quantity" class="form-control quantity" required>
                                               
                                            </td>
                                            <td> {{ $product->unit }}</td>
                                            <td>
                                                <textarea class="output" name="sub_total" value="{{$product->sub_total}}" readonly></textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                        
                    @endforeach
                    <div class="row">
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-6 p-4  me-6">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="h4">TOTAL</td>
                                        <td>:</td>
                                        <td class="harga h6 total-harga"></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-6 p-4  me-6">
                            
                               
                                
                                <button type="submit" class="btn btn-sm btn-info mt-2 form-control button-center">Confirm</button>
                            
                        </div>
                        
                    </div>
                     
                </form>
                </div>
            </div>
        </div>
    </main>
    
    @include('layouts.js')
    <script>
    //    Tangkap semua elemen input dengan kelas '.quantity'
        const inputElems = document.querySelectorAll('.quantity');

        // Lakukan loop pada setiap elemen input
        inputElems.forEach(function(inputElem) {
            // Tangkap elemen harga dan output yang berkaitan dengan elemen input saat ini
            const hargaElem = inputElem.closest('.col-md-2').querySelector('.harga');
            const outputElem = inputElem.closest('.col-md-2').querySelector('.output');

            // Tambahkan event listener pada elemen input
            inputElem.addEventListener('input', function() {
                // Ambil nilai quantity dari input
                const quantity = parseInt(inputElem.value); console.log(quantity);
                const nilai = parseInt(hargaElem.innerText.replace(/\D/g, ''));
                console.log(nilai);
                // Lakukan operasi matematika untuk menghitung quantity
                const result = quantity * nilai;
                // Menambahkan hasil perhitungan pada variabel total
                total = total + result;
                
                // Tampilkan output hasil perhitungan quantity
                outputElem.innerHTML = `${result}`;
                document.querySelector('.total-harga').innerHTML = `Rp. ${total}`;
            });
        });

     </script>
    
</body>
</html>