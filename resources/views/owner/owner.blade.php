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
        span {
            display: none;
        }
        body {
            background-color: #F0F3F8;
        }
    </style>
</head>

<body>
    @include('template.nav')
    <div class="container mt-5">
        <div class="card p-4">
            <h1 class="text-center mt-5"> Home Owner </h1>
            <hr>
            @if (session('message'))
                <div class="alert alert-dark">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row">
                <div class="mt-3">
                    <h4>Total Pendapatan Rp {{ number_format($totalPendapatan, 3, '.', '.') }}</h4>
                </div>
                <div class="col-12">
                    {!! $chart->container() !!}
                </div>
                <form action="{{ route('searchDateOwner') }}" method="GET" class="mb-3 col-6 mt-3">
                    <div class="card p-4 text-black rounded-4">
                        <h2>Form Pencarian</h2>
                        <hr>
                        <label for="">Tanggal Awal</label>
                        <input type="date" class="form-control" name="start_date" placeholder="Start Date" required>
                        <label for="">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="end_date" placeholder="End Date" required>
                        <div class="col mt-3">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
                <form action="{{ route('exportOwnerPdf') }}" method="GET" class="mb-3 col-6 mt-3">
                    <div class="card p-4 rounded-4 text-black">
                        <h2>Form Download PDF</h2>
                        <hr>
                        <label for="">Tanggal Awal</label>
                        <input type="date" class="form-control" name="start_date" placeholder="Start Date" required>
                        <label for="">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="end_date" placeholder="End Date" required>
                        <div class="col mt-3">
                            <button type="submit" class="btn btn-success">Buat PDF</button>
                        </div>
                    </div>
                </form>
                <div class="container p-4">
                    <h2 class="col-10"> Laporan </h2>
                    <hr>
                    <a href="{{ route('logOwner') }}" class="btn btn-warning"> Lihat Log </a>
                    <a href="{{ route('homeOwner') }}" class="btn btn-dark"> Refresh </a>
                </div>
            </div>
            <table id="data" class="table table-striped nowrap">
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
                                <a href="{{ route('printInvoiceOwner', $item->id) }}"
                                    class="btn btn-primary">Download
                                    PDF</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    @include('template.footer')
    <script src="{{ $chart->cdn() }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new DataTable('#data', {
                responsive: true
            });
        });
    </script>
    {{ $chart->script() }}
</body>

</html>
