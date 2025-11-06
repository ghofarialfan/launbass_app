<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PesananController extends Controller
{
    public function create()
    {
        // Sesuaikan dengan penamaan tabel di migrasi (singular)
        $pelanggans = Schema::hasTable('pelanggan')
            ? DB::table('pelanggan')->get()
            : collect();

        $kategoris = Schema::hasTable('kategori')
            ? DB::table('kategori')->get()
            : collect();

        return view('tambahpesanan', compact('pelanggans', 'kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // Sesuaikan rules exists dengan nama tabel singular
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'kategori_id' => 'required|exists:kategori,id',
            'paket' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'berat' => 'required|numeric|min:0.1',
        ]);

        // Simpan ke tabel sesuai penamaan singular
        DB::table('pesanan')->insert([
            'pelanggan_id' => $request->pelanggan_id,
            'kategori_id' => $request->kategori_id,
            'paket' => $request->paket,
            'jumlah' => $request->jumlah,
            'berat' => $request->berat,
            'penjemputan' => $request->penjemputan ?? 'Tidak',
            'pengiriman' => $request->pengiriman ?? 'Tidak',
            'catatan' => $request->catatan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Pesanan berhasil ditambahkan!');
    }
}
