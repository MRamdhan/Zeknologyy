<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Keranjang</title>
</head>
<body>
    @include('template.nav')
    <div class="container mt-5">
        <h3> Keranjang </h3>
        <hr>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @forelse ($detailtransaksi as $item)
        <div class="card mt-3">
            <div class="row">

                <div class="col-2 p-2">
                    <img src="{{ asset('storage/' . $item->produk->foto) }}" class="img-thumbnail " style="width: 200px">
                </div>

                <div class="col-8">
                    <div class="card-body">
                        <h3 class="card-title">{{ $item->produk->nama }}</h3>
                        <hr>
                        <p class="card-text">Harga Rp.{{ number_format($item->produk->harga,0,',','.')}}</p>
                        <input type="number" name="banyak" id="" class="form-control" value="{{ $item->qty }}" required>
                        <hr>
                        <p class="card-text">Total Rp.{{ number_format($item->totalharga,0,',','.')}}</p>
                    </div>
                </div>

                <div class="col-2 p-5">
                    <a href="{{ route('bayar', $item->id) }}" class="btn btn-info"> Bayar </a>
                </div>
            </div>
        </div>
        @empty
        <h5 class="inline-item" style="text-align: center"> Tidak ada data </h5>
        @endforelse
    </div>
</body>
</html>