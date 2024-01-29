<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container mt-5 col-6 pb-5">
        <div class="mx-auto">
            <form action="{{ route('postpilih') }}" method="POST" class="form-group">
                @csrf
                <div class="card p-4 text-black">
                    <h2> FORMULIR PEMBAYARAN </h2>
                    <hr>
                    <div class="mb-3">
                        <h5>No.Tlp </h5>
                        <input type="number" name="noTlp" class="form-control">
                    </div>
                    <div class="mb-3">
                        <h5>Nama</h5>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="mb-3">
                        <h5>Paket</h5>
                        <input type="text" readonly class="form-control mt-1" name="namaPaket"
                            value="{{ $paket->paket }}">
                    </div>
                    <div class="mb-3">
                        <h5>Harga</h5>
                        <input type="text" readonly class="form-control mt-1" name="harga" id="harga"
                            value="{{ number_format($paket->harga, 0, ',', '.') }}">
                    </div>
                    <div class="mb-3">
                        <h5> Input Pembayaran </h5>
                        <input type="text" class="form-control mt-1" required id="nominal"
                            oninput="hitungPengurangan()" name="nominal">
                    </div>
                    <div class="mb-3">
                        <h5> Kembalian</h5>
                        <input type="text" class="form-control mt-1" required readonly id="kembalian"
                            name="kembalian">
                    </div>
                    <div class="mt-3">
                        <a href="/homeKasir" class="btn btn-dark mt-3">Kembali</a>
                        <button type="submit" class="btn btn-primary mt-3">Bayar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function hitungPengurangan() {
            var harga = parseFloat(document.getElementById('harga').value);
            var nominal = parseFloat(document.getElementById('nominal').value);

            var kembalian = nominal - harga;

            document.getElementById('kembalian').value = kembalian;
        }
    </script>
</body>

</html>
