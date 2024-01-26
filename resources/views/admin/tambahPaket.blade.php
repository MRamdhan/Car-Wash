<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Tambah</title>
</head>

<body>
    <div class="container mt-5 col-6 pb-5">
        <div class="mx-auto">
            <form action="{{ route('postTambahPaket') }}" method="POST" class="form-group">
                @csrf
                <div class="card p-4 text-black">
                    <h2> Tambah Paket</h2>
                    <hr>
                    <div class="mb-3">
                        <h5>Paket</h5>
                        <input type="text" name="paket" class="form-control">
                    </div>
                    <div class="mb-3">
                        <h5>Harga</h5>
                        <input type="text" name="harga" class="form-control">
                    </div>
                    <div class="mb-3">
                        <h5>Deskripsi</h5>
                        <input type="text" name="deskripsi" class="form-control">
                    </div>
                    <div class="mt-3">
                        <a href="/homeAdmin" class="btn btn-dark mt-3">Kembali</a>
                        <button type="submit" class="btn btn-primary mt-3">Bayar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
