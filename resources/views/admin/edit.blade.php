<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Edit</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card p-4">
                    <h1> Edit Produk </h1>
                    <hr>
                    <form action="{{ route('postedit', $produk->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="mb-3">
                            <label for="nama"> Nama produk </label>
                            <input type="text" class="form-control" name="nama" value="{{ $produk->nama }}">
                        </div>
                        <div class="mb-3">
                            <label for="harga"> Harga produk </label>
                            <input type="text" class="form-control" name="harga" value="{{ $produk->harga }}">
                        </div>
                        <div class="mb-3">
                            <label for="foto"> Foto produk </label>
                            <input type="file" class="form-control" name="foto">
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
                            <button class="btn btn-success"> Edit </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>