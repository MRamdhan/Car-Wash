<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Kasir</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <form action="{{ route('postTambahKasir') }}" method="POST" class="form-group">
            @csrf
            <div class="card p-4 rounded-4">
                <h2> Tambah Kasir </h2>
                <div class="mb-3">
                    <h5 for="email"> Email </h5>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <h5 for="name"> Name </h5>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <h5 for="password"> Password </h5>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mt-3">
                    <h5 for="role"> Role </h5>
                    <input type="text" class="form-control" name="role" value="kasir" readonly>
                </div>
                <div class="mt-3">
                    <a href="/homeAdmin" class="btn btn-dark"> Back </a>
                    <button class="btn btn-success" type="submit"> Tambah </button>
                </div>
            </div>
        </form>
    </div>
    <div class="container mt-5">
        <div class="card mx-auto p-4 col-10">
            <h3> Keterangan </h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Name</td>
                        <td>Role</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td> {{ $loop->index + 1 }} </td>
                            <td> {{ $item->name }} </td>
                            <td> {{ $item->role }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>