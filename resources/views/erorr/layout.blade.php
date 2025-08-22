<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','Error')</title>
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <style>
    body{font-family:"Inter",system-ui,-apple-system,Segoe UI,Roboto,"Helvetica Neue",Arial;background:#fafafa;color:#1b1c17}
    .card{border:none;border-radius:16px;box-shadow:0 8px 24px rgba(0,0,0,.06)}
    .code{font-size:52px;font-weight:800}
    .msg{color:#6b7280}
    .btn-primary{background:#cdef84;border-color:#cdef84;color:#0f172a}
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        <div class="card p-5 text-center">
          <img src="{{ asset('assets/uploads/Setting/6281729670913.png') }}" alt="Kadin" class="img-fluid mb-3" style="max-height:42px">
          <div class="code">@yield('code','Error')</div>
          <h1 class="h5 msg mb-4">@yield('message','Terjadi kesalahan')</h1>
          <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            @yield('action')
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
