@extends('front.app')

@section('front')
    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-20">
                    <div class="intro-excerpt">
                        <h1>Susu Mooo!</h1>
                        <p>Nikmati kesegaran dan kelezatan dari Susu Mooo, susu segar berkualitas tinggi dengan pilihan rasa yang menggugah selera. Kami menghadirkan berbagai varian rasa yang siap memanjakan lidah Anda dan memberikan pengalaman minum susu yang tak terlupakan.</p>
                        <p><a href="https://wa.link/o2kdow" class="btn btn-warning me-2">Order Via Whatsapp</a><a href="#menu" class="btn btn-white-outline">Explore</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- End Hero Section -->
    
    <!-- Start Product Section -->
    <div class="product-section" id="menu">
        <div class="container">
            <div class="row">
    
                <!-- Start Column 1 -->
                <div class="col-md-12 col-lg-3 mb-2 mb-lg-0">
                <img src="frontend/images/susumooo.png" alt="Image" class="img-fluid">

                </div> 
                <!-- End Column 1 -->
    
                <!-- Start Column 2 -->
                @foreach($produk as $p)
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="{{ route('add.to.cart', $p->id) }}">
                        @empty($p->foto)
                        <img src="{{ asset('frontend/images/nofoto.png') }}" alt="..." class="img-fluid product-thumbnail">
                        @else
                        <img src="{{ asset('frontend/images') }}/{{$p->foto}}" alt="..." class="img-fluid product-thumbnail">
                        @endempty
                        <h3 class="product-title">{{$p->nm_produk}}</h3>
                        <strong class="product-price">
                        Rp. {{ number_format($p->harga_produk, 0, ',', '.') }}
                        </strong>
                    </a>
                </div> 
                @endforeach    
            </div>
        </div>
    </div>
    <!-- End Product Section -->
@endsection
