<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perhitungan {{ $title ?? '' }}</title>
</head>

<body>
    <h1>Perhitungan {{ $title ?? '' }}</h1>
    <a href="{{ route('tambah') }}">Tambah</a>
    <a href="{{ route('kurang') }}">Kurang</a>
    <a href="{{ route('bagi') }}">Bagi</a>
    <a href="{{ route('kali') }}">Kali</a>
    <a href="{{ route('latihan') }}">Kembali</a>

    <main>
        @yield('content')
    </main>
</body>

</html>
