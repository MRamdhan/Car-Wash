<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Bayar</title>
    <style>
        body {
            background-color: #F0F3F8;
        }
        .card{
            box-shadow: 0 4px 8px black;
        }
    </style>
</head>

<body>
    <div class="container mt-5 col-6 pb-5">
        <div class="mx-auto">
            <form action="{{ route('postpilih') }}" method="POST" class="form-group" onsubmit="return validate()">
                @csrf
                <div class="card p-4 text-black">
                    <h2> FORMULIR PEMBAYARAN </h2>
                    @if (session('message'))
                        <div class="alert alert-dark">
                            {{ session('message') }}
                        </div>
                    @endif
                    <hr>
                    <div class="mb-3">
                        <h5>No.Tlp</h5>
                        <input type="number" name="noTlp" class="form-control">
                    </div>
                    <div class="mb-3">
                        <h5>Nama</h5>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="mb-3">
                        <h5>Plat Nomor</h5>
                        <input type="text" name="plat" class="form-control">
                    </div>
                    <div class="mb-3">
                        <h5>Paket</h5>
                        <input type="text" readonly class="form-control mt-1" name="namaPaket"
                            value="{{ $produk->paket }}">
                    </div>
                    <div class="mb-3">
                        <h5>Harga</h5>
                        <input type="text" readonly class="form-control mt-1" id="hargaSetelahDiskon"
                            value="{{ number_format($produk->harga, 0, ',', '.') }}">
                    </div>
                    <div class="mb-3">
                        <h5>Input Diskon</h5>
                        <input type="hidden" id="id_voucher" name="id_voucher">
                        <select name="kode_voucher" id="kode_voucher" class="form-control" onchange="updateHarga()">
                            <option value="0">Tanpa Voucher</option>
                            @foreach ($voucher as $item)
                                <option value="{{ $item->id }}">{{ $item->kode }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <h5>Input Pembayaran</h5>
                        <input type="number" class="form-control mt-1" required id="nominal"
                            oninput="hitungPengurangan()" name="nominal">
                    </div>
                    <div class="mb-3">
                        <h5>Kembalian</h5>
                        <input type="text" class="form-control mt-1" required readonly id="kembalian"
                            name="kembalian">
                    </div>
                    <div class="mt-3">
                        <a href="/homeKasir" class="btn btn-dark mt-3">Kembali</a>
                        <button type="submit" class="btn mt-3" style="background-color: #25364F; color: white">Bayar</button>
                    </div>
                    
                    <div class="mb-3">
                        <input type="text" readonly class="form-control mt-1" id="hargaAwal" name="harga"
                            value="{{ number_format($produk->harga, 0, ',', '.') }}" hidden>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function updateHarga() {
            var hargaAwal = parseFloat(document.getElementById('hargaAwal').value);
            var diskon = 0;

            var kode_voucher = document.getElementById('kode_voucher');
            var id_voucher = document.getElementById('id_voucher');
            var voucherId = kode_voucher.value;

            id_voucher.value = voucherId;

            if (voucherId != 0) {
                var voucher = {!! json_encode($voucher) !!}.find(voucher => voucher.id == voucherId);
                diskon = (voucher.diskon / 100) * hargaAwal;
            }

            var hargaSetelahDiskon = hargaAwal - diskon;
            document.getElementById('hargaSetelahDiskon').value = parseFloat(hargaSetelahDiskon);
            // document.getElementById('hargaSetelahDiskon').value();
        }


        function hitungPengurangan() {
            var hargaSetelahDiskon = parseFloat(document.getElementById('hargaSetelahDiskon').value);
            var nominal = parseFloat(document.getElementById('nominal').value);

            var kembalian = nominal - hargaSetelahDiskon;

            // document.getElementById('kembalian').value = parseFloat(kembalian);
            document.getElementById('kembalian').value = kembalian.toFixed(3);
        }

        function validate() {
            var hargaSetelahDiskon = parseFloat(document.getElementById('hargaSetelahDiskon').value);
            var nominal = parseFloat(document.getElementById('nominal').value);

            if (nominal < hargaSetelahDiskon) {
                alert("Mohon periksa kembali nominalnya");
                return false;
            }
            return true;
        }
    </script>

@include('template.footer')
</body>

</html>
