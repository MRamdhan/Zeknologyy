<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>Home</title>
    <style>
        body{
            background-color: #f5f3f3;
            font-family: "Bebas Neue", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('template.nav')

    <!-- Banner -->
    <img src="img/banner.png" alt="Banner" style="width: 100%;">

    <!-- Main Container -->
    <div class="container mt-5">

        <!-- Categories Section -->
        <section>
            <h1>Kategori</h1>
            <hr>
            <div class="row text-center" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                <div class="col-3">
                    <a href="{{ route('home', ['kategori' => '1']) }}" style="text-decoration:none; color: black">
                        <div class="card category-card p-3">
                            <img src="img/aksesoris.png" alt="Aksesoris" style="width: 100%; max-width: 150px;">
                        <div class="category-title" style="text-decoration:none" >Aksesoris</div>                            
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="{{ route('home', ['kategori' => '2']) }}" style="text-decoration:none; color: black">
                        <div class="card category-card p-3">
                            <img src="img/cassing.png" alt="Cassing" style="width: 100%; max-width: 150px;">
                            <div class="category-title" style="text-decoration:none">Cassing</div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="{{ route('home', ['kategori' => '3']) }}" style="text-decoration:none; color: black">
                        <div class="card category-card p-3">
                            <img src="img/hp.png" alt="HP" style="width: 100%; max-width: 150px;">
                            <div class="category-title" style="text-decoration:none">HP</div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="{{ route('home', ['kategori' => '4']) }}" style="text-decoration:none; color: black">
                        <div class="card category-card p-3">
                            <img src="img/laptop.png" alt="Laptop" style="width: 100%; max-width: 150px;">
                            <div class="category-title">Laptop</div>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- Products Section -->
        <section class="mt-5">
            <h1>{{ $kategori ? ucfirst($kategori) : 'Produk' }}</h1>
            <hr>
            <div class="row">
                @forelse ($produk as $item)
                <div class="col-3 mb-4">
                    <div class="card h-100" data-aos="fade-right">
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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
