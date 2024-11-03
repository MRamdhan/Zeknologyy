<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Home</title>
</head>
<body>
    @include('template.nav')
    <img src="img/banner.png" alt="Banner" style="width: 100%;">
    <div class="container mt-5">
        <section>
            <h1>Kategori</h1>
            <hr>
            <div class="row text-center">
                <div class="col-3">
                    <a href="{{ route('home', ['kategori' => '1']) }}">
                        <div class="card category-card">
                            <img src="img/aksesoris.png" alt="Aksesoris" style="width: 100%; max-width: 150px;">
                        </div>
                        <div class="category-title" style="direction: none">Aksesoris</div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="{{ route('home', ['kategori' => '2']) }}">
                        <div class="card category-card">
                            <img src="img/cassing.png" alt="Cassing" style="width: 100%; max-width: 150px;">
                        </div>
                        <div class="category-title">Cassing</div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="{{ route('home', ['kategori' => '3']) }}">
                        <div class="card category-card">
                            <img src="img/hp.png" alt="HP" style="width: 100%; max-width: 150px;">
                        </div>
                        <div class="category-title">HP</div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="{{ route('home', ['kategori' => '4']) }}">
                        <div class="card category-card">
                            <img src="img/laptop.png" alt="Laptop" style="width: 100%; max-width: 150px;">
                        </div>
                        <div class="category-title">Laptop</div>
                    </a>
                </div>
            </div>
        </section>
        <section class="mt-5">
            <h1>{{ $kategori ? ucfirst($kategori) : 'produk' }}</h1>
            <hr>
            <div class="row">
                @forelse ($produk as $item)
                <div class="col-3 mb-4">
                    <div class="card h-100">
                        <div class="card-header p-0">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="Product Image" style="width: 100%; height: auto;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <p class="card-text">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                            <a href="{{ route('detail', $item->id) }}" class="btn btn-primary">Beli</a>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center">No products found for this category.</p>
                @endforelse
            </div>
        </section>

    </div>

    <!-- Footer -->
    @include('template.footer')
</body>
</html>
