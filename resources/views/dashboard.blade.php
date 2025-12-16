<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Clazzy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        .navbar {
            background-color: #e0e0e0;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.8rem;
            font-weight: bold;
        }

        .logo-icon {
            background: linear-gradient(135deg, #0891b2 0%, #06b6d4 100%);
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .user-name {
            font-weight: 600;
        }

        .btn {
            padding: 0.6rem 1.5rem;
            border: 2px solid #00bcd4;
            border-radius: 8px;
            background: white;
            color: #00bcd4;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn:hover {
            background: #00bcd4;
            color: white;
        }

        .btn-logout {
            background: #d32f2f;
            color: white;
            border-color: #d32f2f;
        }

        .btn-logout:hover {
            background: #c62828;
            border-color: #c62828;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .welcome-section {
            background: linear-gradient(135deg, #9333ea 0%, #a855f7 100%);
            color: white;
            padding: 3rem;
            border-radius: 12px;
            margin-bottom: 2rem;
        }

        .welcome-section h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .welcome-section p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }

        .alert-success {
            background: #e8f5e9;
            color: #2e7d32;
            border: 1px solid #4caf50;
        }

        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card-icon {
            font-size: 2.5rem;
            color: #9333ea;
            margin-bottom: 1rem;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .card-text {
            color: #666;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                gap: 1rem;
            }

            .dashboard-cards {
                grid-template-columns: 1fr;
            }

            .welcome-section h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <div class="logo-icon">C</div>
            <span>Clazzy</span>
        </div>
        <div class="user-info">
            <span class="user-name">Selamat datang, {{ auth()->user()->name }}!</span>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="welcome-section">
            <h1>Selamat Datang, {{ auth()->user()->name }}!</h1>
            <p>Anda telah berhasil login ke aplikasi Clazzy</p>
        </div>

        <div class="dashboard-cards">
            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="card-title">Mata Kuliah</div>
                <div class="card-text">Lihat semua mata kuliah Anda</div>
            </div>

            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <div class="card-title">Tugas</div>
                <div class="card-text">Daftar tugas yang harus dikerjakan</div>
            </div>

            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="card-title">Nilai</div>
                <div class="card-text">Lihat perkembangan akademik Anda</div>
            </div>
        </div>

        <div class="card">
            <h2>Informasi Akun</h2>
            <table style="width: 100%; margin-top: 1rem;">
                <tr>
                    <td style="text-align: left; padding: 0.5rem;"><strong>Nama:</strong></td>
                    <td style="text-align: left; padding: 0.5rem;">{{ auth()->user()->name }}</td>
                </tr>
                <tr>
                    <td style="text-align: left; padding: 0.5rem;"><strong>Email:</strong></td>
                    <td style="text-align: left; padding: 0.5rem;">{{ auth()->user()->email }}</td>
                </tr>
                <tr>
                    <td style="text-align: left; padding: 0.5rem;"><strong>Terdaftar sejak:</strong></td>
                    <td style="text-align: left; padding: 0.5rem;">{{ auth()->user()->created_at->format('d F Y') }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
