@include('admin.layouts.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @include('admin.layouts.top')



    <div class="container-fluid py-4">
        @yield('content')

        @include('admin.layouts.footer')
