<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Report</title>
</head>
<style>
    .card {
        width: 400px;
    }
</style>

<body>
    @include('nav')
    <div class="container mt-3">
        <div class="row">
            <div class="card mx-3 mt-5">
                <form action="{{ route('searchDate') }}" method="GET" class="mb-3">
                    <h2>Form Pencarian</h2>
                    <div class="form">
                        <label for="">Tanggal Awal</label>
                        <input type="date" class="form-control" name="start_date" placeholder="Start Date" required>
                        <label for="">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="end_date" placeholder="End Date" required>
                        <div class="col mt-3">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="card mx-3 mt-5">
                <h2>Form Download PDF</h2>
                <form action="{{ route('exportPdf') }}" method="GET" class="mb-3">
                    <div class="form">
                        <label for="">Tanggal Awal</label>
                        <input type="date" class="form-control" name="start_date" placeholder="Start Date" required>
                        <label for="">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="end_date" placeholder="End Date" required>
                        <div class="col mt-3">
                            <button type="submit" class="btn btn-success">Buat PDF</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-4 mt-5">
            <form action="{{ route('search') }}" method="GET" class="form-group">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari berdasarkan no Telepon" name="keyword">
                        <button class="btn btn-secondary" type="submit">Cari</button>
                </div>
            </form>
        </div>
        <div class="container mt-5">
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
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d H:i:s') }}</td>
                            <td>{{ $item->noTlp }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->namaPaket }}</td>
                            <td>Rp.{{ number_format($item->harga, 3, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('printInvoice', $item->id) }}" class="btn btn-primary">Downlaod
                                    PDF</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
</body>

</html>