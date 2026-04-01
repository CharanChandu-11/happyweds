<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        :root {
            --primary: #6A0DAD; /* Deep red from Sitara website */
            --secondary: #F5C542; /* Gold accent */
            --accent: #2C003E; /* Dark slate */
            --light: #F3EFFA; /* Off-white background */
            --text: #2A2A2A; /* Dark text */
        }

        body {
            background: linear-gradient(135deg, #f9f9f9 0%, #f0f0f0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            max-width: 1200px;
            margin: 0 auto;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .login-left {
            background: linear-gradient(135deg, var(--primary) 0%, #320553 100%);
            color: white;
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(212, 175, 55, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            z-index: 1;
        }

        .login-left-content {
            position: relative;
            z-index: 2;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            background: rgb(247 247 247);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
            backdrop-filter: blur(10px);
            overflow: hidden;
        }

        .logo-text {
            font-size: 28px;
            font-weight: 700;
        }

        .logo-text span {
            color: var(--secondary);
        }

        .welcome-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .welcome-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .features-list {
            list-style: none;
            padding: 0;
            margin-top: 40px;
        }

        .features-list li {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            font-size: 1rem;
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary);
            font-size: 18px;
        }

        .login-right {
            background: white;
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .login-subtitle {
            color: var(--accent);
            font-size: 1rem;
        }

        .form-control {
            padding: 12px 15px;
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s;
            margin-bottom: 20px;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(139, 0, 0, 0.15);
        }

        .form-label {
            font-weight: 600;
            color: var(--accent);
            margin-bottom: 8px;
        }

        .btn-login {
            background: var(--primary);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
            width: 100%;
            margin-top: 10px;
        }

        .btn-login:hover {
            background: #320553;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 0, 0, 0.3);
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .form-check-label {
            color: var(--accent);
        }

        .forgot-password {
            color: var(--primary);
            text-decoration: none;
            transition: color 0.3s;
        }

        .forgot-password:hover {
            color: #320553;
            text-decoration: underline;
        }

        .heart-decoration {
            position: absolute;
            bottom: -40px;
            right: -40px;
            width: 150px;
            height: 150px;
            background: rgba(255, 0, 80, 1);
            transform: rotate(-90deg);
            animation: heart-pulse 2s ease-in-out infinite;
            border-radius: 20px;
        }
        
        /* inner heart */
        .heart-decoration::before,
        .heart-decoration::after {
            content: '';
            position: absolute;
            width: 150px;
            height: 150px;
            background: rgba(255, 0, 80, 1);
            border-radius: 50%;
        }
        
        /* left circle */
        .heart-decoration::before {
            top: -75px;
            left: 0px;
        }
        
        /* right circle */
        .heart-decoration::after {
            left: 75px;
            top: 0px;
        }
        
        
        /* heartbeat pulse */
        @keyframes heart-pulse {
            0%, 100% { transform: scale(1) rotate(-90deg); }
            50% { transform: scale(1.15) rotate(-90deg); }
        }


        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .login-left {
                padding: 40px 30px;
            }
            
            .login-right {
                padding: 40px 30px;
            }
            
            .welcome-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 768px) {
            .login-container {
                border-radius: 10px;
            }
            
            .welcome-title {
                font-size: 1.8rem;
            }
            
            .login-title {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row login-container">
            <!-- Left Side - Branding & Information -->
            <div class="col-lg-6 login-left">
                <div class="heart-decoration"></div>
                <div class="login-left-content">
                    
                    <h1 class="welcome-title"><i class="fas fa-heart me-2"></i> Welcome Back</h1>
                    <p class="welcome-subtitle">Sign in to your account</p>
                    
                    <ul class="features-list">
                        <li>
                            <div class="feature-icon">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <span>100% Verified & Trusted Profiles</span>
                        </li>
                    
                        <li>
                            <div class="feature-icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <span>Smart Matchmaking Based on Preferences</span>
                        </li>
                    
                        <li>
                            <div class="feature-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <span>Detailed Family & Background Information</span>
                        </li>
                    
                        <li>
                            <div class="feature-icon">
                                <i class="fas fa-image"></i>
                            </div>
                            <span>Multiple Photos Upload & View</span>
                        </li>
                    
                        <li>
                            <div class="feature-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <span>Advanced Profile Search & Filters</span>
                        </li>
                    
                        <li>
                            <div class="feature-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <span>Direct Contact & Communication Options</span>
                        </li>
                    </ul>

                </div>
            </div>
            
            <!-- Right Side - Login Form -->
            <div class="col-lg-6 login-right">
                <div class="login-header">
                    <h2 class="login-title">Account Login</h2>
                    <p class="login-subtitle">Enter your credentials to access the system</p>
                </div>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
                        
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
                        
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-login">
                            <i class="fas fa-sign-in-alt me-2"></i>{{ __('Login') }}
                        </button>
                    </div>
                    
                    <div class="text-center mt-3">
                        @if (Route::has('password.request'))
                            <a class="forgot-password" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Simple animation for form elements
        document.addEventListener('DOMContentLoaded', function() {
            const formControls = document.querySelectorAll('.form-control');
            
            formControls.forEach(control => {
                control.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                control.addEventListener('blur', function() {
                    if (this.value === '') {
                        this.parentElement.classList.remove('focused');
                    }
                });
            });
            
            // Add animation to login button
            const loginBtn = document.querySelector('.btn-login');
            loginBtn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            loginBtn.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>