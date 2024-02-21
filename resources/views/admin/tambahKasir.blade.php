<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah User</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap5.min.css') }}">

    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('responsive.bootstrap5.min.js') }}"></script>
    
    <style>
        body {
            background-color: #F0F3F8;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <form action="{{ route('postTambahUser') }}" method="POST" class="form-group">
            @csrf
            <div class="card p-4 rounded-4">
                @if (session('message'))
                    <div class="alert alert-dark">
                        {{ session('message') }}
                    </div>
                @endif
                <h2> Tambah User </h2>
                <hr>
                <div class="mb-3">
                    <h5 for="username"> Username </h5>
                    <input type="username" class="form-control" name="username">
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
                    <select name="role" id="" class="form-control" required>
                        <option value="kasir">Kasir</option>
                        <option value="owner">Owner</option>
                    </select>
                    {{-- <input type="text" class="form-control" name="role" value="kasir" readonly> --}}
                </div>
                <div class="mt-3">
                    <a href="/homeAdmin" class="btn btn-dark"> Back </a>
                    <button class="btn" type="submit" style="background-color: #25364F; color: white"> Tambah </button>
                </div>
            </div>
        </form>
    </div>
    <div class="container mt-5">
        <div class="card p-4 text-black rounded-4">
            <h3> Keterangan </h3>
            <hr>
            <table class="table table-striped" id="data">
                <thead>
                    <tr>
                        <td>No</td>
                        <td> Username </td>
                        <td>Name</td>
                        <td>Role</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td> {{ $loop->index + 1 }} </td>
                            <td> {{ $item->username }} </td>
                            <td> {{ $item->name }} </td>
                            <td> {{ $item->role }} </td>
                            <td>
                                <a href="{{ route('editUser', $item->id) }}" class="btn btn-primary"> Edit </a>
                                <a href="{{ route('hapusUser', $item->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Yakin ingin hapus?')"> Hapus </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('template.footer')

    <script>
        new DataTable('#data', {
            responsive: true,
        })
    </script>
</body>

</html>
