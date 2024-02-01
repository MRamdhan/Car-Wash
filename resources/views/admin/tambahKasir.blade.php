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
                    <label for="email"> Email </label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label for="name"> Name </label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label for="password"> Password </label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mt-3">
                    <a href="/admin.homeAdmin" class="btn btn-dark"> Back </a>
                    <button class="btn btn-success" type="submit"> Tambah </button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>