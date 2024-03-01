<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Home</title>
    <style>
        body {
            background-color: #F0F3F8;
        }

        .card {
            background-color: white;
            box-shadow: 0 4px 8px black;
            transition: transform 0.2s;
            border-radius: 8px;
            overflow: hidden;
            margin: 0;
        }

        .card:hover {
            transform: scale(1.05);
        }

        p,
        h3 {
            color: black;
        }
    </style>
</head>

<body>
    @include('template.nav')
    <img src="img/mobilbersih.png" alt="" width="100%" height="650px">
    <div class="container mt-5">
        <div class="row">
            <h1 class="text-center m-4"> <b> PAKET MOBIL BERSIH </b> </h1>
            <hr>
            @if (session('message'))
                <div class="alert alert-dark">
                    {{ session('message') }}
                </div>
            @endif
            @foreach ($produk as $item)
                <div class="col-4 mt-5">
                    <div class="card" style="height: 100%;">
                        <div class="card-body">
                            <h3> {{ $item->paket }} </h3>
                            <hr>
                            <p class="card-text mt-3"> <b> Harga : Rp {{ number_format($item->harga, 0, ',', '.') }}</b> </p>
                            <p class="card-description"> {{ $item->deskripsi }} </p>
                            <a href="{{ route('pilih', $item->id) }}" class="btn"
                                style="background-color: #25364F; color: white"> Pilih </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('template.footer')
</body>

</html>
