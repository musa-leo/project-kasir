<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Kasir</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            margin:0;
            padding:0;
            height:100vh;
            background:linear-gradient(135deg,#111827,#1e3a8a);
            display:flex;
            justify-content:center;
            align-items:center;
            font-family:Arial, Helvetica, sans-serif;
        }

        .login-box{
            width:100%;
            max-width:420px;
            background:white;
            border-radius:24px;
            padding:40px;
            box-shadow:0 10px 30px rgba(0,0,0,0.2);
        }

        .login-title{
            text-align:center;
            font-weight:700;
            color:#111827;
            margin-bottom:10px;
        }

        .login-subtitle{
            text-align:center;
            color:#6b7280;
            margin-bottom:35px;
        }

        .form-label{
            font-weight:600;
            color:#374151;
        }

        .form-control{
            height:50px;
            border-radius:12px;
            border:1px solid #d1d5db;
        }

        .form-control:focus{
            box-shadow:none;
            border-color:#2563eb;
        }

        .login-btn{
            height:50px;
            border-radius:12px;
            font-weight:600;
            background:#2563eb;
            border:none;
            transition:0.3s;
        }

        .login-btn:hover{
            background:#1d4ed8;
        }

        .logo{
            font-size:60px;
            text-align:center;
            margin-bottom:15px;
        }

        .alert{
            border-radius:12px;
        }

        .footer-text{
            text-align:center;
            margin-top:25px;
            color:#9ca3af;
            font-size:14px;
        }

    </style>
</head>

<body>

<div class="login-box">

    <div class="logo">
        🧾
    </div>

    <h2 class="login-title">
        Login Kasir
    </h2>

    <p class="login-subtitle">
        Sistem Informasi Kasir
    </p>

    {{-- ERROR --}}
    @if ($errors->any())

        <div class="alert alert-danger">

            {{ $errors->first() }}

        </div>

    @endif

    {{-- FORM LOGIN --}}
    <form action="{{ route('login') }}" method="POST">

        @csrf

        {{-- EMAIL --}}
        <div class="mb-3">

            <label class="form-label">
                Email
            </label>

            <input
                type="email"
                name="email"
                class="form-control"
                placeholder="Masukkan email"
                required
            >

        </div>

        {{-- PASSWORD --}}
        <div class="mb-4">

            <label class="form-label">
                Password
            </label>

            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Masukkan password"
                required
            >

        </div>

        {{-- BUTTON --}}
        <button type="submit" class="btn btn-primary w-100 login-btn">

            🔐 Login

        </button>

    </form>

    <div class="footer-text">
        © 2026 Kasir App
    </div>

</div>

</body>
</html>