<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengaduan - PLN UP3 Surabaya Selatan</title>
    <!-- Load Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Load Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Load Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            background-color: #f8fafc; /* Latar belakang abu-abu sangat terang */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        .wrapper { display: flex; width: 100%; align-items: stretch; }

        /* Desain Sidebar Kiri */
        #sidebar {
            min-width: 260px;
            max-width: 260px;
            min-height: 100vh;
            background-color: #0f172a;
            color: #f8fafc;
            position: sticky;
            top: 0;
        }
        #sidebar .nav-link {
            color: rgba(255, 255, 255, 0.7);
            border-radius: 8px;
            margin-bottom: 5px;
            padding: 12px 20px;
            font-weight: 500;
            transition: all 0.3s;
        }
        #sidebar .nav-link:hover, #sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: #38bdf8;
            transform: translateX(4px);
        }

        .main-content { flex-grow: 1; padding: 2rem 3rem; }

        /* Scorecards */
        .card-summary {
            border: none;
            border-radius: 12px;
            color: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-summary:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(15, 23, 42, 0.1);
        }

        .bg-card-total { background: linear-gradient(135deg, #1e40af, #3b82f6); } /* Royal Blue */
        .bg-card-menunggu { background: linear-gradient(135deg, #334155, #475569); } /* Slate */
        .bg-card-diproses { background: linear-gradient(135deg, #0284c7, #0ea5e9); } /* Sky Blue */
        .bg-card-selesai { background: linear-gradient(135deg, #0f766e, #14b8a6); } /* Teal */

        /* Kartu Grafik */
        .chart-card {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
            background-color: #ffffff;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <!-- MENU SIDEBAR (KIRI) -->
    <nav id="sidebar" class="p-3 d-flex flex-column">
        <div class="text-center mb-4 mt-2 border-bottom border-secondary pb-4">
            <i class="bi bi-lightning-charge-fill text-info" style="font-size: 2.5rem;"></i>
            <h5 class="fw-bold text-white mt-2 mb-0">PLN UP3 SBY</h5>
            <small class="text-white-50">Surabaya Selatan</small>
        </div>

        <ul class="nav flex-column mb-auto w-100">
            <li class="nav-item"><a href="/" class="nav-link active"><i class="bi bi-speedometer2 me-3"></i> Dashboard</a></li>
            <li class="nav-item"><a href="/data-pengaduan" class="nav-link"><i class="bi bi-table me-3"></i> Data Pengaduan</a></li>
            <li class="nav-item"><a href="/rekapitulasi" class="nav-link"><i class="bi bi-file-bar-graph me-3"></i> Rekapitulasi</a></li>
            <li class="nav-item"><a href="/profil-pelanggan" class="nav-link"><i class="bi bi-person-badge me-3"></i> Profil</a></li>
        </ul>

        <hr class="border-secondary mt-5">
        <div class="text-center text-white-50" style="font-size: 0.8rem;">
            &copy; 2026 Kerja Praktik<br>Telkom University SBY
        </div>
    </nav>

    <!-- AREA KONTEN UTAMA (KANAN) -->
    <div class="main-content">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h3 class="fw-bolder text-dark mb-1">Dashboard Monitoring</h3>
                <p class="text-secondary mb-0">Rekapitulasi Data Keluhan Pelanggan PT PLN (Persero) UP3 Surabaya Selatan</p>
            </div>
            <div class="d-none d-md-block">
                <div class="bg-white px-4 py-2 rounded-pill shadow-sm text-secondary fw-semibold border border-light">
                    <i class="bi bi-calendar3 me-2 text-primary"></i> Agustus 2026
                </div>
            </div>
        </div>

        <!-- Scorecards -->
        <div class="row mb-4 text-center">
            <div class="col-md-3 mb-3">
                <div class="card card-summary bg-card-total p-4">
                    <i class="bi bi-folder2-open fs-1 mb-2 opacity-75"></i>
                    <h6 class="text-uppercase fw-semibold mb-1" style="letter-spacing: 0.5px; font-size: 0.85rem;">Total Pengaduan</h6>
                    <h2 class="fw-bold mb-0">{{ $total }}</h2>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-summary bg-card-menunggu p-4">
                    <i class="bi bi-clock-history fs-1 mb-2 opacity-75"></i>
                    <h6 class="text-uppercase fw-semibold mb-1" style="letter-spacing: 0.5px; font-size: 0.85rem;">Menunggu</h6>
                    <h2 class="fw-bold mb-0">{{ $menunggu }}</h2>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-summary bg-card-diproses p-4">
                    <i class="bi bi-arrow-repeat fs-1 mb-2 opacity-75"></i>
                    <h6 class="text-uppercase fw-semibold mb-1" style="letter-spacing: 0.5px; font-size: 0.85rem;">Sedang Diproses</h6>
                    <h2 class="fw-bold mb-0">{{ $diproses }}</h2>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-summary bg-card-selesai p-4">
                    <i class="bi bi-check-circle-fill fs-1 mb-2 opacity-75"></i>
                    <h6 class="text-uppercase fw-semibold mb-1" style="letter-spacing: 0.5px; font-size: 0.85rem;">Selesai</h6>
                    <h2 class="fw-bold mb-0">{{ $selesai }}</h2>
                </div>
            </div>
        </div>

        <!-- Grafik -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card chart-card p-4 h-100">
                    <h6 class="fw-bold text-dark mb-4 text-center">Persentase Jenis Pengaduan</h6>
                    <!-- Wadah grafik disesuaikan agar proporsional -->
                    <div style="position: relative; height: 280px; width: 100%; display: flex; justify-content: center;">
                        <canvas id="chartJenis"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card chart-card p-4 h-100">
                    <h6 class="fw-bold text-dark mb-4 text-center">5 Wilayah Gangguan Terbanyak</h6>
                    <div style="position: relative; height: 280px; width: 100%;">
                        <canvas id="chartWilayah"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Konfigurasi Grafik Modern Enterprise -->
<script>
    const dataJenis = @json($jenis_pengaduan);
    const dataWilayah = @json($wilayah_terbanyak);

    // Konfigurasi Font Default Chart.js
    Chart.defaults.font.family = "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif";
    Chart.defaults.color = '#64748b';

    // 1. CHART DOUGHNUT (Sleek, cincin tipis, legend bulat)
    const ctxJenis = document.getElementById('chartJenis').getContext('2d');
    new Chart(ctxJenis, {
        type: 'doughnut',
        data: {
            labels: Object.keys(dataJenis),
            datasets: [{
                data: Object.values(dataJenis),
                // Palet biru bergradasi dari gelap ke terang
                backgroundColor: ['#1e3a8a', '#2563eb', '#38bdf8', '#7dd3fc'],
                borderWidth: 0, // Tanpa garis tepi agar flat & modern
                hoverOffset: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '75%', // Semakin besar angkanya, semakin tipis donatnya (elegan)
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        usePointStyle: true, // Legend menjadi lingkaran, bukan kotak
                        padding: 20,
                        font: { size: 12 }
                    }
                },
                tooltip: {
                    backgroundColor: '#0f172a',
                    padding: 12,
                    cornerRadius: 8,
                    titleFont: { size: 13, weight: 'normal' },
                    bodyFont: { size: 14, weight: 'bold' }
                }
            }
        }
    });

    // 2. CHART BAR (Ramping, ujung membulat, garis grid samar)
    const ctxWilayah = document.getElementById('chartWilayah').getContext('2d');

    // Membuat Efek Warna Gradien untuk Bar
    let gradientBar = ctxWilayah.createLinearGradient(0, 0, 0, 300);
    gradientBar.addColorStop(0, '#3b82f6'); // Biru cerah di atas
    gradientBar.addColorStop(1, '#1e3a8a'); // Navy di bawah

    new Chart(ctxWilayah, {
        type: 'bar',
        data: {
            labels: Object.keys(dataWilayah),
            datasets: [{
                label: 'Total Laporan',
                data: Object.values(dataWilayah),
                backgroundColor: gradientBar,
                borderRadius: 6, // Lengkungan di ujung batang
                borderSkipped: false,
                barThickness: 32 // Ketebalan batang agar seragam dan ramping
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#f1f5f9', // Warna garis samar
                        drawBorder: false,
                        borderDash: [5, 5] // Garis bantu putus-putus
                    },
                    ticks: { stepSize: 1 } // Menampilkan angka bulat saja (1, 2, 3...)
                },
                x: {
                    grid: { display: false, drawBorder: false } // Sumbu X bersih tanpa garis bantu
                }
            },
            plugins: {
                legend: { display: false }, // Sembunyikan tulisan 'Total Laporan' di atas
                tooltip: {
                    backgroundColor: '#0f172a',
                    padding: 12,
                    cornerRadius: 8,
                    displayColors: false, // Hilangkan kotak warna di dalam tooltip
                    titleFont: { size: 13, weight: 'normal', color: '#94a3b8' },
                    bodyFont: { size: 15, weight: 'bold' }
                }
            },
            animation: {
                y: { duration: 1500, easing: 'easeOutQuart' } // Animasi halus saat dimuat
            }
        }
    });
</script>

</body>
</html>
