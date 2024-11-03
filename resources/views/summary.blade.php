<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Summary</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    @include('template.nav')
    <div class="container mt-5">
        <h3> Summary </h3>
        <hr>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @forelse ($detailtransaksi as $item)
        <div class="card mt-3">
            <div class="row">
                <div class="col-2 p-4">
                    <img src="{{ asset('storage/' . $item->produk->foto) }}" class="img-thumbnail " style="width: 200px">
                </div>

                <div class="col-10">
                    <div class="card-body">
                        <h3 class="card-title">{{ $item->produk->nama }}</h3>
                        <h5 class="card-title">Invoice : {{$item->transaksi->kode }}</h5>
                        <hr>
                        <p class="card-text">Harga Rp. {{ number_format($item->produk->harga, 0,',','.')}}</p>
                        <p class="card-text">Banyak : {{  $item->qty }}</p>
                        <hr>
                        <p class="card-text"> Total Rp. {{ number_format($item->totalharga, 0,',','.')}}</p>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <h5 class="inline-item" style="text-align: center"> Tidak ada data </h5>
        @endforelse
    </div>
</body>
</html>