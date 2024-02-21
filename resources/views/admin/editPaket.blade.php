<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Edit</title>
    <style>
        body {
            background-color: #F0F3F8;
        }
    </style>
</head>

<body>
    <div class="container mt-5 col-6 pb-5">
        <div class="mx-auto">
            <form action="{{ route('postEditPaket', $produk->id) }}" method="POST" class="form-group">
                @csrf
                <div class="card p-4 text-black">
                    <h2> Edit Paket</h2>
                    <hr>
                    <div class="mb-3">
                        <h5>Paket</h5>
                        <input type="text" name="paket" class="form-control" value="{{ $produk->paket }}">
                    </div>
                    <div class="mb-3">
                        <h5>Harga</h5>
                        <input type="text" name="harga" class="form-control"
                            value="{{ $produk->harga}}">
                    </div>
                    <div class="mb-3">
                        <h5>Deskripsi</h5>
                        <input type="text" name="deskripsi" class="form-control" value="{{ $produk->deskripsi }}">
                    </div>
                    <div class="mt-3">
                        <a href="/homeAdmin" class="btn btn-dark">Kembali</a>
                        <button type="submit" class="btn" style="background-color: #25364F; color: white">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
@include('template.footer')

</html>
