<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Dashboard Monitoring Pengaduan
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <style>

        /* =========================
           WARNA PLN
        ========================= */

        :root {

            --pln-blue: #086eb5;

            --pln-blue-dark: #075a96;

            --pln-blue-light: #087fd0;

            --pln-cyan: #08a4d8;

            --pln-gradient:
                linear-gradient(
                    135deg,
                    #075a96 0%,
                    #087fd0 50%,
                    #08a4d8 100%
                );

            --background:
                #f4faff;

            --text:
                #17324d;

        }


        /* =========================
           GLOBAL
        ========================= */

        * {
            box-sizing: border-box;
        }

        body {

            margin: 0;

            font-family:
                'Segoe UI',
                Tahoma,
                Geneva,
                Verdana,
                sans-serif;

            background:
                #f4faff;

            color:
                var(--text);

            overflow-x:
                hidden;
        }


        /* =========================
           WRAPPER
        ========================= */

        .wrapper {

            display:
                flex;

            min-height:
                100vh;

            width:
                100%;
        }


        /* =========================
           SIDEBAR
        ========================= */

        #sidebar {

            width:
                270px;

            min-width:
                270px;

            min-height:
                100vh;

            padding:
                30px 18px;

            position:
                sticky;

            top:
                0;

            color:
                white;

            background:
                linear-gradient(
                    160deg,
                    #075a96 0%,
                    #087fd0 50%,
                    #08a4d8 100%
                );

            box-shadow:
                8px 0 30px
                rgba(0,91,150,.15);

            overflow:
                hidden;
        }


        /* Lingkaran dekorasi */

        #sidebar::before {

            content:
                "";

            position:
                absolute;

            width:
                220px;

            height:
                220px;

            border-radius:
                50%;

            background:
                rgba(255,255,255,.07);

            top:
                -100px;

            right:
                -100px;
        }

        #sidebar::after {

            content:
                "";

            position:
                absolute;

            width:
                180px;

            height:
                180px;

            border-radius:
                50%;

            background:
                rgba(255,255,255,.06);

            bottom:
                -80px;

            left:
                -90px;
        }


        /* =========================
           LOGO
        ========================= */

        .sidebar-logo {

            position:
                relative;

            z-index:
                2;

            text-align:
                center;

            margin-bottom:
                25px;
        }

        .sidebar-logo i {

            font-size:
                3.2rem;

            color:
                white;

            filter:
                drop-shadow(
                    0 5px 12px
                    rgba(255,255,255,.25)
                );
        }

        .sidebar-logo h5 {

            margin:
                10px 0 3px;

            font-size:
                1.3rem;

            font-weight:
                700;

            color:
                white;
        }

        .sidebar-logo small {

            color:
                rgba(255,255,255,.82);
        }


        #sidebar hr {

            border-color:
                rgba(255,255,255,.25);

            margin:
                25px 0;
        }


        /* =========================
           MENU
        ========================= */

        .nav-link {

            position:
                relative;

            z-index:
                2;

            display:
                flex;

            align-items:
                center;

            gap:
                12px;

            padding:
                14px 18px;

            margin-bottom:
                9px;

            border-radius:
                14px;

            color:
                rgba(255,255,255,.88);

            text-decoration:
                none;

            font-weight:
                600;

            transition:
                .25s ease;
        }

        .nav-link i {

            font-size:
                1.15rem;

            width:
                22px;
        }

        .nav-link:hover {

            background:
                rgba(255,255,255,.16);

            color:
                white;

            transform:
                translateX(5px);
        }

        .nav-link.active {

            background:
                white;

            color:
                var(--pln-blue);

            box-shadow:
                0 8px 22px
                rgba(0,0,0,.14);
        }

        .nav-link.active i {

            color:
                var(--pln-blue);
        }


        /* =========================
           MAIN
        ========================= */

        .main-content {

            flex:
                1;

            min-height:
                100vh;

            padding:
                35px 45px;

            background:
                linear-gradient(
                    135deg,
                    #f9fcff 0%,
                    #eef8fd 100%
                );
        }


        /* =========================
           HEADER
        ========================= */

        .dashboard-header {

            display:
                flex;

            justify-content:
                space-between;

            align-items:
                center;

            margin-bottom:
                30px;
        }

        .dashboard-header h3 {

            margin:
                0;

            font-size:
                2rem;

            font-weight:
                750;

            color:
                #123b67;
        }

        .dashboard-header p {

            margin-top:
                7px;

            color:
                #6b8299;

            font-size:
                .98rem;
        }


        /* =========================
           DATE
        ========================= */

        .date-box {

            display:
                flex;

            align-items:
                center;

            gap:
                10px;

            padding:
                13px 22px;

            background:
                white;

            color:
                var(--pln-blue);

            border-radius:
                50px;

            box-shadow:
                0 8px 25px
                rgba(0,91,150,.10);

            font-weight:
                600;
        }


        /* =========================
           KPI
        ========================= */

        .kpi-grid {

            display:
                grid;

            grid-template-columns:
                repeat(4,1fr);

            gap:
                25px;

            margin-bottom:
                30px;
        }

        .card-summary {

            position:
                relative;

            overflow:
                hidden;

            min-height:
                205px;

            padding:
                28px;

            border-radius:
                22px;

            color:
                white;

            display:
                flex;

            flex-direction:
                column;

            justify-content:
                center;

            align-items:
                center;

            text-align:
                center;

            transition:
                .3s ease;

            box-shadow:
                0 8px 25px
                rgba(0,91,150,.10);
        }

        .card-summary:hover {

            transform:
                translateY(-7px);

            box-shadow:
                0 18px 35px
                rgba(0,91,150,.20);
        }


        /* Dekorasi card */

        .card-summary::before {

            content:
                "";

            position:
                absolute;

            width:
                170px;

            height:
                170px;

            border-radius:
                50%;

            background:
                rgba(255,255,255,.08);

            top:
                -80px;

            right:
                -60px;
        }

        .card-summary::after {

            content:
                "";

            position:
                absolute;

            width:
                120px;

            height:
                120px;

            border-radius:
                50%;

            background:
                rgba(255,255,255,.06);

            bottom:
                -60px;

            left:
                -40px;
        }


        /* Warna card */

        .bg-card-total {

            background:
                linear-gradient(
                    135deg,
                    #075a96,
                    #087fd0
                );
        }

        .bg-card-menunggu {

            background:
                linear-gradient(
                    135deg,
                    #086eb5,
                    #08a4d8
                );
        }

        .bg-card-diproses {

            background:
                linear-gradient(
                    135deg,
                    #0875bb,
                    #08addc
                );
        }

        .bg-card-selesai {

            background:
                linear-gradient(
                    135deg,
                    #087ab7,
                    #10b8d8
                );
        }


        .card-summary i {

            font-size:
                2.7rem;

            margin-bottom:
                10px;

            color:
                white;
        }

        .card-summary h6 {

            font-size:
                .85rem;

            letter-spacing:
                1px;

            margin-bottom:
                5px;

            color:
                white;

            font-weight:
                600;
        }

        .card-summary h2 {

            font-size:
                2.4rem;

            margin:
                0;

            color:
                white;

            font-weight:
                700;
        }


        /* =========================
           CHART
        ========================= */

        .chart-grid {

            display:
                grid;

            grid-template-columns:
                repeat(2,1fr);

            gap:
                25px;
        }

        .chart-card {

            background:
                white;

            border:
                1px solid
                rgba(0,102,179,.08);

            border-radius:
                22px;

            padding:
                25px;

            box-shadow:
                0 8px 30px
                rgba(0,91,150,.07);

            transition:
                .3s ease;
        }

        .chart-card:hover {

            transform:
                translateY(-3px);

            box-shadow:
                0 14px 35px
                rgba(0,91,150,.12);
        }

        .chart-card h6 {

            color:
                #123b67;

            font-size:
                1.05rem;

            font-weight:
                700;

            margin-bottom:
                20px;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media(max-width:1100px) {

            .kpi-grid {

                grid-template-columns:
                    repeat(2,1fr);
            }
        }


        @media(max-width:768px) {

            .wrapper {

                flex-direction:
                    column;
            }

            #sidebar {

                width:
                    100%;

                min-width:
                    100%;

                min-height:
                    auto;

                position:
                    relative;
            }

            .main-content {

                padding:
                    25px 20px;
            }

            .dashboard-header {

                flex-direction:
                    column;

                align-items:
                    flex-start;

                gap:
                    20px;
            }

            .kpi-grid {

                grid-template-columns:
                    1fr;
            }

            .chart-grid {

                grid-template-columns:
                    1fr;
            }
        }

    </style>

</head>


<body>


<div class="wrapper">


    <!-- =========================
         SIDEBAR
    ========================== -->

    <aside id="sidebar">

        <div class="sidebar-logo">

            <i class="bi bi-lightning-charge-fill"></i>

            <h5>
                PLN ULP
            </h5>

            <small>
                Dukuh Kupang
            </small>

        </div>


        <hr>


        <nav>

            <a href="/dashboard"
               class="nav-link active">

                <i class="bi bi-speedometer2"></i>

                Dashboard

            </a>


            <a href="/data-pengaduan"
               class="nav-link">

                <i class="bi bi-table"></i>

                Data Pengaduan

            </a>


            <a href="/rekapitulasi"
               class="nav-link">

                <i class="bi bi-bar-chart"></i>

                Rekapitulasi

            </a>


            <a href="/profil-pelanggan"
               class="nav-link">

                <i class="bi bi-person"></i>

                Profil Pelanggan

            </a>

        </nav>

    </aside>



    <!-- =========================
         MAIN CONTENT
    ========================== -->

    <main class="main-content">


        <!-- HEADER -->

        <div class="dashboard-header">

            <div>

                <h3>
                    Dashboard Monitoring Pengaduan
                </h3>

                <p>
                    Rekapitulasi Data Pengaduan Pelanggan
                    PLN ULP Dukuh Kupang
                </p>

            </div>


            <div class="date-box">

                <i class="bi bi-calendar3"></i>

                Agustus 2026

            </div>

        </div>



        <!-- =========================
             KPI
        ========================== -->

        <div class="kpi-grid">


            <div class="card-summary bg-card-total">

                <i class="bi bi-folder"></i>

                <h6>
                    TOTAL PENGADUAN
                </h6>

                <h2>
                    500
                </h2>

            </div>



            <div class="card-summary bg-card-menunggu">

                <i class="bi bi-clock-history"></i>

                <h6>
                    MENUNGGU
                </h6>

                <h2>
                    85
                </h2>

            </div>



            <div class="card-summary bg-card-diproses">

                <i class="bi bi-arrow-repeat"></i>

                <h6>
                    SEDANG DIPROSES
                </h6>

                <h2>
                    135
                </h2>

            </div>



            <div class="card-summary bg-card-selesai">

                <i class="bi bi-check-circle"></i>

                <h6>
                    SELESAI
                </h6>

                <h2>
                    280
                </h2>

            </div>


        </div>



        <!-- =========================
             CHART
        ========================== -->

        <div class="chart-grid">


            <div class="chart-card">

                <h6>
                    Persentase Jenis Pengaduan
                </h6>

                <canvas id="jenisPengaduanChart"></canvas>

            </div>


            <div class="chart-card">

                <h6>
                    5 Wilayah Gangguan Terbanyak
                </h6>

                <canvas id="wilayahChart"></canvas>

            </div>


        </div>


    </main>

</div>


</body>

</html>
