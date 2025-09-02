<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk ke Halaman</title>
    <style>
        /* ======= Reset & Base Styles ======= */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            overflow: hidden;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: url('homepage-background.png') no-repeat center center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            position: relative;
        }
        
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6); /* Overlay hitam dengan opacity 0.6 */
            z-index: 0;
        }

        /* ======= Main Container ======= */
        .main-container {
            width: 100%;
            max-width: 520px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem 1.5rem;
            animation: fadeIn 0.6s ease-out;
            position: relative;
            z-index: 1; /* Memastikan konten berada di atas overlay hitam */
        }

        /* ======= Header Section ======= */
        .header-section {
            text-align: center;
            margin-bottom: 3rem;
            flex-shrink: 0;
            animation: slideUp 0.8s ease-out;
        }

        .logo-container {
            margin-bottom: 2rem;
            position: relative;
        }

        .logo-img {
            width: 90px;
            height: 90px;
            object-fit: contain;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            filter: drop-shadow(0 4px 12px rgba(59, 130, 246, 0.15));
            animation: float 4s ease-in-out infinite;
        }

        .logo-img:hover {
            transform: scale(1.1) rotate(5deg);
            filter: drop-shadow(0 8px 20px rgba(59, 130, 246, 0.25));
        }

        .title-section h1 {
            font-size: clamp(1.25rem, 3.5vw, 1.625rem);
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.5rem;
            letter-spacing: -0.02em;
            line-height: 1.2;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .title-section .acronym {
            font-size: 1.25rem;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 1rem;
            opacity: 0.9;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .tagline {
            font-size: 0.9rem;
            font-weight: 400;
            color: #ffffff;
            line-height: 1.5;
            max-width: 300px;
            margin: 0 auto;
            opacity: 0.8;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        /* ======= Menu Section ======= */
        .menu-section {
            width: 100%;
            flex: 1;
            display: flex;
            align-items: center;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            width: 100%;
            animation: slideUp 0.8s ease-out 0.2s both;
        }

        .menu-item {
            background: #ffffff;
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 16px;
            padding: 1.25rem 1.5rem;
            text-decoration: none;
            color: #1e293b;
            font-weight: 500;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .menu-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.1), transparent);
            transition: left 0.6s ease;
        }

        .menu-item:hover::before {
            left: 100%;
        }

        .menu-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.15);
            border-color: rgba(59, 130, 246, 0.2);
            color: #1e293b;
        }

        .menu-item:active {
            transform: translateY(-1px);
            transition: transform 0.1s;
        }

        .menu-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            border: 2px solid #93c5fd;
            border-radius: 12px;
            color: #1e40af;
            font-size: 1rem;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .menu-item:hover .menu-icon {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: #ffffff;
            transform: scale(1.05);
            border-color: #2563eb;
        }

        .menu-text {
            flex: 1;
            text-align: left;
            line-height: 1.4;
        }

        /* ======= Footer ======= */
        .footer {
            color: #ffffff;
            font-size: 0.75rem;
            font-weight: 400;
            text-align: center;
            margin-top: 2rem;
            flex-shrink: 0;
            opacity: 0.7;
            animation: fadeIn 1s ease-out 0.5s both;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        /* ======= Animations ======= */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }

        /* ======= Responsive Design ======= */
        @media (max-width: 520px) {
            .menu-grid {
                grid-template-columns: 1fr;
                gap: 0.875rem;
            }
            
            .main-container {
                max-width: 420px;
            }
        }

        @media (max-width: 480px) {
            .main-container {
                max-width: 100%;
                padding: 1.5rem 1rem;
            }

            .header-section {
                margin-bottom: 2.5rem;
            }

            .logo-img {
                width: 80px;
                height: 80px;
            }

            .menu-item {
                padding: 1rem 1.25rem;
                font-size: 0.9rem;
                gap: 0.875rem;
            }

            .menu-icon {
                width: 36px;
                height: 36px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 360px) {
            .main-container {
                padding: 1rem 0.75rem;
            }

            .menu-item {
                padding: 0.875rem 1rem;
                gap: 0.75rem;
            }

            .menu-icon {
                width: 32px;
                height: 32px;
                font-size: 0.85rem;
            }
        }

        @media (max-height: 700px) {
            .header-section {
                margin-bottom: 2rem;
            }

            .logo-img {
                width: 75px;
                height: 75px;
            }

            .menu-grid {
                gap: 0.875rem;
            }
        }

        @media (max-height: 600px) {
            .header-section {
                margin-bottom: 1.5rem;
            }

            .logo-img {
                width: 65px;
                height: 65px;
            }

            .menu-item {
                padding: 1rem 1.25rem;
            }

            .menu-grid {
                gap: 0.75rem;
            }

            .footer {
                margin-top: 1.5rem;
            }
        }

        /* ======= Focus states for accessibility ======= */
        .menu-item:focus {
            outline: 2px solid #3b82f6;
            outline-offset: 2px;
        }

        /* ======= Reduced motion support ======= */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
            
            .logo-img {
                animation: none;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="header-section">
            <div class="logo-container">
                <img src="logo.png" alt="Logo" class="logo-img">
            </div>
            <div class="title-section">
                <h1>Selamat Datang</h1>
                <div class="acronym">Akses Halaman Khusus</div>
                <div class="tagline">Silakan masukkan password untuk melanjutkan.</div>
            </div>
        </div>

        <div class="menu-section">
            <form onsubmit="return checkPassword()" style="width: 100%;">
                <div class="menu-grid">
                    <div class="menu-item" style="grid-column: span 2;">
                        <div class="menu-icon">🔒</div>
                        <input type="password" id="password" placeholder="Masukkan Password" required 
                               style="border: none; background: transparent; width: 100%; font-size: 1rem;">
                    </div>
                    <div class="menu-item" style="grid-column: span 2; justify-content: center;">
                        <button type="submit" 
                                style="all: unset; cursor: pointer; color: inherit; font-weight: 600;">
                            🔐 Masuk
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="footer">© <?= date('Y') ?> Sistem Akses Halaman</div>
    </div>

    <script>
        function checkPassword() {
            const input = document.getElementById("password").value;
            const correctPassword = "inioperator123"; // Ganti dengan password yang kamu inginkan

            if (input === correctPassword) {
                window.location.href = "index_admin.php"; // Tujuan jika benar
                return false;
            } else {
                alert("Password salah!");
                return false;
            }
        }
    </script>
</body>
</html>
