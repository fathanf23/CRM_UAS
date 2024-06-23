<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="/frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="/frontend/css/tiny-slider.css" rel="stylesheet">
    <link href="/frontend/css/style.css" rel="stylesheet">

    <title>Susu Mooo!</title>
    @stack('css')
</head>

<body>

    <!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
        <div class="container">
            <div class="susumooo">
                <img src="frontend/images/susumooo.png" alt="Image" class="img-fluid">
            </div>
            <a class="navbar-brand" href="/">Susu Mooo!<span></span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
                aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li><a class="nav-link" href="#menu">Menu</a></li>
                    <li><a class="nav-link" href="#contact">Contact us</a></li>
                    <li><a class="nav-link" href="">About us</a></li>
                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <li>
                        <a class="nav-link" href="{{route('login')}}">
                            <img src="frontend/images/user.svg">
                        </a>
                    </li>

                    <li>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                @if (empty(Auth::user()->username))
                                {{ 'Tamu' }}
                                @else
                                {{ Auth::user()->username }}
                                @endif
                            </a>
                            <div class="dropdown-menu m-0">
                                <a class="nav-item nav-link dropdown-item text-primary" href="{{route('logout')}}">
                                    <p>logout</p>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                    </li>
                    <li class="nav-item position-relative">
                        <a class="nav-link" href="{{ route('cart') }}">
                            <img src="frontend/images/cart.svg">
                            @if (count((array) session('cart')) > 0)
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ count((array) session('cart')) }}
                                <span class="visually-hidden">unread messages</span>
                            </span>
                            @endif
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>


    <!-- End Header/Navigation -->
    @yield('front')

    <!-- Start Footer Section -->
    <footer class="footer-section">
        <div class="container relative">

            <div class="sofa-img">
                <img src="frontend/images/susumooo.png" alt="Image" class="img-fluid">
            </div>



            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Susu Mooo<span>.</span></a></div>
                    <p class="mb-4 footer-text-deskripsi">Minuman susu berkualitas! Dengan menggunakan Susu Murni yang segar, anda dapat mendapatkan banyak sekali manfaat, contohnya...</p>

                    <ul class="list-unstyled custom-social">
                        <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
                    </ul>
                </div>

                <div class="col-lg-8">
                    <div class="row links-wrap">
                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">About us</a></li>
                                <li><a href="#menu">Menu</a></li>
                                <li><a href="#">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="border-top copyright">
                <div class="row pt-4">
                    <div class="col-lg-6">
                        <p class="mb-2 text-center text-lg-start">Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                            </script>. All Rights Reserved. &mdash; Designed Fathan by <a
                                href="https://untree.co">Susu Mooo!</a>
                            <!-- License information: https://untree.co/license/ -->
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

    <script src="/frontend/js/bootstrap.bundle.min.js"></script>
    <script src="/frontend/js/tiny-slider.js"></script>
    <script src="/frontend/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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