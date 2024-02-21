<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Log Aktivitas</title>
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap5.min.css') }}">

    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="card p-4 text-black rounded-4">
            <h1> Semua Aktivitas User </h1>
            <hr>
            <table id="data" class="table table-striped nowrap">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Nama </th>
                        <th> Aktivitas </th>
                        <th> Created_at </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($log as $item)
                        <tr>
                            <td> {{ $loop->index + 1 }} </td>
                            <td> {{ $item->user->name }} </td>
                            <td> {{ $item->activity }} </td>
                            <td> {{ $item->created_at }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mb-2">
            <a href="{{ route('homeOwner') }}" class="btn btn-dark"> Back </a>
            </div>
        </div>
    </div>

    <script>
        new DataTable('#data', {
            responsive: true,
        });
</script>
</body>
@include('template.footer')

</html>
