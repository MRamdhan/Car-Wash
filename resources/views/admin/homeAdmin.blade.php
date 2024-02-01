<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <h1> Home Admin Car Wash </h1>
        <a href="/tambahPaket" class="btn btn-success"> Tambah Paket </a>
        <a href="/tambahKasir" class="btn btn-warning"> Tambah Kasir</a>
        <a href="{{ route('logout') }}" class="btn btn-secondary"> Logout</a>
    </div>
    <div class="container mt-5">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <table class="table table-bordered mt-3 mb-5">
            <thead>
                <tr>
                    <th> No </th>
                    <th> Nama Paket </th>
                    <th> Harga Paket </th>
                    <th> Deskripsi </th>
                    <th> Action </th>
                </tr>
            </thead>
            @foreach ($produk as $item)
            <tbody>
                <td> {{ $loop->index + 1 }} </td>
                <td> {{ $item->paket }} </td>
                <td> {{ number_format($item->harga, 0,',','.')}}</td>
                <td> {{ $item->deskripsi }} </td>
                <td>
                    <a href="{{ route('editPaket', $item->id) }}" class="btn btn-primary"> Edit </a>
                    <a href="{{ route('hapusPaket', $item->id) }}" onclick="return confirm('Yakin Hapus Paket?')" class="btn btn-danger"> Hapus </a>
                </td>
            </tbody>
            @endforeach
        </table>
    </div>
</body>
</html>