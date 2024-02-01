<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h3> Activity </h3>
        <table class="table table-bordered mt-3 mb-5">
            <thead>
                <tr>
                    <th> No </th>
                    <th> Nama user </th>
                    <th> Activty </th>
                    <th> Tanggal </th>
                </tr>
            </thead>
            @foreach ($log as $item)
            <tbody>
                <td> {{ $loop->index + 1 }} </td>
                <td> {{ $item->user->name }} </td>
                <td> {{ $item->activity}}</td>
                <td> {{ $item->created_at }} </td>
            </tbody>
            @endforeach
        </table>
        <a href="{{ route('homeOwner') }}" class="btn btn-dark"> Back </a>
    </div>
</body>
</html>