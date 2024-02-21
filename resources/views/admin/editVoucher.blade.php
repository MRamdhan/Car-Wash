<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Edit</title>
    <style>
        body {
            background-color: #F0F3F8;
        }
    </style>
</head>

<body>
    <div class="container mt-5 col-6 pb-5">
        <div class="mx-auto">
            <form action="{{ route('postEditVoucher', $voucher->id) }}" method="POST" class="form-group">
                @csrf
                <div class="card p-4 text-black">
                    <h2> Edit Voucher</h2>
                    <hr>
                    <div class="mb-3">
                        <label>Kode</label>
                        <input type="text" name="kode" class="form-control" value="{{ $voucher->kode }}">
                    </div>
                    <div class="mb-3">
                        <label>Diskon</label>
                        <input type="text" name="diskon" class="form-control"
                            value="{{$voucher->diskon }}">
                    </div>
                    <div class="mb-3">
                        <label>Kedaluwarsa</label>
                        <input type="date" name="kedaluwarsa" class="form-control" value="{{ $voucher->kedaluwarsa }}">
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('homeAdmin') }}" class="btn btn-dark">Kembali</a>
                        <button class="btn" style="background-color: #25364F; color: white">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
@include('template.footer')

</html>
