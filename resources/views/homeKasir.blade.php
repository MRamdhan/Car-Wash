<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Home</title>
    <style>
        .card {
            background-color: white;
            box-shadow: 0 4px 8px black;
            transition: transform 0.2s;
            border-radius: 8px;
            overflow: hidden;
            margin: 0;
        }

        .container {
            flex: 1;
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
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <img src="img/cucimobil.png" alt="" height="450px" width="100%">
            </div>
            <h1 class="text-center m-4"> PAKET MOBIL TANPA NODA </h1>
            <hr>
            @if (session('message'))
                <div class="alert alert-dark">
                    {{ session('message') }}
                </div>
            @endif
            @foreach ($produk as $item)
                <div class="col-4 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h3> {{ $item->paket }} </h3>
                            <hr>
                            <p class="card-text mt-3"> Harga Rp: {{ number_format($item->harga, 0, ',', '.') }}</p>
                            <p class="card-description"> {{ $item->deskripsi }} </p>
                            <a href="{{ route('pilih', $item->id) }}" class="btn btn-warning"> Pilih </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('template.footer')
</body>

</html>
