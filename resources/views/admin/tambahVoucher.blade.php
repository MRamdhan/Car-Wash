<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Voucher</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap5.min.css') }}">

    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>

    <style>
        body {
            background-color: #F0F3F8;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        @if (session('message'))
            <div class="alert alert-dark">
                {{ session('message') }}
            </div>
        @endif
        <form action="{{ route('postTambahVoucher') }}" method="POST">
            @csrf
            <div class="card p-4 text-black rounded-4">
                <h2> Tambah Voucher </h2>
                <hr>
                <div class="mb-3">
                    <label for="kode"> Kode Voucher </label>
                    <input type="text" name="kode" id="kode" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="diskon"> Diskon </label>
                    <input type="text" name="diskon" id="diskon" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="kedaluwarsa"> Kedaluwarsa </label>
                    <input type="date" name="kedaluwarsa" id="kedaluwarsa" class="form-control">
                </div>
                <div class="mt-3">
                    <a href="{{ route('homeAdmin') }}" class="btn btn-dark"> Kembali </a>
                    <button class="btn" style="background-color: #25364F; color: white"> Tambah </button>
                </div>
            </div>
        </form>
        <div class="container mt-5">
            <div class="card p-4 text-black rounded-4">
                <h2> Keterangan </h2>
                <hr>
                <table id="data" class="table table-striped nowarp">
                    <thead>
                        <tr>
                            <th> No </th>
                            <th> Kode </th>
                            <th> Diskon </th>
                            <th> Kedaluwarsa </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    @foreach ($voucher as $item)
                        <tbody>
                            <tr>
                                <td> {{ $loop->index + 1 }} </td>
                                <td> {{ $item->kode }} </td>
                                <td> {{ $item->diskon }} </td>
                                <td> {{ $item->kedaluwarsa }} </td>
                                <td>
                                    <a href="{{ route('editVoucher', $item->id) }}" class="btn btn-primary"> Edit
                                    </a>
                                    <a href="{{ route('hapusVoucher', $item->id) }}" class="btn btn-danger"
                                        onclick="return confirm('Yakin Hapus?')"> Hapus </a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
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
