 @extends('main')
 @section('content')
     <br>
     <br>
     <form action="{{ route('action-bagi') }}" method="post">
         @csrf
         <label for="">Angka 1</label>
         <input type="number" placeholder="Masukkan Angka" name="angka_1">
         <br>
         ÷
         <br>

         <label for="">Angka 2</label>
         <input type="number" placeholder="Masukkan Angka" name="angka_2">

         <br>
         <br>
         <button type="submit">Tambah</button>
     </form>
     <h1>Jumlah : {{ $jumlah }}</h1>

     </body>

     </html>
 @endsection
