<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function create()
    {
        $pelanggans = DB::table('pelanggans')->get();
        $kategoris = DB::table('kategoris')->get();

        return view('tambahpesanan', compact('pelanggans', 'kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'kategori_id' => 'required|exists:kategoris,id',
            'paket' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'berat' => 'required|numeric|min:0.1',
        ]);

        DB::table('pesanans')->insert([
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
