<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Login</title>
    <style>
        .card{
            margin-top: 100px;
            box-shadow: 0 4px 8px black;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="container mt-5 col-5">
        <form action="{{ route('postlogin') }}" method="POST" class="form-gorup">
            @csrf
            <div class="card p-4 border-2 text-black rounded-4">
                <h1 style="text-align: center"> MOBIL TANPA NODA </h1>
                <h3 class="mt-4"> Login </h3>
                @if (session('message'))
                    <div class="alert alert-dark">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="mt-3">
                    <button class="btn btn-dark"> Login </button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
