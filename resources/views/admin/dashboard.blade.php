<!DOCTYPE html>
<html class="no-js" lang="id">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Admin - Kadin Indonesia</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="icon" href="{{ asset('assets/uploads/Setting/1451727254638.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css?v=1') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css?ver=0') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root{
            --primary-color:#cdef84;--text-black:#1b1c17;--para-color:#707070;--sidebar-text:#e7e3e3;--sidebar-bg:#1b1c17;--sidebar-hover:#cdef84;--white:#fff;--shadow:0 4px 15px rgba(0,0,0,.05)
        }
        body{font-family:"Inter",system-ui,-apple-system,Segoe UI,Roboto,"Helvetica Neue",Arial}
        .card-admin{background:var(--white);border-radius:12px;box-shadow:var(--shadow);padding:20px;text-align:center;height:100%}
        .card-admin h5{font-size:14px;color:var(--para-color);margin-bottom:8px}
        .card-admin p{font-size:32px;font-weight:700;color:var(--text-black);margin:0}
        .card-icon{font-size:28px;color:var(--primary-color);margin-bottom:10px}
        .zSidebar{background:var(--sidebar-bg)}
        .zSidebar .zSidebar-menu a{color:var(--sidebar-text)}
        .zSidebar .zSidebar-menu li.active>a,
        .zSidebar .zSidebar-menu a:hover{color:var(--sidebar-hover)}
        .main-header{position:sticky;top:0;z-index:10}
        .chart-card{background:#fff;border-radius:12px;box-shadow:var(--shadow);padding:20px}
        .sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0}
    </style>
</head>
<body class="direction-ltr">
<input type="hidden" id="lang_code" value="id">

<div class="overflow-x-hidden">
  <div class="zMain-wrap">
    {{-- Sidebar --}}
    <nav class="zSidebar" aria-label="Sidebar utama">
      <div class="zSidebar-overlay"></div>
      <a href="{{ url('/') }}" class="d-block mx-26 mb-27 max-w-220 pt-23">
        <img class="max-h-35" src="{{ asset('assets/uploads/Setting/6281729670913.png') }}" alt="Kadin Indonesia" />
      </a>

      <div class="zSidebar-fixed">
        <ul class="zSidebar-menu" id="sidebarMenu">
          <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center cg-10">
              <i class="fa-solid fa-gauge text-white" aria-hidden="true" style="font-size: 20px;"></i>
              <span class="ms-2">Dashboard Admin</span>
            </a>
          </li>
          <li class="{{ request()->is('members*') ? 'active' : '' }}">
            <a href="{{ url('/members') }}" class="d-flex align-items-center cg-10">
              <i class="fa-solid fa-users-line text-white" aria-hidden="true" style="font-size: 20px;"></i>
              <span class="ms-2">Manajemen Anggota</span>
            </a>
          </li>
          <li class="{{ request()->is('companies*') ? 'active' : '' }}">
            <a href="{{ url('/companies') }}" class="d-flex align-items-center cg-10">
              <i class="fa-solid fa-building text-white" aria-hidden="true" style="font-size: 20px;"></i>
              <span class="ms-2">Manajemen Perusahaan</span>
            </a>
          </li>
          <li class="{{ request()->is('transactions*') ? 'active' : '' }}">
            <a href="{{ url('/transactions') }}" class="d-flex align-items-center cg-10">
              <i class="fa-regular fa-credit-card text-white" aria-hidden="true" style="font-size: 20px;"></i>
              <span class="ms-2">Manajemen Transaksi</span>
            </a>
          </li>
          <li class="{{ request()->is('chat*') ? 'active' : '' }}">
            <a href="{{ url('/chat') }}" class="d-flex align-items-center cg-10">
              <i class="fa-solid fa-comments text-white" aria-hidden="true" style="font-size: 20px;"></i>
              <span class="ms-2">Manajemen Komunikasi</span>
            </a>
          </li>
          <li class="{{ request()->is('settings*') ? 'active' : '' }}">
            <a href="{{ url('/settings') }}" class="d-flex align-items-center cg-10">
              <i class="fa-solid fa-gear text-white" aria-hidden="true" style="font-size: 20px;"></i>
              <span class="ms-2">Manajemen Pengaturan</span>
            </a>
          </li>
        </ul>

        <ul class="list-unstyled">
          <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="d-inline-flex align-items-center cg-15 pt-17 pb-30 px-25">
              <img src="{{ asset('assets/images/icon/logout.svg') }}" alt="" />
              <p class="fs-14 fw-500 lh-16 text-white-70 mb-0">Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" aria-hidden="true">
              @csrf
            </form>
          </li>
        </ul>
      </div>
    </nav>

    {{-- Main content --}}
    <main class="zMainContent" id="main-content">
      <header class="main-header pt-28 pb-27 px-30 bd-one bd-c-ebedf0 bg-white d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center cg-15">
          <h1 class="fs-24 fw-600 lh-34 text-black m-0">Dashboard Admin</h1>
          <span class="sr-only">Ringkasan metrik dan navigasi admin</span>
        </div>

        <div class="right d-flex justify-content-end align-items-center cg-15">
          <div class="dropdown headerUserDropdown">
            <button class="dropdown-toggle p-0 border-0 bg-transparent d-flex align-items-center cg-8"
                    type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Menu pengguna">
              <div class="text-start d-none d-sm-block">
                <p class="fs-12 fw-400 lh-15 text-707070 mb-0">Selamat Datang</p>
                <h4 class="fs-15 fw-600 lh-18 text-1b1c17 mb-0">{{ Auth::user()->name ?? 'Admin' }}</h4>
              </div>
            </button>
            <ul class="dropdown-menu dropdownItem-one">
              <li>
                <a class="d-flex align-items-center cg-8" href="{{ url('/profile') }}">
                  <i class="fa-regular fa-user" aria-hidden="true"></i>
                  <p class="fs-14 fw-500 lh-16 text-707070 mb-0 ms-2">Profil</p>
                </a>
              </li>
              <li>
                <a class="d-flex align-items-center cg-8"
                   href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i>
                  <p class="fs-14 fw-500 lh-16 text-707070 mb-0 ms-2">Logout</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </header>

      <section class="p-30">
        {{-- Metrics --}}
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
          <div class="col"><div class="card-admin" role="status">
            <i class="fas fa-users card-icon" aria-hidden="true"></i>
            <h5>Total Pengguna</h5>
            <p>{{ number_format((int)($totalUsers ?? 0)) }}</p>
          </div></div>
          <div class="col"><div class="card-admin" role="status">
            <i class="fas fa-user-friends card-icon" aria-hidden="true"></i>
            <h5>Total Anggota</h5>
            <p>{{ number_format((int)($totalMembers ?? 0)) }}</p>
          </div></div>
          <div class="col"><div class="card-admin" role="status">
            <i class="fas fa-building card-icon" aria-hidden="true"></i>
            <h5>Total Perusahaan</h5>
            <p>{{ number_format((int)($totalCompanies ?? 0)) }}</p>
          </div></div>
          <div class="col"><div class="card-admin" role="status">
            <i class="fas fa-receipt card-icon" aria-hidden="true"></i>
            <h5>Total Transaksi</h5>
            <p>{{ number_format((int)($totalTransactions ?? 0)) }}</p>
          </div></div>
        </div>

        <div class="row g-3 mt-1">
          <div class="col-12 col-md-6"><div class="card-admin h-100" role="status">
            <i class="fas fa-hourglass-half card-icon" aria-hidden="true"></i>
            <h5>Transaksi Pending</h5>
            <p>{{ number_format((int)($pendingTransactions ?? 0)) }}</p>
          </div></div>

          <div class="col-12 col-md-6">
            <div class="chart-card h-100">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h4 class="fs-16 fw-600 mb-0">Aktivitas Transaksi</h4>
                @isset($startDate, $endDate)
                  <span class="text-muted fs-12">
                    {{ \Carbon\Carbon::parse($startDate)->format('d M Y') }}
                    – {{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}
                  </span>
                @endisset
              </div>
              <canvas id="txChart" height="120" aria-label="Grafik transaksi per hari" role="img"></canvas>
            </div>
          </div>
        </div>

        <div class="mt-4 p-4 bg-white rounded shadow-sm">
          <h4 class="fs-18 fw-600">Fungsi Manajemen Admin</h4>
          <ul class="mb-0">
            <li><strong>Manajemen Anggota:</strong> tambah/edit/hapus pengguna.</li>
            <li><strong>Manajemen Perusahaan:</strong> kelola & verifikasi data perusahaan.</li>
            <li><strong>Manajemen Transaksi:</strong> lihat, filter, verifikasi pembayaran.</li>
            <li><strong>Manajemen Komunikasi:</strong> pantau & kelola pesan antar anggota.</li>
            <li><strong>Manajemen Pengaturan:</strong> ubah pengaturan umum aplikasi.</li>
          </ul>
        </div>
      </section>
    </main>
  </div>
</div>

<script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js?ver=0') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js" crossorigin="anonymous"></script>
<script>
  const chartLabels   = @json($chartLabels ?? []);
  const chartTxCount  = @json($chartTxCount ?? []);
  const chartRevenue  = @json($chartRevenue ?? []);

  const ctx = document.getElementById('txChart');
  if (ctx && Array.isArray(chartLabels) && chartLabels.length) {
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: chartLabels,
        datasets: [
          { label: 'Jumlah Transaksi', data: chartTxCount, tension: 0.35, fill: false },
          { label: 'Revenue (paid)', data: chartRevenue, tension: 0.35, yAxisID: 'y1', fill: false }
        ]
      },
      options: {
        responsive: true,
        interaction: { mode: 'index', intersect: false },
        scales: {
          y: { beginAtZero: true, title: { display: true, text: 'Transaksi' } },
          y1: { beginAtZero: true, position: 'right', title: { display: true, text: 'Revenue' }, grid: { drawOnChartArea: false } }
        }
      }
    });
  }
</script>
</body>
</html>
