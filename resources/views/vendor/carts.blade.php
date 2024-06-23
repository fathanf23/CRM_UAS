@extends('front.apps')
@section('fronts')
<!-- Cart Page Start -->
<br>
<br>
<br>
<script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="{{config('midtrans.client_key')}}"></script>

<div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                        @php $total = 0 @endphp
                        @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                        @php $total += $details['harga_produk'] * $details['qty'] @endphp
                            <tr>
                                <th scope="row">
                                <div class="d-flex align-items-center">
                                @empty($details['foto'])
                                <img src="{{ asset('fronts/img/nofoto.png') }}" height="100" class="img-responsive" style="border-radius: 10px;">
                                @else
                                <img src="{{ asset('fronts/img') }}/{{$details['foto']}}" height="100" class="img-responsive" style="border-radius: 10px;">
                                @endempty
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">{{ $details['nama_produk'] }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">Rp. {{ number_format($details['harga_produk'], 0, ',', '.') }}</p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px; ">
                                        <p class="" style="">{{$details['qty']}}</p>
                                    </div>
                                </td>
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
                    </table>
                </div>
                <div class="row g-5">
                    <!-- <div class="col-8"></div> -->
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                <hr>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Harga Total:</h5>
                                    <h3  class="mb-0">Rp. <span class="fw-normal">{{ number_format($total, 0, ',', '.') }}</span></h3>
                                </div>
                            </div>
                            <button class="btn btn-success rounded-pill px-4 py-3 text-white text-uppercase mb-4 ms-4" id="pay-button" type="button">Bayar Disini</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page End -->
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