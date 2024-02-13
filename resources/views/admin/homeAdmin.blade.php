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
        <div class="card p-4">
            <h1> Home Admin Mobil Tanpa Noda </h1>
            <hr>
            <div class="d-flex">
                <div class="mb-3" style="margin-right: 20px">
                    <a href="{{ route('tambahPaket') }}" class="btn btn-success"> Tambah Paket </a>
                </div>
                <div class="mb-3" style="margin-right: 20px">
                    <a href="{{ route('tambahKasir') }}" class="btn btn-warning"> Lihat User </a>
                </div>
                <div class="mb-3">
                    <a href="{{ route('logout') }}" class="btn btn-secondary" onclick="return confirm('Yakin Logout?')"> Logout </a>
                </div>
            </div>
            <div class="col-4 mt-2">
                <form action="{{ route('searchPaket') }}" method="GET" class="form-group">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari berdasarkan Nama Paket"
                            name="keyword">
                        <button class="btn btn-dark" type="submit">Cari</button>
                    </div>
                </form>
            </div>
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
                        <td> {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td> {{ $item->deskripsi }} </td>
                        <td>
                            <a href="{{ route('editPaket', $item->id) }}" class="btn btn-primary"> Edit </a>
                            <a href="{{ route('hapusPaket', $item->id) }}"
                                onclick="return confirm('Yakin Hapus Paket?')" class="btn btn-danger"> Hapus </a>
                        </td>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
    @include('template.footer')
</body>

</html>
