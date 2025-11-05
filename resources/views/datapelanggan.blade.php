@extends('main')
@section('title', 'Daftar')

@section('content')

    <h4 class="mb-3 fw-normal">Profil Tersimpan</h4>

    <div class="profile-card">

    @foreach ($pelanggan as $data)
    <div class="profile-item">
        <i class="bi bi-person-circle profile-icon"></i>
        <div class="profile-details">
            <h5 class="mb-0">{{ $data->nama }}</h5>
            <p class="text-muted">{{ $data->alamat }}</p>
            <p class="text-muted">Telepon: {{ $data->telepon }}</p>

            <div class="profile-actions">
                <a href="#" class="action-ubah">Ubah</a>
                <a href="#" class="action-nonaktif">
                    {{ $data->aktif ? 'Non-Aktif' : 'Aktifkan' }}
                </a>
            </div>
        </div>
    </div>
    @endforeach

    </div> <div class="d-grid gap-2 mt-4">
        <button class="btn btn-primary btn-lg btn-tambah" type="button">Tambah Profil</button>
    </div>
    <div style="padding-bottom: 50px;"></div> @endsection
