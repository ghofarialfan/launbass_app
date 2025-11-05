<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Keuangan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root{ --brand:#133F47; --bg:#ECF6F6; }
    body{ background:var(--bg); }
    .btn-pill{ border-radius: 999px; padding:.9rem 1.25rem; font-weight:600; }
    .amount-pos{ color:#0f9d58; font-weight:600; }
    .amount-neg{ color:#d93025; font-weight:600; }
    .card-list{ border-radius: 14px; }
    .mini-badge{ font-size:.7rem; }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
  </head>
<body>
  <!-- Top bar -->
  <nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
      <span class="navbar-brand fw-semibold">Keuangan</span>
      <div class="ms-auto d-none d-lg-flex gap-2">
        <a class="btn btn-outline-secondary btn-sm" href="/">Home</a>
      </div>
    </div>
  </nav>

  <main class="container py-4">
    <!-- Actions -->
    <div class="row g-3 align-items-stretch">
      <div class="col-12 col-md-6 col-lg-4">
        <a class="btn btn-dark w-100 btn-pill" style="background:var(--brand)" href="#">
          <i class="bi bi-graph-up"></i> Grafik Keuangan
        </a>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <a class="btn btn-dark w-100 btn-pill" style="background:var(--brand)" href="#">
          <i class="bi bi-cash-coin"></i> Aliran Kas
        </a>
      </div>
    </div>

    <!-- History -->
    <div class="row mt-4">
      <div class="col-12 col-lg-10 col-xl-8">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <h5 class="mb-0 fw-semibold">Riwayat Keuangan</h5>
          <div>
            <select class="form-select form-select-sm w-auto d-inline-block">
              <option selected>Filter</option>
              <option>Semua</option>
              <option>Pemasukan</option>
              <option>Pengeluaran</option>
            </select>
          </div>
        </div>

        <div class="vstack gap-3">
          <!-- Item -->
          <div class="card card-list shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-start">
              <div>
                <div class="small text-secondary">ORD1443</div>
                <div class="amount-pos">Rp 50.000</div>
              </div>
              <div class="text-end">
                <div class="text-muted mini-badge mb-2">18/06/2025</div>
                <a href="#" class="btn btn-sm btn-dark"><i class="bi bi-eye"></i> Detail</a>
              </div>
            </div>
          </div>

          <div class="card card-list shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-start">
              <div>
                <div class="small text-secondary">ORD1442</div>
                <div class="amount-pos">Rp 30.000</div>
              </div>
              <div class="text-end">
                <div class="text-muted mini-badge mb-2">18/06/2025</div>
                <a href="#" class="btn btn-sm btn-dark">Detail</a>
              </div>
            </div>
          </div>

          <div class="card card-list shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-start">
              <div>
                <div class="small text-secondary">SPD102</div>
                <div class="amount-neg">Rp 200.000</div>
              </div>
              <div class="text-end">
                <div class="text-muted mini-badge mb-2">18/06/2025</div>
                <a href="#" class="btn btn-sm btn-dark">Detail</a>
              </div>
            </div>
          </div>

          <div class="card card-list shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-start">
              <div>
                <div class="small text-secondary">ORD1441</div>
                <div class="amount-pos">Rp 70.000</div>
              </div>
              <div class="text-end">
                <div class="text-muted mini-badge mb-2">18/06/2025</div>
                <a href="#" class="btn btn-sm btn-dark">Detail</a>
              </div>
            </div>
          </div>

          <div class="card card-list shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-start">
              <div>
                <div class="small text-secondary">ORD1440</div>
                <div class="amount-pos">Rp 50.000</div>
              </div>
              <div class="text-end">
                <div class="text-muted mini-badge mb-2">18/06/2025</div>
                <a href="#" class="btn btn-sm btn-dark">Detail</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer / Bottom nav (web) -->
  <footer class="border-top py-3 bg-white mt-4">
    <div class="container d-flex justify-content-between small text-muted">
      <span>&copy; LaundBASS</span>
      <div class="d-flex gap-3">
        <a class="text-decoration-none" href="#"><i class="bi bi-house"></i></a>
        <a class="text-decoration-none" href="#"><i class="bi bi-basket"></i></a>
        <a class="text-decoration-none" href="#"><i class="bi bi-bar-chart"></i></a>
        <a class="text-decoration-none" href="#"><i class="bi bi-person"></i></a>
      </div>
    </div>
  </footer>
</body>
</html>