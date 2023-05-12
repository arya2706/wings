<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Validator;
use App\Models\Product;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products_soclin = Product::where('produce_code','SKUSKILNP')->first();
        $products_giv = Product::where('produce_code','GVIURIBTR')->first();
        $products_soclin_liquid = Product::where('produce_code','LIKSONLIN')->first();
        // dd($products_soclin);
        $product_test =Product:: where('id', $request->price)->first();
        // $test=$product_test->price;
        // dd($product_test);
        // $products_cek = Product::where('price')->get);
        // $harga = $products->price;
        // $discount = $products->discount;
        $angka= 10;
        $persen = 100;
        $harga = 15000;

        $total = $harga*$angka/$persen;
        $total_cek = $harga-$total;
        // $testing = $total*$harga;
        // 10:100x15.000
        // dd($total_cek);


        return view('product.index', compact('products_soclin','products_giv','products_soclin_liquid'));
    }

    public function product_list(Request $request, $id)
    {
        $products =Product::where('id', $request->id)->find($id);
        // dd($products);
        // $product_new = Product::findOrFail($request->id);
// dd($product_new->price);
        return view('product.product_list', compact('products'));
    }

    public function product_detail(Request $request, $id)
    {
        $product_new = Product::findOrFail($request->id);
        $product_create =$product_new->produce_code;
        $product_price =$product_new->price;

        
        // return view('product.product_detail', compact('products'));
        $number = DocumentNumberController::documentNumber();
        $tanggal = Carbon::now();

        // $products = new TransactionHeader();
        // $products->user = Auth::user()->name;
        // $products->date = $tanggal;
        // $products->document_code = 'TRX';
        // $products->document_number = $number;
        // $products->total = $product_create;
        // $products->status = 1;
        // $products->save();

        $products = new TransactionDetail;
            $products->document_code = 'TRX';
            $products->document_number = $number;
            $products->produce_code=$product_create;
            $products->price = $product_price;
            $products->unit='PCS';
            $products->currency='IDR';
	    	$products->status = 1;
	    	$products->save();

            alert()->success('Success Add Product');

        return redirect('/checkout');
    }

    public function checkout(Request $request)
    {
        $product_details =TransactionDetail::join('products','products.produce_code','transaction_details.produce_code')
                                            ->selectRaw('transaction_details.*,products.produce_name as produce_name')->get();
        // dd($product_details);

        return view('product.checkout', compact('product_details'));
    }

    public function checkout_detail(Request $request)
    {
        // dd($request->sub_total);
        $carts = $request->id;
        foreach($carts as $cart){
            $tanggal = Carbon::now();
            $transaction = TransactionDetail::findOrFail($cart);
            // $transaction_detail_code = 'DETAIL-'. mt_rand(000000,999999);
            // $total = $request->price * $request->quantity;
            $transaction_detail = TransactionDetail::where('id',$cart)->update([
                'sub_total' => $request->sub_total,
                'quantity' => $request->quantity,
            ]);

            TransactionHeader::create([
                'document_code'=> $transaction->document_code,
                'document_number'=> $transaction->document_number,
                'user'=> Auth::user()->name,
                'total'=> $request->sub_total,
                'date'=> $tanggal,
               'status'=> 1,
            ]);
        }
        // dd($request->id);
        // $puts = $request->id;
        // dd($puts);
        // foreach ($puts as $put ) {
            // dd($put);
            // $product = TransactionDetail::findOrFail($put);
            // $id = FreelanceContractTransaction::where('freelance_id', $fr->id)->max('id'); dd
            // dd($request->price);
            // $total = $request->price * $request->quantity;
            // $data = TransactionDetail::find($put);
            // $datas = $data->update(['quantity' => $request->quantity, 
                                    // 'sub_total'=>$total,]);
                
                
        // }   
        // $product_new = Product::findOrFail($request->id);
        // $product_create =$product_new->produce_code;
        // $product_price =$product_new->price;

        
        // return view('product.product_detail', compact('products'));
        // $number = DocumentNumberController::documentNumber();
        // $tanggal = Carbon::now();

        // $products = new TransactionHeader();
        // $products->user = Auth::user()->name;
        // $products->date = $tanggal;
        // $products->document_code = 'TRX';
        // $products->document_number = $number;
        // $products->total = $product_create;
        // $products->status = 1;
        // $products->save();

        // $products = new TransactionDetail;
        //     $products->document_code = 'TRX';
        //     $products->document_number = $number;
        //     $products->produce_code=$product_create;
        //     $products->price = $product_price;
        //     $products->unit='PCS';
        //     $products->currency='IDR';
	    // 	$products->status = 1;
	    // 	$products->update();
        alert()->success('Success Checkout Product');
        return redirect('/dashboard');
    }


    public function report(Request $request)
    {
        $reports = TransactionDetail::join('transaction_headers','transaction_headers.document_number','transaction_details.document_number')
                                    ->join('products','products.produce_code','transaction_details.produce_code')
                                    ->selectRaw('transaction_details.*,products.produce_name as produce_name, 
                                                transaction_headers.user as user, transaction_headers.date as date')->get();
        return view('product.report', compact('reports'));
    }

}
