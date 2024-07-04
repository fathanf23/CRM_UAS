<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Susu Mooo</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">
        <link rel="icon" href="{{ asset('fronts/img/susumooo.png') }}" type="image/x-icon">
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="fronts/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="fronts/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="fronts/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="fronts/css/style.css" rel="stylesheet">
    @stack('css')
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar bg-primary d-none d-lg-block">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2 ">
                    <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="https://maps.app.goo.gl/uWyhS8vteQRGaTk79"
                            class="text-white">Jl.Syeh Maulana Akbar, samping Oppa Chicken</a></small>
                    <small class="me-3 text-white"><i class="fas fa-envelope me-2 text-secondary"></i>susumoo230803@gmail.com</small>
                            <small class="me-3"><i class="fab fa-instagram me-2 text-secondary"></i><a href="https://www.instagram.com/susu_mooo.id?igsh=dHZsNWFmN3oyd2No"
                            class="text-white">@susu_mooo.id</a></small>
                            <small class="me-3"><i class="fab fa-whatsapp me-2 text-secondary"></i></i><a href="https://wa.link/o2kdow"
                            class="text-white">089636005936</a></small>
                </div>

            </div>
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">
                <img class="susumooo" src="fronts/img/susumooo.png" alt="">
                <a href="{{route('home')}}" class="navbar-brand">
                    <h1 class="text-primary display-6">Susu Mooo!</h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="{{route('home')}}" class="nav-item nav-link active">Beranda</a>
                        <!-- <a href="#menu" class="nav-item nav-link">Shop</a>
                            <a href="shop-detail.html" class="nav-item nav-link">Shop Detail</a> -->
                        <a href="https://wa.link/o2kdow" class="nav-item nav-link">Kontak</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Halaman</a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                <a href="#about" class="dropdown-item">Tentang Susu Mooo</a>
                                <a href="#video" class="dropdown-item">Video Tentang Susu</a>
                                <a href="#testimonial" class="dropdown-item">Testimonial</a>
                                <a href="https://khodam.vercel.app/" class="dropdown-item">Cek Khodam</a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex m-3 me-0">
                                <a href="{{ Auth::check() ? route('cart') : route('login') }}" class="position-relative me-4 my-auto">
                            <i class="fas fa-shopping-cart fa-2x"></i>
                            @if (count((array) session('cart')) > 0)
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-white px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">
                                    {{ count((array) session('cart')) }}
                                </span>
                            @endif
                        </a>
                        <div class="nav-item  dropdown">
                            <a href="{{route('login')}}" class="my-auto">
                                @if (empty(Auth::user()->username))
                                {{ 'Tamu' }}
                                @else
                                {{ Auth::user()->username }}
                                @endif
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                            <div class="dropdown-menu m-0">
                                <a class="nav-item nav-link dropdown-item text-primary" id="logout" href="{{route('login')}}">
                                @if (empty(Auth::user()->username))
                                {{ 'Login' }}
                                @else
                                <a class="nav-item nav-link dropdown-item text-primary" id="logout" href="{{route('logout')}}">
                                {{ 'Logout' }}
                                @endif
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->
    @yield('fronts')

    <!-- Footer Start -->
    <!-- Start Footer Section -->
    <br>
    <br>
		<footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
				</div>

				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><h1 class="display-6 text-primary">Susu Mooo!</h1><hr></div>
						<p class="mb-4">Nikmati kesegaran dan kelezatan dari Susu Mooo, susu segar berkualitas tinggi
                    dengan pilihan rasa yang menggugah selera. Kami menghadirkan berbagai varian rasa yang siap
                    memanjakan lidah Anda dan memberikan pengalaman minum susu yang tak terlupakan.</p>
					</div>
                    <div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><h1 class="display-6 text-primary">Kontak & Lokasi</h1><hr></div>
						<p class="mb-2"><i class="fab fa-whatsapp fa-lg text-secondary"></i><a href="https://wa.link/o2kdow" class="text-dark"> 089636005936</a></p>
                        <p class="mb-2 text-dark"><i class="fas fa-envelope me-2 text-secondary"></i>susumooo230803@gmail.com</p>
                        <p class="mb-2"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="https://maps.app.goo.gl/uWyhS8vteQRGaTk79"
                            class="text-dark">Jl.Syeh Maulana Akbar, samping Oppa Chicken</a></p>
                        <p class="mb-2"><i class="fab fa-instagram me-2 text-secondary"></i><a href="https://www.instagram.com/susu_mooo.id?igsh=dHZsNWFmN3oyd2No"
                            class="text-dark">@susu_mooo.id</a></p>
					</div>
                    <div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><h1 class="display-6 text-primary">Kelebihan kedai kita</h1><hr></div>
						<p class="mb-2"><i class="fas fa-check"></i> Susu 100% Segar</p>
						<p class="mb-2"><i class="fas fa-check"></i> Terima Antar Pesanan Max. Jarak 3Km Radius Kuningan Kota</p>
						<p class="mb-2"><i class="fas fa-check"></i> Menerima Banyak Metode Pembayaran</p>
						<p class="mb-2"><i class="fas fa-check"></i> Admin Yang Ramah dan Fast Respon</p>
					</div>

				</div>
                

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed by <a href="{{url('/')}}">Susu Mooo!</a> <!-- License information: https://untree.co/license/ -->
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary text-white rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="fronts/lib/easing/easing.min.js"></script>
    <script src="fronts/lib/waypoints/waypoints.min.js"></script>
    <script src="fronts/lib/lightbox/js/lightbox.min.js"></script>
    <script src="fronts/lib/owlcarousel/owl.carousel.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

    <!-- Template Javascript -->
    <script src="fronts/js/main.js"></script>
    <script type="text/javascript">
    document.getElementById('pay-button').addEventListener('click', function() {
        fetch("{{ route('checkout') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    // data that might be needed for checkout
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.snapToken) {
                    snap.pay(data.snapToken);
                } else {
                    console.error(data.error);
                }
            })
            .catch(error => console.error('Error:', error));
    });
    </script>
    @stack('js')

</body>

</html>