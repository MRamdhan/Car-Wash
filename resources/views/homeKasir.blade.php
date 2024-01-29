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
            background-color: #1B4242;
        }
        .card{
            background-color: #9EC8B9;
            box-shadow: 0 4px 8px black;
            transition: transform 0.2s;
            border-radius: 8px;
            overflow: hidden;
        }
        .card:hover{
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    @include('nav')
    <div class="container mt-5">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <h1 style="color: #ffff;" style="display: flex; text-align: center"> PAKET CAR WASH </h1>
        <div class="row">
            @foreach ($produk as $item)
                <div class="col-4 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h3 style="color: #092635"> {{ $item->paket }} </h3>
                            {{-- <img src="{{ $item->foto }}" alt="" class="img-card-top mx-auto" style="width: 50%;"> --}}
                                <p class="card-text mt-3"> Harga Rp: {{ number_format($item->harga,0 ,',','.') }}</p>
                                <p class="card-description"> {{ $item->deskripsi }} </p>
                            <a href="{{ route('pilih', $item->id) }}" class="btn btn-warning"> Pilih </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
