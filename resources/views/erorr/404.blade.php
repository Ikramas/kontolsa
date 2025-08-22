<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>404 - Halaman Tidak Ditemukan</title>
  <link rel="icon" href="{{ asset('assets/uploads/Setting/1451727254638.png') }}" type="image/png">
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <style>
    :root{--text:#1b1c17;--muted:#6b7280;--primary:#cdef84}
    body{font-family:"Inter",system-ui,-apple-system,Segoe UI,Roboto,"Helvetica Neue",Arial;background:#fafafa;color:var(--text)}
    .card{border:none;border-radius:16px;box-shadow:0 8px 24px rgba(0,0,0,.06)}
    .btn-primary{background:var(--primary);border-color:var(--primary);color:#0f172a}
    .btn-primary:hover{filter:brightness(0.95)}
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        <div class="card p-4 p-md-5 text-center">
          <img src="{{ asset('assets/uploads/Setting/6281729670913.png') }}" alt="Kadin" class="img-fluid mb-3" style="max-height:42px">
          <h1 class="fw-bold mb-2">404</h1>
          <p class="text-muted mb-4">Halaman yang Anda cari tidak ditemukan atau sudah dipindahkan.</p>

          @auth
            @can('access-admin-panel')
              <a href="{{ route('admin.dashboard') }}" class="btn btn-primary me-2">Kembali ke Dashboard Admin</a>
            @else
              <a href="{{ route('home') }}" class="btn btn-primary me-2">Kembali ke Beranda</a>
            @endcan
          @else
            <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
          @endauth

          <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mt-3">Kembali ke halaman sebelumnya</a>

          @if(app()->hasDebugModeEnabled() && config('app.debug'))
            <div class="text-start small text-muted mt-4">
              <strong>Debug:</strong>
              <div>URL: {{ request()->fullUrl() }}</div>
              <div>Method: {{ request()->method() }}</div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
