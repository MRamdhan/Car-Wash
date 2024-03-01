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
    <script src=" {{ asset('js/jquery.dataTables.min.js') }} "></script>
    <script src=" {{ asset('js/dataTables.bootstrap5.min.js') }} "></script>
    <script src=" {{ asset('js/dataTables.responsive.min.js') }} "></script>
    <script src=" {{ asset('js/responsive.bootstrap5.min.js') }} "></script>
    <title>Report</title>
    <style>
        body {
            background-color: #F0F3F8;
        }

        span {
            display: none;
        }
    </style>
</head>

<body>
    @include('template.nav')
    <div class="container mt-5">
        <div class="card p-4">
            <h1 class="text-center mt-5"> Report Kasir </h1>
            <hr>
            @if (session('message'))
            <div class="alert alert-dark">
                {{ Session('message') }}
            </div>
        @endif
            <div class="row mt-4">
                <form action="{{ route('searchDate') }}" method="GET" class="mb-3 col-6">
                    <div class="card p-4 rounded-4 text-black">
                        <h2>Form Search</h2>
                        <hr>
                        <label for="">Start Date</label>
                        <input type="date" class="form-control" name="start_date" placeholder="Start Date" required>
                        <label for="">End Date </label>
                        <input type="date" class="form-control" name="end_date" placeholder="End Date" required>
                        <div class="col mt-3">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>

                <form action="{{ route('exportPdf') }}" method="GET" class="mb-3 col-6">
                    <div class="card text-black p-4 rounded-4">
                        <h2>Form Download</h2>
                        <hr>
                        <label for="">Start Date </label>
                        <input type="date" class="form-control" name="start_date" placeholder="Start Date" required>
                        <label for="">End Date</label>
                        <input type="date" class="form-control" name="end_date" placeholder="End Date" required>
                        <div class="col mt-3">
                            <button type="submit" class="btn btn-success">Download PDF</button>
                        </div>
                    </div>
                </form>
                <div class="container p-4">
                    <div class="d-flex">
                        <h2 class="col-11"> History </h2>
                    </div>
                    <hr>

                </div>
                <div class="container">
                    <table  id="data" class="table table-striped nowrap">
                        <thead>
                            <tr>
                                <th>Tanggal Pembelian</th>
                                <th>No Telepon</th>
                                <th>Nama Pelanggan</th>
                                <th> Plat Nomor </th>
                                <th>Paket Yang Dipilih</th>
                                <th>Harga Paket</th>
                                <th>Download Invoice</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td> {{ $item->created_at }} </td>
                                    <td>{{ $item->noTlp }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td> {{ $item->plat }} </td>
                                    <td>{{ $item->namaPaket }}</td>
                                    <td>Rp.{{ number_format($item->harga, 3, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('printInvoice', $item->id) }}"
                                            class="btn btn-primary">Download
                                            PDF</a>
                                        {{-- <a href="{{ route('hapusT', $item->id) }}" class="btn btn-danger"
                                            onclick="return confirm('Yakin ingin hapus transaksi?')"> Hapus </a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </p>
                    {{-- <p>Total Data : {{ $data->total() }}</p> --}}
                    {{-- {{ $data->links() }} --}}
                </div>
            </div>

        </div>

    </div>
    @include('template.footer')
    <script>
        new DataTable('#data', {
            responsive: true
        });
    </script>
</body>

</html>
