<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PLN ULP Dukuh Kupang | Monitoring Pengaduan</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #ffffff;
            color: #1e293b;
        }

        /* ================= NAVBAR ================= */

        .navbar {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 100;
            padding: 22px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            font-size: 23px;
            font-weight: 700;
        }

        .logo-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: white;
            color: #0876c9;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            font-weight: 800;
            box-shadow: 0 5px 20px rgba(0,0,0,.15);
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 32px;
            list-style: none;
        }

        .nav-menu a {
            text-decoration: none;
            color: rgba(255,255,255,.9);
            font-size: 14px;
            font-weight: 500;
            transition: .3s;
        }

        .nav-menu a:hover {
            color: white;
        }

        .login-btn {
            padding: 10px 22px;
            border: 1px solid rgba(255,255,255,.7);
            border-radius: 25px;
            color: white !important;
        }

        .login-btn:hover {
            background: white;
            color: #0876c9 !important;
        }

        /* ================= HERO ================= */

        .hero {
            min-height: 650px;
            position: relative;
            overflow: hidden;
            background:
                linear-gradient(
                    120deg,
                    #0757a8 0%,
                    #087aca 45%,
                    #08a7df 100%
                );
            color: white;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: rgba(255,255,255,.05);
            right: -180px;
            top: -220px;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: rgba(255,255,255,.04);
            left: -180px;
            bottom: -250px;
        }

        .hero-container {
            max-width: 1200px;
            margin: auto;
            min-height: 650px;
            padding: 130px 40px 70px;

            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 50px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .small-title {
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 18px;
            opacity: .9;
        }

        .hero h1 {
            font-size: 48px;
            line-height: 1.2;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero h1 span {
            color: #dff6ff;
        }

        .hero-description {
            font-size: 16px;
            line-height: 1.8;
            max-width: 570px;
            color: rgba(255,255,255,.9);
            margin-bottom: 32px;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-block;
            padding: 14px 28px;
            border-radius: 9px;
            background: white;
            color: #0766b7;
            text-decoration: none;
            font-weight: 600;
            transition: .3s;
            box-shadow: 0 8px 25px rgba(0,0,0,.15);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0,0,0,.2);
        }

        .btn-outline {
            display: inline-block;
            padding: 14px 28px;
            border-radius: 9px;
            border: 1px solid rgba(255,255,255,.7);
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: .3s;
        }

        .btn-outline:hover {
            background: rgba(255,255,255,.15);
        }

        /* ================= HERO IMAGE ================= */

        .hero-image {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-image img {
            width: 100%;
            max-width: 540px;
            height: auto;
            object-fit: contain;
            filter: drop-shadow(0 25px 35px rgba(0,0,0,.15));
        }

        .image-card {
            width: 500px;
            height: 380px;
            border-radius: 30px;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.2);
            backdrop-filter: blur(8px);

            display: flex;
            align-items: center;
            justify-content: center;

            box-shadow: 0 25px 50px rgba(0,0,0,.12);
        }

        .electric-icon {
            font-size: 180px;
            color: #fff;
            text-shadow: 0 15px 30px rgba(0,0,0,.15);
        }

        /* ================= ABOUT ================= */

        .about {
            padding: 90px 7%;
            background: white;
        }

        .section-title {
            text-align: center;
            margin-bottom: 55px;
        }

        .section-title .subtitle {
            color: #087acb;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .section-title h2 {
            font-size: 32px;
            color: #172554;
            margin-bottom: 15px;
        }

        .section-title p {
            max-width: 700px;
            margin: auto;
            color: #64748b;
            line-height: 1.7;
        }

        .about-container {
            max-width: 1100px;
            margin: auto;

            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .feature-card {
            padding: 35px 28px;
            border-radius: 18px;
            background: #f8fbff;
            border: 1px solid #e2e8f0;
            text-align: center;
            transition: .3s;
        }

        .feature-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 15px 35px rgba(0,100,200,.1);
        }

        .feature-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 20px;
            border-radius: 17px;
            background: #e7f5ff;
            color: #087acb;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 28px;
        }

        .feature-card h3 {
            color: #172554;
            font-size: 18px;
            margin-bottom: 12px;
        }

        .feature-card p {
            color: #64748b;
            font-size: 14px;
            line-height: 1.7;
        }

        /* ================= CTA ================= */

        .cta {
            padding: 80px 7%;
            background: linear-gradient(120deg, #0757a8, #08a7df);
            text-align: center;
            color: white;
        }

        .cta h2 {
            font-size: 32px;
            margin-bottom: 15px;
        }

        .cta p {
            opacity: .9;
            margin-bottom: 28px;
        }

        /* ================= FOOTER ================= */

        footer {
            padding: 30px 7%;
            background: #071a33;
            color: rgba(255,255,255,.7);
            text-align: center;
            font-size: 13px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 900px) {

            .nav-menu {
                display: none;
            }

            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
                padding-top: 130px;
            }

            .hero-description {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-buttons {
                justify-content: center;
            }

            .image-card {
                width: 90%;
                height: 280px;
            }

            .electric-icon {
                font-size: 120px;
            }

            .about-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {

            .navbar {
                padding: 18px 5%;
            }

            .logo {
                font-size: 18px;
            }

            .hero h1 {
                font-size: 34px;
            }

            .hero-container {
                padding-left: 20px;
                padding-right: 20px;
            }

            .section-title h2 {
                font-size: 26px;
            }
        }

    </style>
</head>

<body>

    <!-- ================= NAVBAR ================= -->

    <nav class="navbar">

        <div class="logo">
            <div class="logo-icon">⚡</div>
            <span>PLN ULP Dukuh Kupang</span>
        </div>

        <ul class="nav-menu">

            <li>
                <a href="#beranda">Beranda</a>
            </li>

            <li>
                <a href="#tentang">Tentang</a>
            </li>

            <li>
                <a href="#layanan">Layanan</a>
            </li>

            <li>
                <a href="#kontak">Kontak</a>
            </li>

            <li>
                <a href="/login" class="login-btn">
                    Login Admin
                </a>
            </li>

        </ul>

    </nav>


    <!-- ================= HERO ================= -->

    <section class="hero" id="beranda">

        <div class="hero-container">

            <div class="hero-content">

                <div class="small-title">
                    SISTEM MONITORING PELAYANAN PELANGGAN
                </div>

                <h1>
                    Monitoring Pengaduan
                    <span>Pelanggan PLN</span>
                </h1>

                <p class="hero-description">
                    Sistem informasi untuk membantu PLN ULP Dukuh Kupang
                    dalam memantau, mengelola, dan mengevaluasi pengaduan
                    pelanggan secara lebih cepat dan terstruktur.
                </p>

                <div class="hero-buttons">

                    <a href="/dashboard" class="btn-primary">
                        Masuk ke Dashboard →
                    </a>

                    <a href="#tentang" class="btn-outline">
                        Pelajari Sistem
                    </a>

                </div>

            </div>


            <div class="hero-image">

                <div class="image-card">

                    <!--
                    Nanti bagian ini bisa diganti
                    dengan gambar/ilustrasi PLN.
                    -->

                    <div class="electric-icon">
                        ⚡
                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ================= ABOUT ================= -->

    <section class="about" id="tentang">

        <div class="section-title">

            <div class="subtitle">
                Tentang Sistem
            </div>

            <h2>
                Monitoring Pelayanan Pelanggan
            </h2>

            <p>
                Dashboard ini dirancang untuk membantu petugas
                dalam memantau kondisi pengaduan pelanggan
                dan mengetahui perkembangan penyelesaiannya.
            </p>

        </div>


        <div class="about-container">

            <div class="feature-card">

                <div class="feature-icon">
                    📋
                </div>

                <h3>
                    Data Pengaduan
                </h3>

                <p>
                    Menampilkan data pengaduan pelanggan
                    berdasarkan jenis pengaduan, wilayah,
                    dan tanggal masuk.
                </p>

            </div>


            <div class="feature-card">

                <div class="feature-icon">
                    📊
                </div>

                <h3>
                    Monitoring
                </h3>

                <p>
                    Memantau jumlah pengaduan yang masih
                    menunggu, sedang diproses, dan telah selesai.
                </p>

            </div>


            <div class="feature-card">

                <div class="feature-icon">
                    📈
                </div>

                <h3>
                    Rekapitulasi
                </h3>

                <p>
                    Menyajikan grafik dan informasi statistik
                    untuk membantu evaluasi pelayanan pelanggan.
                </p>

            </div>

        </div>

    </section>


    <!-- ================= CTA ================= -->

    <section class="cta" id="layanan">

        <h2>
            Pantau Pengaduan Pelanggan dengan Lebih Mudah
        </h2>

        <p>
            Akses dashboard monitoring untuk melihat kondisi
            pengaduan pelanggan secara terintegrasi.
        </p>

        <a href="/dashboard" class="btn-primary">
            Buka Dashboard
        </a>

    </section>


    <!-- ================= FOOTER ================= -->

    <footer id="kontak">

        <p>
            © 2026 PLN ULP Dukuh Kupang.
            Sistem Monitoring Pengaduan Pelayanan Pelanggan.
        </p>

    </footer>

</body>
</html>
