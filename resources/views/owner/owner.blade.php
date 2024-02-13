<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Report</title>
    <style>
        span {
            display: none;
        }
    </style>
</head>

<body>
    @include('template.nav')
    <div class="container mt-5">
        <div class="card p-4">
            <h1 class="text-center"> Home Owner </h1>
            <hr>
            @if (session('message'))
                <div class="alert alert-dark">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row">
                <div class="mt-3">
                    <h4>Total Pendapatan Rp.{{ number_format($totalPendapatan, 2, ',', '.') }}</h4>
                </div>
                <div class="col-12">
                    {!! $chart->container() !!}
                </div>
                <form action="{{ route('searchDateOwner') }}" method="GET" class="mb-3 col-6">
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
                <form action="{{ route('exportOwnerPdf') }}" method="GET" class="mb-3 col-6">
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
                    <div class="d-flex">
                        <h2 class="col-11"> Laporan </h2>
                        <a href="{{ route('homeOwner') }}" class="btn btn-dark"> Refresh </a>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4 mt-4">
                            <form action="{{ route('searchOwner') }}" method="GET" class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Cari berdasarkan no Telepon"
                                        name="keyword" required>
                                    <button class="btn btn-secondary" type="submit">Cari</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-4 mt-4">
                            <a href="{{ route('logOwner') }}" class="btn btn-warning"> Lihat Log </a>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered mt-3 mb-5">
                <thead>
                    <tr>
                        <th>Tanggal Pembelian</th>
                        <th>No Telepon</th>
                        <th>Nama Pelanggan</th>
                        <th>Paket Yang Dipilih</th>
                        <th>Harga Paket</th>
                        <th>Download Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $item)
                        <tr>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->noTlp }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->namaPaket }}</td>
                            <td>Rp.{{ number_format($item->harga, 3, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('printInvoice', $item->id) }}" class="btn btn-primary">Download
                                    PDF</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan=""> Total Data : <b style="color: red"> {{ $transaksi->total() }} </b> </td>
                    </tr>
                </tfoot>
            </table>
            {{ $transaksi->links() }}
        </div>

    </div>

    @include('template.footer')
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
</body>

</html>
