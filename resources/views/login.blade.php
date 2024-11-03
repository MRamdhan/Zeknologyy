<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card p-4">
                    <form action="{{ route('postlogin') }}" method="POST">
                        @csrf
                        <h1>Login</h1>
                        <hr>
                        @if (session('message'))
                            <div class="alert alert-danger">
                                {{ session('message') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="username"> Username </label>
                            <input type="text" name="username" id="username" placeholder="Masukan Username" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password"> Password </label>
                            <input type="password" name="password" id="password" placeholder="Masukan password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password"> Belum memiliki akun? <span>
                                <a href="{{ route('daftar') }}" style="text-decoration: none"> Daftar </a>
                            </span> </label> 
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-success"> Login </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>