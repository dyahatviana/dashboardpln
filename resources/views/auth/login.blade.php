<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin | PLN ULP Dukuh Kupang</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;

            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    #0757a8,
                    #087acb,
                    #08a7df
                );
        }

        .login-wrapper {

            width: 900px;
            max-width: 92%;

            min-height: 530px;

            display: grid;
            grid-template-columns: 1fr 1fr;

            background: white;

            border-radius: 25px;

            overflow: hidden;

            box-shadow:
                0 25px 60px rgba(0,0,0,.2);
        }


        /* =====================
           LEFT
        ===================== */

        .login-left {

            background:
                linear-gradient(
                    145deg,
                    #0757a8,
                    #087acb
                );

            color: white;

            padding: 55px 45px;

            display: flex;
            flex-direction: column;
            justify-content: center;

            position: relative;

            overflow: hidden;
        }

        .login-left::before {

            content: "";

            position: absolute;

            width: 300px;
            height: 300px;

            border-radius: 50%;

            background: rgba(255,255,255,.06);

            top: -100px;
            right: -100px;
        }

        .login-left::after {

            content: "";

            position: absolute;

            width: 250px;
            height: 250px;

            border-radius: 50%;

            background: rgba(255,255,255,.05);

            bottom: -100px;
            left: -100px;
        }

        .logo-icon {

            width: 65px;
            height: 65px;

            border-radius: 18px;

            background: white;

            color: #087acb;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 35px;

            margin-bottom: 30px;

            box-shadow:
                0 10px 25px rgba(0,0,0,.15);
        }

        .login-left h1 {

            font-size: 30px;

            line-height: 1.3;

            margin-bottom: 15px;

            position: relative;
            z-index: 2;
        }

        .login-left p {

            font-size: 14px;

            line-height: 1.8;

            color: rgba(255,255,255,.85);

            position: relative;
            z-index: 2;
        }

        .system-name {

            margin-top: 30px;

            padding-top: 20px;

            border-top: 1px solid rgba(255,255,255,.25);

            font-size: 13px;

            position: relative;
            z-index: 2;
        }


        /* =====================
           RIGHT
        ===================== */

        .login-right {

            padding: 55px 50px;

            display: flex;

            flex-direction: column;

            justify-content: center;
        }

        .login-right h2 {

            font-size: 28px;

            color: #172554;

            margin-bottom: 8px;
        }

        .login-subtitle {

            font-size: 13px;

            color: #64748b;

            margin-bottom: 30px;
        }


        /* =====================
           FORM
        ===================== */

        .form-group {

            margin-bottom: 20px;
        }

        .form-group label {

            display: block;

            font-size: 13px;

            font-weight: 600;

            color: #334155;

            margin-bottom: 8px;
        }

        .form-group input {

            width: 100%;

            padding: 13px 15px;

            border: 1px solid #dbe3ec;

            border-radius: 9px;

            font-family: inherit;

            font-size: 13px;

            outline: none;

            transition: .3s;
        }

        .form-group input:focus {

            border-color: #087acb;

            box-shadow:
                0 0 0 3px rgba(8,122,203,.1);
        }

        .error {

            background: #fff1f2;

            border: 1px solid #fecdd3;

            color: #be123c;

            padding: 10px 12px;

            border-radius: 8px;

            font-size: 12px;

            margin-bottom: 20px;
        }

        .login-button {

            width: 100%;

            border: none;

            padding: 14px;

            border-radius: 9px;

            background:
                linear-gradient(
                    135deg,
                    #0757a8,
                    #087acb
                );

            color: white;

            font-family: inherit;

            font-size: 14px;

            font-weight: 600;

            cursor: pointer;

            transition: .3s;
        }

        .login-button:hover {

            transform: translateY(-2px);

            box-shadow:
                0 8px 20px rgba(8,122,203,.25);
        }

        .back-link {

            text-align: center;

            margin-top: 22px;

            font-size: 13px;
        }

        .back-link a {

            color: #087acb;

            text-decoration: none;

            font-weight: 500;
        }

        .back-link a:hover {

            text-decoration: underline;
        }


        /* =====================
           RESPONSIVE
        ===================== */

        @media(max-width: 700px) {

            .login-wrapper {

                grid-template-columns: 1fr;

            }

            .login-left {

                padding: 35px;

                min-height: 250px;
            }

            .login-right {

                padding: 40px 30px;
            }

        }

    </style>

</head>

<body>

    <div class="login-wrapper">


        <!-- LEFT SIDE -->

        <div class="login-left">

            <div class="logo-icon">
                ⚡
            </div>

            <h1>
                PLN ULP<br>
                Dukuh Kupang
            </h1>

            <p>
                Sistem Monitoring Pengaduan
                Pelayanan Pelanggan.
            </p>

            <div class="system-name">

                Dashboard Monitoring Internal

            </div>

        </div>


        <!-- RIGHT SIDE -->

        <div class="login-right">

            <h2>
                Login Admin
            </h2>

            <p class="login-subtitle">
                Silakan masuk untuk mengakses dashboard monitoring.
            </p>


            @if ($errors->any())

                <div class="error">

                    {{ $errors->first() }}

                </div>

            @endif


            <form method="POST" action="/login">

                @csrf


                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Masukkan email admin"
                        value="{{ old('email') }}"
                        required
                        autofocus
                    >

                </div>


                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                    >

                </div>


                <button
                    type="submit"
                    class="login-button"
                >
                    Masuk ke Dashboard
                </button>

            </form>


            <div class="back-link">

                <a href="/">
                    ← Kembali ke halaman utama
                </a>

            </div>

        </div>

    </div>

</body>

</html>
