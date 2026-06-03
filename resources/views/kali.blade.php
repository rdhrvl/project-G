 @extends('main')
 @section('content')
     <br>
     <br>
     <form action="{{ route('action-kali') }}" method="post">
         @csrf
         <label for="">Angka 1</label>
         <input type="number" placeholder="Masukkan Angka" name="angka_1">
         <br>
         x
         <br>

         <label for="">Angka 2</label>
         <input type="number" placeholder="Masukkan Angka" name="angka_2">

         <br>
         <br>
         <button type="submit">Tambah</button>
     </form>
     <h1>Jumlah : {{ $jumlahKali }}</h1>
 @endsection
