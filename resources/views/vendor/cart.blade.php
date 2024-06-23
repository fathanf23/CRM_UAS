@extends('front.app')
@section('front')
<script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="{{config('midtrans.client_key')}}"></script>
<div class="hero">
    <div class="container">
        <h1>Keranjang</h1>
    </div>
</div>

<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Harga Jual</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
        @foreach(session('cart') as $id => $details)
        @php $total += $details['harga_produk'] * $details['qty'] @endphp
        <tr data-id="{{ $id }}">
            <td data-th="Produk">
                <div class="row">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs">
                            @empty($details['foto'])
                                <img src="{{ url('frontend/images/nophoto.png') }}" width="100" height="100" class="img-responsive"/>
                            @else
                                <img src="{{ url('frontend/images')}}/{{$details['foto']}}" width="100" height="100" class="img-responsive"/>
                            @endempty
                        </div>
                        <div class="col-sm-9">
                            <h4 class="nomargin">{{ $details['nama_produk'] }}</h4>
                        </div>
                    </div>
                </div>
            </td>
            <td data-th="Price">Rp. {{ number_format($details['harga_produk'], 0, ',', '.') }}</td>
            <td data-th="Quantity">
                <input type="number" value="{{ $details['qty'] }}" class="form-control quantity update-cart" />
            </td>
            <td data-th="Subtotal" class="text-center">Rp.
                {{ number_format($details['harga_produk'] * $details['qty'], 0, ',', '.') }}</td>
            <td class="actions" data-th="">
                <form action="{{ route('remove.from.cart') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $id }}">
                    <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
        
        @endforeach
    @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <h3><strong>Total Rp. {{ number_format($total, 0, ',', '.') }}</strong></h3>
                @if(isset($diskon) && $diskon > 0)
                <h4><strong>Diskon: Rp. {{ number_format($diskon, 0, ',', '.') }}</strong></h4>
                <h3><strong>Total Setelah Diskon: Rp. {{ number_format($total_setelah_diskon, 0, ',', '.') }}</strong></h3>
                @endif            
            </td>
        </tr>
        <tr>
        <td colspan="5" class="text-right">
            
                <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <button class="btn btn-success" id="pay-button">Checkout</button>
            </td>
        </tr>
    </tfoot>
</table>
<script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{ $snapToken }}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            window.location.href = '{{url('success')}}';
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
      });
    </script>
@endsection
