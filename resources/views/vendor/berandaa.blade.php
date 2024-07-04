@extends('front.apps')
@section('fronts')
<!-- Hero Start -->
<div class="container-fluid py-5  hero-header">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-12 col-lg-7">
                <h1 class="mb-3 display-3 text-white">Susu Mooo!</h1>
                <h4 class="mb-3 text-warning"><i class="fas fa-check"></i> 100% Susu Murni Asli!</h4>
                <h4 class="mb-3 text-warning"><i class="fas fa-check"></i> Tidak Mengandung Bahan Pengawet!</h4>
                <h4 class="mb-3 text-warning"><i class="fas fa-check"></i> Terima Pesan Antar Min. Jarak 3Km Radius Kota Kuningan!</h4>
                <p class="text-white">Nikmati kesegaran dan kelezatan dari Susu Mooo, susu segar berkualitas tinggi
                    dengan pilihan rasa yang menggugah selera. Kami menghadirkan berbagai varian rasa yang siap
                    memanjakan lidah Anda dan memberikan pengalaman minum susu yang tak terlupakan.</p>
                <div class="position-relative mx-auto">
                    <p><a href="https://wa.link/o2kdow" class="btn btn-warning me-2"><i
                                class="fab fa-whatsapp fa-lg"></i> Order di Whatsapp</a><a href="#menu"
                            class="btn btn-primary"><i class="fas fa-clipboard fa-lg me-1"></i>Jelajahi Menu</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->
<div class="container-fluid fruite menu-section py-5" id="menu">
    <div class="container py-5">
        <div class="tab-class text-center">
            <h1 class="menu-susu mb-5 display-3 text-white">Menu Susu Mooo!</h1> 
            <div class="row g-4">
                @foreach ($produk as $p)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="rounded position-relative fruite-item">
                        <div class="fruite-img">
                            @empty($p->foto)
                            <img src="{{ asset('fronts/img/nofoto.png') }}" class="img-fluid w-100 rounded-top" alt="">
                            @else
                            <img src="{{ asset('fronts/img') }}/{{$p->foto}}" class="img-fluid w-100 rounded-top"
                                alt="">
                            @endempty
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; left: 10px;">Susu</div>
                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                            <h4 class="fw-bold">{{$p->nm_produk}}</h4>
                            <p></p>
                            <div class="d-flex justify-content-between flex-lg-wrap align-items-center">
                            <span class="text-decoration-line-through text-danger flex-grow-1">Rp. 15.000</span>
                                <p class="text-dark fs-2 fw-bold mb-0 text-center flex-grow-1">
                                    Rp.{{ number_format($p->harga_produk, 0, ',', '.') }}</p>
                                <hr>
                                <a href="{{ route('add.to.cart', $p->id) }}"
                                    class="btn btn-warning rounded-pill px-3 text-white">
                                    <i class="fas fa-cart-plus"></i> Tambah ke Keranjang</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div>
                </div>
            </div>
        </div>
        <!-- About Start -->
        <div class="container-fluid about py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5">
                        <div class="video">
                            <img src="fronts/img/susumooo.png" class="img-fluid rounded" alt="">
                            <div class="position-absolute rounded border-5 border-top border-start border-white"
                                style="bottom: 0; right: 0;;">
                                <img src="" class="img-fluid rounded" alt="">
                            </div>
                            <button type="button" class="btn btn-play" data-bs-toggle="modal"
                                data-src="/fronts/img/susu.mp4" data-bs-target="#videoModal">
                                <span></span>
                            </button>

                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div>
                            <p class="fs-4 text-uppercase text-dark" id="about">Tentang Kita</p>
                            <h1 class="display-4 mb-4 text-primary">Susu Mooo!
                                <hr>
                            </h1>
                            <p class="mb-4">Berdiri pada 21 Maret 2024, berlokasi di Jl. Syeh Maulana Akbar RT 004/ RW
                                002. Kita menyediakan minuman dengan base Susu berkualitas agar menciptakan rasa yang
                                khas! AYO BELI SEKARANG! Anda bisa memesannya lewat website kami atau datang langsung ke
                                Outlet yang sudah kami sediakan alamatnya di atas, tunggu apa lagi? tidak bawa uang
                                cash? tenang! Kami sudah siapkan banyak sekali metode pembayaran seperti Qris, Transfer
                                Bank, E-Wallet dll. Jadi tidak ada alasan untuk Anda membeli Produk Kami!
                            </p>
                            <h1 class="display-10 fw-bold mb-4">"Nikmati Murninya Susu dengan Susu Mooo!"</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <i class="fas fa-mug-hot fa-3x text-primary"></i>
                    <div class="ms-4">
                        <h5 class="mb-2">100% Susu Murni</h5>
                        <p class="mb-0">
                            Susu murni memiliki beberapa keuntungan utama: mengandung nutrisi alami penting seperti
                            vitamin, mineral, dan protein, serta memberikan rasa dan tekstur lebih kaya. Bebas dari
                            bahan tambahan seperti pengawet atau pemanis, dan dengan proses minimal, kandungan gizinya
                            tetap terjaga, menjadikannya sumber kalsium yang baik untuk kesehatan tulang dan gigi.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <i class="fas fa-heartbeat fa-3x text-primary"></i>
                    <div class="ms-4">
                        <h5 class="mb-2">Manfaat Susu Murni</h5>
                        <p class="mb-0">
                            Susu murni kaya nutrisi seperti protein, kalsium, dan vitamin D yang
                            penting untuk kesehatan tulang, otot, dan kekebalan tubuh. Konsumsinya
                            harus seimbang dan disesuaikan dengan kondisi individu.</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <a href="https://www.alodokter.com/inilah-efek-susu-murni-terhadap-tubuh-anda"
            class="btn btn-secondary text-white rounded-pill py-3 px-5">Jelajahi Lebih
            Lanjut Tentang Manfaatnya</a>
        <br>
        <br>
        <br>
        <br>
        <h1 class="display-10 mb-4">Video Penjelasan Tentang Manfaatnya Minum Susu Menurut Dr. Sung</h1>
        <div class="ratio ratio-16x9">
            <video class="embed-responsive-item" style="border-radius: 25px;" id="video" controls>
                <source src="fronts/img/penjelasan_susu.mp4" type="video/mp4">
            </video>
        </div>

        <!-- Testiminial Start -->
        <div class="container-fluid testimonial py-5" id="testimonial">

            <div class="container py-5">
                <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
                    <h5 class="display-5">
                        Testimoni</h5>
                    <h1 class="display-7 w-50 mx-auto">Yang Pelanggan katakan ketika membeli produk kami</h1>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay=".5s">
                    @foreach($saran as $s)
                    <div class="testimonial-item">
                        <div class="testimonial-content rounded mb-4 p-4">
                            <p class="fs-5 m-0">{{$s->saran}}</p>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center  mb-4" style="padding: 0 0 0 25px;">
                            <div class="position-relative">
                                <i class="fas fa-user fa-lg"></i>
                            </div>
                            <div class="ms-3">
                                <h4 class="mb-0">{{$s->nama}}</h4>
                                <div class="d-flex">
                                    @for ($i = 0; $i < $s->bintang; $i++)
                                        <small class="fas fa-star text-primary me-1"></small>
                                        @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <br>
                <br>

                <a href="{{url('/saran/')}}"
                    class="btn btn-primary btn-primary-outline-0 align-items-center text-white rounded-pill py-3 px-5">Berikan
                    Nilai anda untuk
                    Produk kami disini</a>
            </div>
            <!-- Testiminial End -->
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

       @if(session('success'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
@endif
        @endsection