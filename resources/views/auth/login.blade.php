<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KelasKu | Login</title>

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #002147 0%, #1a365d 50%, #003366 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background elements */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="80" r="3" fill="rgba(255,255,255,0.1)"/><circle cx="40" cy="60" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="90" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="15" cy="80" r="1.5" fill="rgba(255,255,255,0.1)"/></svg>');
            animation: float 20s ease-in-out infinite;
            pointer-events: none;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(30px, -30px) rotate(120deg); }
            66% { transform: translate(-20px, 20px) rotate(240deg); }
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            padding: 0 20px;
            position: relative;
            z-index: 1;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, #002147, #f5d042, #003366);
            padding: 40px 30px 30px;
            text-align: center;
            position: relative;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20"><path d="M0,10 Q25,0 50,10 T100,10 V20 H0 Z" fill="rgba(255,255,255,0.1)"/></svg>');
            background-size: 100% 100%;
        }

        .logo-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .logo-icon i {
            font-size: 2.5rem;
            color: white;
        }

        .card-title {
            color: white;
            font-size: 1.8rem;
            font-weight: 600;
            margin: 0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.95rem;
            margin-top: 8px;
            font-weight: 300;
        }

        .card-body {
            padding: 40px 30px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-control-modern {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            border-radius: 15px;
            padding: 15px 20px 15px 50px;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .form-control-modern:focus {
            background: white;
            border-color: #002147;
            box-shadow: 0 0 0 0.2rem rgba(0, 33, 71, 0.25), 0 4px 20px rgba(0, 0, 0, 0.1);
            outline: none;
        }

        .form-control-modern.is-invalid {
            border-color: #e74c3c;
            box-shadow: 0 0 0 0.2rem rgba(231, 76, 60, 0.25);
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            font-size: 1.1rem;
            z-index: 2;
        }

        .btn-login {
            background: linear-gradient(135deg, #002147, #1a365d, #003366);
            border: none;
            border-radius: 15px;
            padding: 15px;
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 33, 71, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .divider {
            text-align: center;
            margin: 30px 0;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e9ecef;
        }

        .divider span {
            background: white;
            padding: 0 20px;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .back-link {
            text-align: center;
            padding: 20px 30px;
            background: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }

        .back-link a {
            color: #002147;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .back-link a:hover {
            color: #1a365d;
            text-decoration: none;
        }

        .invalid-feedback {
            display: block;
            font-size: 0.875rem;
            color: #e74c3c;
            margin-top: 8px;
            margin-left: 5px;
            font-weight: 500;
        }

        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
        }

        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .shape1 {
            width: 100px;
            height: 100px;
            top: 20%;
            left: 10%;
            animation: floatShape 6s ease-in-out infinite;
        }

        .shape2 {
            width: 150px;
            height: 150px;
            top: 60%;
            right: 15%;
            animation: floatShape 8s ease-in-out infinite reverse;
        }

        .shape3 {
            width: 80px;
            height: 80px;
            bottom: 20%;
            left: 20%;
            animation: floatShape 7s ease-in-out infinite;
        }

        @keyframes floatShape {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        /* Responsive Design */
        @media (max-width: 576px) {
            .login-container {
                padding: 0 15px;
            }
            
            .card-header {
                padding: 30px 20px 25px;
            }
            
            .card-body {
                padding: 30px 20px;
            }
            
            .logo-icon {
                width: 70px;
                height: 70px;
            }
            
            .logo-icon i {
                font-size: 2rem;
            }
            
            .card-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Floating Shapes -->
    <div class="floating-shapes">
        <div class="shape shape1"></div>
        <div class="shape shape2"></div>
        <div class="shape shape3"></div>
    </div>

    <div class="login-container">
        <div class="login-card">
            <!-- Header -->
            <div class="card-header">
                <div class="logo-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h1 class="card-title">KelasKu</h1>
                <p class="card-subtitle">Silakan masuk ke akun Anda</p>
            </div>

            <!-- Body -->
            <div class="card-body">
                <form class="login-form" method="POST" action="{{ route('loginProses') }}">
                    @csrf
                    
                    <div class="form-group">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" 
                               class="form-control form-control-modern @error('email') is-invalid @enderror"
                               placeholder="Masukkan Email Anda" 
                               name="email" 
                               value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" 
                               class="form-control form-control-modern @error('password') is-invalid @enderror"
                               placeholder="Masukkan Password Anda" 
                               name="password">
                        @error('password')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-login">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Masuk Sekarang
                    </button>
                </form>
            </div>

            <!-- Footer -->
            <div class="back-link">
                <i class="fas fa-arrow-left mr-2"></i>
                <a href="{{ route('welcome') }}">Kembali ke Beranda</a>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.all.min.js"></script>

    <!-- SweetAlert2 Sessions -->
    @session('success')
    <script>
        Swal.fire({
            title: "Sukses!",
            text: "{{ session('success') }}",
            icon: "success",
            confirmButtonColor: "#002147",
            background: 'rgba(255, 255, 255, 0.95)',
            backdrop: 'rgba(0, 0, 0, 0.4)',
            showConfirmButton: true,
            timer: 3000
        });
    </script>
    @endsession

    @session('error')
    <script>
        Swal.fire({
            title: "Oops!",
            text: "{{ session('error') }}",
            icon: "error",
            confirmButtonColor: "#e74c3c",
            background: 'rgba(255, 255, 255, 0.95)',
            backdrop: 'rgba(0, 0, 0, 0.4)',
            showConfirmButton: true,
            timer: 4000
        });
    </script>
    @endsession

    <script>
        // Add some interactive animations
        document.addEventListener('DOMContentLoaded', function() {
            // Form input animations
            const inputs = document.querySelectorAll('.form-control-modern');
            
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.querySelector('.input-icon').style.color = '#667eea';
                });
                
                input.addEventListener('blur', function() {
                    if (!this.value) {
                        this.parentElement.querySelector('.input-icon').style.color = '#6c757d';
                    }
                });
            });

            // Card entrance animation
            const loginCard = document.querySelector('.login-card');
            loginCard.style.opacity = '0';
            loginCard.style.transform = 'translateY(30px)';
            
            setTimeout(() => {
                loginCard.style.transition = 'all 0.6s ease';
                loginCard.style.opacity = '1';
                loginCard.style.transform = 'translateY(0)';
            }, 100);
        });
    </script>
</body>

</html>