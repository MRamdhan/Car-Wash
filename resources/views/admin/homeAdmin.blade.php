<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap5.min.css') }}">

    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>
    <title>Home Admin</title>
    <style>
        body {
            background-color: #F0F3F8;
        }
    </style>
</head>

<body>
    @include('template.nav')
    <div class="container" style="margin-top: 100px">
        @if (session('message'))
            <div class="alert alert-dark">
                {{ Session('message') }}
            </div>
        @endif
        <div class="card p-4">
            <h1> Home Admin Mobil Bersih </h1>
            <hr>
            <span>
            <a href="{{ route('tambahPaket') }}" class="btn btn-success mb-3"> Tambah </a>
            </span>
            <table id="data" class="table table-striped nowarp mt-3 mb-5">
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
    <script>
        new DataTable('#data', {
            responsive: true,
        });
    </script>
</body>

</html>
