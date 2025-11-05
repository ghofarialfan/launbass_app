<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        // Kode ini sekarang sudah pasti berfungsi mengambil data.
        $daftarPelanggan = Pelanggan::all();

        // KODE HANYA BOLEH MENGANDUNG RETURN VIEW
        return view('datapelanggan', [
            'pelanggan' => $daftarPelanggan
        ]);
    }
}
