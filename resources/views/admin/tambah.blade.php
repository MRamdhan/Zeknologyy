<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Tambah</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card p-4">
                    <form action="{{ route('posttambah') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h1> Tambah Produk </h1>
                    <hr>
                    <div class="mb-3">
                        <label for="nama"> Nama produk </label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="harga"> Harga produk </label>
                        <input type="text" class="form-control" name="harga">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Foto</label>
                        <br>
                        <input type="file" name="foto" required class="btn btn-outline-secondary">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Kategori </label>
                        <select name="kategori_id" class="form-control">
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                    </select>
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('homeAdmin') }}" class="btn btn-dark"> Kembali </a>
                        <button class="btn btn-success"> Tambah </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>