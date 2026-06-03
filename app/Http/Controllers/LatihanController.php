<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function index()
    {
        // laravel index : akan diload di awal
        return view('latihan');
    }
    public function tambah()
    {
        $jumlah = 0;
        $title = 'Tambah';
        return view('tambah', compact('jumlah', 'title'));
    }

    public function actionTambah(request $request)
    {
        $angka1 = $request->angka_1;
        $angka2 = $request->input('angka_2');

        $jumlah = $angka1 + $angka2;
        return view('tambah', compact('jumlah'));
    }

    public function kurang()
    {
        $jumlahkurang = 0;
        $title = 'Kurang';
        return view('kurang', compact('jumlahkurang', 'title'));
    }

    public function actionKurang(request $request)
    {
        $angka1 = $request->angka_1;
        $angka2 = $request->input('angka_2');

        $jumlahkurang = $angka1 + $angka2;
        return view('kurang', compact('jumlahkurang'));
    }
    public function kali()
    {
        $jumlahKali = 0;
        $title = 'Kali';
        return view('kali', compact('jumlahKali', 'title'));
    }
    public function actionKali(request $request)
    {
        $angka1 = $request->angka_1;
        $angka2 = $request->input('angka_2');

        $jumlahKali = $angka1 * $angka2;
        return view('kali', compact('jumlahKali'));
    }
    public function bagi()
    {
        $jumlah = 0;
        $title = 'Bagi';
        return view('bagi', compact('jumlah', 'title'));
    }
    public function actionBagi(request $request)
    {
        $angka1 = $request->angka_1;
        $angka2 = $request->input('angka_2');

        $jumlah = $angka1 / $angka2;
        return view('bagi', compact('jumlah'));
    }
}
