<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Pesanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container py-5">
    <div class="card shadow-lg">
      <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Tambah Pesanan</h4>
      </div>
      <div class="card-body">

        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('pesanan.store') }}" method="POST">
          @csrf
          <div class="row g-3">

            <div class="col-md-6">
              <label for="pelanggan" class="form-label">Nama Pelanggan</label>
              <select id="pelanggan" name="pelanggan_id" class="form-select" required>
                <option value="">-- Pilih Pelanggan --</option>
                @foreach($pelanggans as $p)
                  <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <label for="kategori" class="form-label">Kategori</label>
              <select id="kategori" name="kategori_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $k)
                  <option value="{{ $k->id }}">{{ $k->nama }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <label for="paket" class="form-label">Paket</label>
              <select id="paket" name="paket" class="form-select" required>
                <option value="">-- Pilih Paket --</option>
                <option value="Reguler">Reguler</option>
                <option value="Express">Express</option>
                <option value="Kilat">Kilat</option>
              </select>
            </div>

            <div class="col-md-6">
              <label for="jumlah" class="form-label">Jumlah</label>
              <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Masukkan jumlah item" required>
            </div>

            <div class="col-md-6">
              <label for="berat" class="form-label">Berat (kg)</label>
              <input type="number" step="0.1" id="berat" name="berat" class="form-control" placeholder="Masukkan berat" required>
            </div>

            <div class="col-md-6">
              <label for="penjemputan" class="form-label">Penjemputan</label>
              <select id="penjemputan" name="penjemputan" class="form-select">
                <option value="Tidak">Tidak</option>
                <option value="Ya">Ya</option>
              </select>
            </div>

            <div class="col-md-6">
              <label for="pengiriman" class="form-label">Pengiriman</label>
              <select id="pengiriman" name="pengiriman" class="form-select">
                <option value="Tidak">Tidak</option>
                <option value="Ya">Ya</option>
              </select>
            </div>

            <div class="col-md-12">
              <label for="catatan" class="form-label">Catatan</label>
              <textarea id="catatan" name="catatan" class="form-control" rows="3" placeholder="Masukkan catatan tambahan (opsional)"></textarea>
            </div>

          </div>
          <div class="text-end mt-4">
            <button type="submit" class="btn btn-success px-4">Simpan</button>
          </div>
        </form>

      </div>
    </div>
  </div>

</body>
</html>
