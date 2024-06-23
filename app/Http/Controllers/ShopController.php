<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\DetailTransaksi;
use App\Models\Pelanggan;
use App\Models\Kartu;
use DB;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detail_transaksi = DetailTransaksi::join('produk', 'produk_id', '=', 'produk.id')
            ->select('detail_transaksi.*', 'produk.nm_produk as nama_produk')
            ->get();
        $pelanggan = Pelanggan::join('kartu', 'kartu_id', '=', 'kartu.id')
            ->select('pelanggan.*', 'kartu.kode as kode')
            ->get();
        return view('shop', compact('detail_transaksi', 'pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addToCart($id)
    {
        $produk = Produk::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
            $cart[$id]['harga_total'] += $produk->harga_produk;
        } else {
            $cart[$id] = [
                "nama_produk" => $produk->nm_produk,
                "qty" => 1,
                "harga_produk" => $produk->harga_produk,
                "harga_total" => $produk->harga_produk,
                "foto" => $produk->foto
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function cart(Request $request)
{
    $produk = Produk::get();
    // dd($);
    $cart = session()->get('cart', []);
    // dd($cart);
    if(empty($cart))
    {
        return redirect('/');
    }
    $total = 0;
    $pelanggan_id = auth()->user()->id;
    $pelanggan = Pelanggan::where('user_id', $pelanggan_id)->with('kartu')->get();
    // dd($pelanggan);
        $diskon = 0;
        foreach($pelanggan as $pelanggan){
        switch($pelanggan->kartu->id){
            case 1:
                $diskon = $pelanggan->kartu->diskon;
                break;
            case 2:
                $diskon = $pelanggan->kartu->diskon;
                break;
            case 3:
                $diskon = $pelanggan->kartu->diskon;
                break;
            case 4:
                $diskon = $pelanggan->kartu->diskon;
                break;
            default:
            $diskon = 0;
            break;
        }
    }
    foreach ($cart as $item) {
        $total += $item['harga_total'];
    }
    $total -= $diskon;
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $total,
            ),
            'customer_details' => array(
                'first_name' => auth()->user()->username,
            ),

        );
        
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return view('vendor.carts', compact('produk', 'snapToken'));
            
}
public function success()
{
    $cart = session()->get('cart');
    $pelanggan = Pelanggan::where('user_id' , auth()->user()->id)->first();
    $kartu = Pelanggan::where('id', $pelanggan->id)->with('kartu')->get();
    $diskon = 0;
    foreach($kartu as $pelanggan){
    switch($pelanggan->kartu->id){
        case 1:
            $diskon = $pelanggan->kartu->diskon;
            break;
        case 2:
            $diskon = $pelanggan->kartu->diskon;
            break;
        case 3:
            $diskon = $pelanggan->kartu->diskon;
            break;
        case 4:
            $diskon = $pelanggan->kartu->diskon;
            break;
        default:
        $diskon = 0;
        break;
    }
}
    $harga = 0;
    foreach($cart as $item){
        $harga += $item['harga_produk'];
    }
    $total = $harga - $diskon;
    DB::table('transaksi')->insert([
        'tgl_transaksi' => date('y-m-d'),
        'harga' => $harga,
        'harga_total' => $total,
        'pelanggan_id' => $pelanggan->id,
    ]);
    session()->forget('cart');
    return view('vendor.success');
}

    /**
     * Store a newly created resource in storage.
     * @return response()
     */
    

    public function update(Request $request)
{
    
}


    /**
     * Remove the specified resource from storage.
     * @return response()
     */
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Produk berhasil dihapus');
        }
        return redirect('/carts');
    }
}
