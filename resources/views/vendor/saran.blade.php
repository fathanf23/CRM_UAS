@extends('front.apps')
@section('fronts')
<br>
<br>
<br>
<br>
<br>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Beri Penilaian Pada Produk Kita</h3>
                                </div>
                                <div class="card-body">
                                <form action="{{url('/vendor/saran/store')}}" method="post" enctype="multipart/form-data">
            @csrf
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                    name="nama">
                                                @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="saran" class="form-label">Kesan & Pesan setelah anda membeli Produk kami</label>
                                            <div class="input-group">
                                                <textarea name="saran" id="" cols="30" rows=""
                                                    class="form-control"></textarea>
                                                @error('saran')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
            <div class="mb-3">
                <label for="bintang" class="form-label">Rating</label>
                <div class="input-group">
                    <select name="bintang" id="" class="form-control">
                        <option value="" readonly>Pilih Rating</option>
                        <option value="1">⭐(Tidak Baik)</option>
                        <option value="2">⭐⭐(Cukup Baik)</option>
                        <option value="3">⭐⭐⭐(Baik)</option>
                        <option value="4">⭐⭐⭐⭐(Bagus)</option>
                        <option value="5">⭐⭐⭐⭐⭐(Puas)</option>
                    </select>
                    @error('bintang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary text-white">Beri Nilai</button>
            <button class="btn btn-warning">
            <a href="{{ route('home') }}" class="text-white">Kembali ke Home</a>
            </button>
                                </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
</body>
@endsection