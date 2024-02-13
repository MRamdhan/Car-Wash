<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Kasir</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <form action="{{ route('postEditUser', $user->id) }}" class="form-group" method="POST">
            @csrf
            <div class="card p-4 rounded-4">
                <h2> Edit User </h2>
                <hr>
                <div class="mb-3">
                    <h5 for="email"> Email </h5>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                </div>
                <div class="mb-3">
                    <h5 for="name"> Name </h5>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>
                <div class="mb-3">
                    <h5 for="password"> Password </h5>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mt-3">
                    <h5 for="role"> Role </h5>
                    <select name="role" id="" class="form-control" required value="{{ $user->name }}">
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
                        <option value="owner">Owner</option>
                    </select>
                    {{-- <input type="text" class="form-control" name="role" value="kasir" readonly> --}}
                </div>
                <div class="mt-3">
                    <a href="{{ route('tambahKasir') }}" class="btn btn-dark"> Back </a>
                    <button class="btn btn-success" type="submit"> Edit </button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>