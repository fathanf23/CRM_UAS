<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Link ke custom.css -->
    <link rel="stylesheet" href="{{ asset('fronts/css/css_saran.css') }}">
    <title>Susu Mooo</title>
</head>

<body>

    <div class="container my-5 pt-5">
        <h1>FORM PENILAIAN TERHADAP PRODUK KAMI</h1>
        <hr>

        <form action="{{url('/vendor/saran/store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <div class="input-group">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="saran" class="form-label">Saran</label>
                <div class="input-group">
                    <textarea name="saran" id="" cols="30" rows="10" class="form-control"></textarea>
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

            <button type="submit" class="btn btn-danger">Proses</button>
            <a href="{{url('/')}}" type="submit" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

</body>

</html>