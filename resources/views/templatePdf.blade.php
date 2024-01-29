<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> REPORTS </title>

    <style>
        table {
            width: 95%;
            border-collapse: collapse;
            margin: 50px auto;
        }

        /* Zebra striping */
        tr:nth-of-type(odd) {
            background: #eee;
        }

        th {
            background: #3498db;
            color: white;
            font-weight: bold;
        }

        td,
        th {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 18px;
        }
    </style>

</head>

<body>

    <div style="width: 95%; margin: 0 auto;">
        <div style="width: 50%; float: left;">
            <h1>REPORTS</h1>
        </div>
    </div>

    <table style="position: relative; top: 50px;">
        <thead>
            <tr>
                <th> Tanggal Pembelian </th>
                <th> No Telepon </th>
                <th> Nama Pelanggan </th>
                <th> Pilihan Paket </th>
                <th> Harga Paket </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td data-column="Last Name">{{ $item->created_at }}</td>
                    <td data-column="Last Name">{{ $item->noTlp }}</td>
                    <td data-column="First Name">{{ $item->nama }}</td>
                    <td data-column="Last Name">{{ $item->namaPaket }}</td>
                    <td data-column="Last Name">{{ number_format($item->harga, 3, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
