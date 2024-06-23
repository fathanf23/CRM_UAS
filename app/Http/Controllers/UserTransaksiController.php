<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class UserTransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::where('pelanggan_id', auth()->user()->pelanggan->id)->get();
        // dd($transaksi->where('status_transaksi', 'pending')->sum('harga'));

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
                    'gross_amount' => $transaksi,

                ),
                'customer_details' => array(
                    'first_name' => auth()->user()->username,
                    'email' => auth()->user()->email,
                    // 'phone' => ,
                ),
            );

            $snapToken = '';
            return view('transaksi', compact('transaksi', 'snapToken'));
    }
}