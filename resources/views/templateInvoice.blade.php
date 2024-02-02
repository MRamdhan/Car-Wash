<!DOCTYPE html>

<head>
    <title>Invoice</title>
</head>
<style>
    .invoice-card {
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 400px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .invoice-header {
        text-align: center;
        margin-bottom: 20px;
    }
</style>

<body>
    <div class="invoice-container">
        <div class="invoice-card">
            <h3 style="text-align: center"> Invoice </h3>
            <hr>
            <div class="invoice-details">
                <h5>Nama: {{ $invoice->nama }}</h5>
                <h5>Paket: {{ $invoice->namaPaket }}</h5>
                <h5>Harga: {{ number_format($invoice->harga, 3,',','.') }}</h5>
                <h5>No.Tlp: {{ $invoice->noTlp }}</h5>
                <h3 style="text-align: right">{{ $invoice->created_at }}</h3>
            </div>
        </div>
    </div>
</body>

</html>
