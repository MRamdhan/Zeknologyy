<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Detail</title>
</head>
<body>
    @include('template.nav')
    <div class="container mt-5">
        <form action="{{ route('postkeranjang', $produk->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <img src="{{asset('storage/' . $produk->foto) }}" class="card-img-top">
                </div>
            </div>
    
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{$produk->nama }}</h3>
                        <p class="card-text">Rp. {{number_format($produk->harga,0,',', '.') }}</p>
                        <input type="number" name="banyak" id="" class="form-control" placeholder="banyak" required>
                        <hr>
                        <h5> Keterangan : </h5>
                        <p>Ini merupakan detail dari barang yang di jual silahkan pelajari dengan seksama. Brang yang sudah di beli</p>
                    </div>
                </div>
            </div>
    
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5> Kategori : {{ $produk->kategori->nama }} </h5>
                        <img src="" alt="" class="card-img-top">
                    </div>
                </div>
                    <button class="btn btn-primary mt-3 form-control" > Beli </button>
            </div>
    
        </div>
    </form>
    </div>

</body>
</html>