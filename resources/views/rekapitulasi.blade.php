<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekapitulasi Wilayah - PLN UP3 Surabaya Selatan</title>
    <!-- Load Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Load Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Load DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- Load SheetJS untuk Export Excel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <style>
        body {
            background-color: #f8fafc;
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
            z-index: 1000;
        }
        #sidebar .nav-link {
            color: rgba(255, 255, 255, 0.6);
            border-radius: 8px;
            margin-bottom: 5px;
            padding: 12px 20px;
            font-weight: 500;
            transition: all 0.3s;
        }
        #sidebar .nav-link:hover, #sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.08);
            color: #38bdf8;
            transform: translateX(4px);
        }

        .main-content { flex-grow: 1; padding: 2rem 3rem; }

        /* Topbar Nav / Breadcrumb Area */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        .breadcrumb-item a { color: #64748b; text-decoration: none; font-weight: 500;}
        .breadcrumb-item.active { color: #0f172a; font-weight: 600; }

        /* Tombol Ukuran Kecil & Soft Colors */
        .btn-enterprise-sm {
            padding: 0.35rem 0.75rem;
            font-size: 0.85rem;
            border-radius: 6px;
            font-weight: 600;
            transition: 0.2s;
        }

        /* Warna Merah Soft untuk Cetak PDF */
        .btn-enterprise-danger-soft {
            background-color: #ef4444;
            color: white;
            border: none;
            box-shadow: 0 2px 4px rgba(239, 68, 68, 0.2);
        }
        .btn-enterprise-danger-soft:hover {
            background-color: #dc2626;
            color: white;
        }

        /* Warna Hijau Soft untuk Export Excel */
        .btn-enterprise-success-soft {
            background-color: #10b981;
            color: white;
            border: none;
            box-shadow: 0 2px 4px rgba(16, 185, 129, 0.2);
        }
        .btn-enterprise-success-soft:hover {
            background-color: #059669;
            color: white;
        }

        /* Desain Tabel Enterprise */
        .table-card {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
            background-color: #ffffff;
        }

        .table-custom thead th {
            background-color: #f1f5f9;
            color: #334155;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            font-weight: 700;
            padding-top: 1rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #cbd5e1;
        }

        .table-custom tbody td {
            color: #334155;
            font-size: 0.95rem;
            vertical-align: middle;
            padding-top: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #f1f5f9;
        }

        /* Styling Badge Angka Rekap */
        .badge-rekap {
            padding: 6px 14px;
            border-radius: 6px;
            font-family: 'Segoe UI', monospace;
            font-weight: 600;
            font-size: 0.9rem;
        }
        .badge-menunggu { background-color: #f1f5f9; color: #475569; border: 1px solid #e2e8f0; }
        .badge-diproses { background-color: #e0f2fe; color: #0284c7; border: 1px solid #bae6fd; }
        .badge-selesai  { background-color: #dcfce3; color: #166534; border: 1px solid #bbf7d0; }
        .badge-total    { background-color: #eff6ff; color: #1d4ed8; border: 1px solid #bfdbfe; font-weight: 700; }

        /* Modifikasi DataTables */
        .dataTables_wrapper .row { margin-bottom: 1rem; }
        div.dataTables_filter input {
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            padding: 0.375rem 0.75rem;
        }
        div.dataTables_filter input:focus {
            border-color: #38bdf8;
            outline: none;
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.2);
        }

        /* Pengaturan Khusus Saat Dicetak Menjadi PDF */
        @media print {
            #sidebar, .top-bar, .d-flex.justify-content-between, .dataTables_filter, .dataTables_length, .dataTables_info, .dataTables_paginate {
                display: none !important;
            }
            .main-content { padding: 0 !important; width: 100% !important; }
            .table-card { border: none !important; box-shadow: none !important; }
            body { background-color: white !important; }

            .print-header {
                display: block !important;
                text-align: center;
                margin-bottom: 2rem;
            }
        }
        .print-header { display: none; }
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
            <li class="nav-item"><a href="/" class="nav-link"><i class="bi bi-speedometer2 me-3"></i> Dashboard</a></li>
            <li class="nav-item"><a href="/data-pengaduan" class="nav-link"><i class="bi bi-table me-3"></i> Data Pengaduan</a></li>
            <li class="nav-item"><a href="/rekapitulasi" class="nav-link active"><i class="bi bi-file-bar-graph me-3"></i> Rekapitulasi</a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-person-circle me-3"></i> Profil Tim</a></li>
        </ul>

        <hr class="border-secondary mt-5">
        <div class="text-center text-white-50" style="font-size: 0.8rem;">
            &copy; 2026 Kerja Praktik<br>Telkom University SBY
        </div>
    </nav>

    <!-- AREA KONTEN UTAMA (KANAN) -->
    <div class="main-content">

        <!-- Top Bar -->
        <div class="top-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/"><i class="bi bi-house-door me-1"></i>Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Laporan Rekapitulasi</li>
                </ol>
            </nav>
        </div>

        <!-- Header Halaman & Action Buttons (Ukuran Kecil) -->
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h3 class="fw-bolder text-dark mb-1">Rekapitulasi Wilayah</h3>
                <p class="text-secondary mb-0">Laporan ringkasan total keluhan dan status penanganan per wilayah layanan.</p>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-enterprise-sm btn-enterprise-danger-soft" onclick="cetakPDF()">
                    <i class="bi bi-file-earmark-pdf me-1"></i> Cetak PDF
                </button>
                <button class="btn btn-enterprise-sm btn-enterprise-success-soft" onclick="exportExcel()">
                    <i class="bi bi-file-earmark-excel me-1"></i> Export Excel
                </button>
            </div>
        </div>

        <!-- Kop Surat Resmi (Hanya Muncul Saat Cetak PDF) -->
        <div class="print-header">
            <h4 class="fw-bold text-dark mb-1">PT PLN (PERSERO) UP3 SURABAYA SELATAN</h4>
            <h5 class="fw-semibold text-secondary mb-2">LAPORAN REKAPITULASI PENGADUAN PELANGGAN PER WILAYAH</h5>
            <hr style="border: 2px solid black;">
        </div>

        <!-- Tabel Rekapitulasi -->
        <div class="card table-card p-4">
            <div class="table-responsive">
                <table id="tabelRekap" class="table table-hover table-custom align-middle mb-0">
                    <thead>
                        <tr>
                            <th width="8%">No</th>
                            <th width="36%">Nama Wilayah / Area</th>
                            <th width="14%" class="text-center">Menunggu</th>
                            <th width="14%" class="text-center">Diproses</th>
                            <th width="14%" class="text-center">Selesai</th>
                            <th width="14%" class="text-center">Total Laporan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rekapWilayah as $index => $rekap)
                        <tr>
                            <td class="fw-semibold text-secondary">{{ $index + 1 }}</td>
                            <td>
                                <div class="fw-bold text-dark fs-6"><i class="bi bi-geo-alt-fill text-primary me-2"></i>{{ $rekap->wilayah }}</div>
                            </td>
                            <td class="text-center">
                                <span class="badge-rekap badge-menunggu">{{ $rekap->menunggu }}</span>
                            </td>
                            <td class="text-center">
                                <span class="badge-rekap badge-diproses">{{ $rekap->diproses }}</span>
                            </td>
                            <td class="text-center">
                                <span class="badge-rekap badge-selesai">{{ $rekap->selesai }}</span>
                            </td>
                            <td class="text-center">
                                <span class="badge-rekap badge-total">{{ $rekap->total }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- Skrip Inisialisasi & Tombol Aksi -->
<script>
    $(document).ready(function() {
        $('#tabelRekap').DataTable({
            language: {
                search: "",
                searchPlaceholder: "Cari wilayah...",
                lengthMenu: "Tampilkan _MENU_ baris",
                info: "Menampilkan _START_ - _END_ dari _TOTAL_ wilayah",
                infoEmpty: "Tidak ada data",
                paginate: {
                    first: "Awal",
                    last: "Akhir",
                    next: "→",
                    previous: "←"
                }
            },
            ordering: true,
            pageLength: 10,
            dom: "<'row align-items-center'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6 d-flex justify-content-end'f>>" +
                 "<'row'<'col-sm-12'tr>>" +
                 "<'row align-items-center mt-3'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 d-flex justify-content-end'p>>"
        });
    });

    // Fungsi Cetak PDF (Menggunakan Print Preview Browser yang Bersih)
    function cetakPDF() {
        window.print();
    }

    // Fungsi Export ke Excel Menggunakan SheetJS
    function exportExcel() {
        let table = document.getElementById("tabelRekap");
        let workbook = XLSX.utils.table_to_book(table, { sheet: "Rekapitulasi Wilayah" });
        XLSX.writeFile(workbook, "Rekapitul_Pengaduan_PLN_UP3_SBY.xlsx");
    }
</script>

</body>
</html>
