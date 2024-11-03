<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap5.min.css') }}">
    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>
    <title>Home Admin</title>
</head>
<body>
    @include('template.nav')
    <div class="container mt-5">
        <h1>Home Admin</h1>
        <a href="{{ route('tambah') }}" class="btn btn-dark mt-2 mb-2"> Tambah </a>
        <a href="{{ route('kategori') }}" class="btn btn-dark mt-2 mb-2"> Tambah Kategori </a>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
            <table id="data" class="table table-striped nowarp mt-5">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Gambar </th>
                        <th> Nama </th>
                        <th> Harga </th>
                        <th> Aksi </th>
                    </tr>
                </thead>
                @foreach ($produk as $item)
                    <tbody>
                        <tr>
                            <td> {{ $loop-> index + 1 }} </td>
                            <td><img src="{{ asset('storage/' . $item->foto) }}" alt="tidak muncul" width="90" height="100"></td>
                            <td> {{ $item->nama }} </td>
                            <td> {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td> 
                                <a href="{{ route('edit',$item->id) }}" class="btn btn-primary"> Edit </a>
                                <a href="{{ route('hapus', $item->id) }}" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus?')"> Hapus </a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
    </div>
    @include('template.footer')

    <script>
        new DataTable('#data', {
            responsive: true,
        });
    </script>
</body>
</html> 