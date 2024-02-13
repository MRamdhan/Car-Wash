<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        span{
            display: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3> Kasir Aktivitas </h3>
        <hr>
        <table class="table table-bordered mt-3 mb-5">
            <thead>
                <tr>
                    <th> Nama user </th>
                    <th> Activty </th>
                    <th> Tanggal </th>
                </tr>
            </thead>
            @foreach ($log as $item)
            <tbody>
                <td> {{ $item->user->name }} </td>
                <td> {{ $item->activity}}</td>
                <td> {{ $item->created_at }} </td>
            </tbody>
            @endforeach
        </table>
        <p> Data Total : {{ $log->total() }} </p>
        {{ $log->links() }}
        <a href="/report" class="btn btn-dark"> Back </a>
    </div>
    @include('template.footer')
</body>
</html>