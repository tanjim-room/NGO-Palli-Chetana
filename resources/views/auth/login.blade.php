<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login — Palli Chetana</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}

        :root {
            --green: #2a8547;
            --green-dark: #1f6b38;
            --navy: #1b2a6b;
            --red: #e53935;
            --bg-start: #e8f5e9;
            --bg-end: #c8e6c9;
            --card-bg: #ffffff;
            --text-primary: #1a1a2e;
            --text-secondary: #555;
            --border: #dce5dc;
            --input-bg: #f7faf7;
            --shadow: 0 20px 60px rgba(42,133,71,.15), 0 8px 24px rgba(0,0,0,.08);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--bg-start) 0%, var(--bg-end) 50%, #a5d6a7 100%);
            position: relative;
            overflow: hidden;
        }

        /* Animated background shapes */
        .bg-shapes {
            position: fixed;
            inset: 0;
            z-index: 0;
            overflow: hidden;
            pointer-events: none;
        }
        .bg-shapes span {
            position: absolute;
            border-radius: 50%;
            opacity: .07;
            animation: floatShape 18s ease-in-out infinite;
        }
        .bg-shapes span:nth-child(1) {
            width: 400px; height: 400px;
            background: var(--green);
            top: -100px; left: -100px;
            animation-duration: 20s;
        }
        .bg-shapes span:nth-child(2) {
            width: 300px; height: 300px;
            background: var(--navy);
            bottom: -80px; right: -80px;
            animation-duration: 24s;
            animation-delay: -5s;
        }
        .bg-shapes span:nth-child(3) {
            width: 200px; height: 200px;
            background: var(--green);
            top: 50%; right: 10%;
            animation-duration: 16s;
            animation-delay: -8s;
        }
        .bg-shapes span:nth-child(4) {
            width: 150px; height: 150px;
            background: var(--navy);
            top: 20%; left: 15%;
            animation-duration: 22s;
            animation-delay: -3s;
        }

        @keyframes floatShape {
            0%, 100% { transform: translateY(0) rotate(0deg) scale(1); }
            33% { transform: translateY(-30px) rotate(120deg) scale(1.05); }
            66% { transform: translateY(20px) rotate(240deg) scale(.95); }
        }

        /* Login container */
        .login-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 460px;
            padding: 20px;
            animation: slideUp .6s cubic-bezier(.22,1,.36,1) both;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-card {
            background: var(--card-bg);
            border-radius: 24px;
            box-shadow: var(--shadow);
            padding: 48px 40px 40px;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        /* Top accent bar */
        .login-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--green), var(--navy), var(--red));
            border-radius: 24px 24px 0 0;
        }

        /* Logo area */
        .logo-area {
            text-align: center;
            margin-bottom: 8px;
        }
        .logo-area img {
            width: 80px;
            height: 80px;
            object-fit: contain;
            border-radius: 18px;
            background: linear-gradient(135deg, var(--green), var(--navy));
            padding: 10px;
            box-shadow: 0 8px 24px rgba(42,133,71,.2);
            animation: logoPulse 3s ease-in-out infinite;
        }

        @keyframes logoPulse {
            0%, 100% { box-shadow: 0 8px 24px rgba(42,133,71,.2); }
            50% { box-shadow: 0 12px 36px rgba(42,133,71,.35); }
        }

        .logo-area h1 {
            font-size: 22px;
            font-weight: 700;
            color: var(--text-primary);
            margin-top: 16px;
            letter-spacing: -.3px;
        }
        .logo-area p {
            font-size: 14px;
            color: var(--text-secondary);
            margin-top: 4px;
        }

        /* Divider */
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--border), transparent);
            margin: 24px 0;
        }

        /* Form styles */
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 8px;
            transition: color .3s;
        }
        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }
        .input-wrapper .input-icon {
            position: absolute;
            left: 16px;
            font-size: 18px;
            color: #999;
            transition: color .3s;
            z-index: 2;
        }
        .input-wrapper input {
            width: 100%;
            padding: 14px 48px 14px 48px;
            border: 2px solid var(--border);
            border-radius: 14px;
            font-size: 15px;
            font-family: inherit;
            background: var(--input-bg);
            color: var(--text-primary);
            outline: none;
            transition: all .3s ease;
        }
        .input-wrapper input:focus {
            border-color: var(--green);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(42,133,71,.1);
        }
        .input-wrapper input:focus ~ .input-icon,
        .input-wrapper input:focus + .input-icon {
            color: var(--green);
        }
        .input-wrapper input::placeholder {
            color: #aaa;
        }

        /* Password toggle */
        .toggle-password {
            position: absolute;
            right: 16px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
            color: #999;
            transition: color .3s;
            z-index: 2;
            padding: 4px;
        }
        .toggle-password:hover {
            color: var(--green);
        }

        /* Validation error */
        .error-text {
            display: block;
            color: var(--red);
            font-size: 12px;
            margin-top: 6px;
            font-weight: 500;
            animation: shakeError .4s ease;
        }

        @keyframes shakeError {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-6px); }
            50% { transform: translateX(6px); }
            75% { transform: translateX(-4px); }
        }

        /* Remember & Forgot */
        .extras-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 8px;
        }

        .custom-check {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            font-size: 13px;
            color: var(--text-secondary);
            user-select: none;
        }
        .custom-check input[type="checkbox"] {
            display: none;
        }
        .checkmark {
            width: 20px;
            height: 20px;
            border: 2px solid var(--border);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .25s ease;
            flex-shrink: 0;
        }
        .checkmark i {
            font-size: 12px;
            color: #fff;
            opacity: 0;
            transform: scale(0);
            transition: all .25s ease;
        }
        .custom-check input:checked + .checkmark {
            background: var(--green);
            border-color: var(--green);
        }
        .custom-check input:checked + .checkmark i {
            opacity: 1;
            transform: scale(1);
        }

        .forgot-link {
            font-size: 13px;
            color: var(--green);
            text-decoration: none;
            font-weight: 500;
            transition: color .3s;
        }
        .forgot-link:hover {
            color: var(--green-dark);
            text-decoration: underline;
        }

        /* Submit button */
        .btn-login {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 14px;
            font-size: 16px;
            font-weight: 600;
            font-family: inherit;
            color: #fff;
            background: linear-gradient(135deg, var(--green), var(--green-dark));
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all .3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 4px 16px rgba(42,133,71,.3);
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(42,133,71,.4);
        }
        .btn-login:active {
            transform: translateY(0);
            box-shadow: 0 2px 8px rgba(42,133,71,.3);
        }
        .btn-login .btn-ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,.3);
            transform: scale(0);
            animation: ripple .6s linear;
            pointer-events: none;
        }
        @keyframes ripple {
            to { transform: scale(4); opacity: 0; }
        }

        .btn-login .spinner {
            display: none;
            width: 20px; height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin .7s linear infinite;
        }
        .btn-login.loading .spinner { display: block; }
        .btn-login.loading .btn-text { display: none; }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Footer */
        .login-footer {
            text-align: center;
            margin-top: 24px;
            font-size: 12px;
            color: var(--text-secondary);
        }
        .login-footer a {
            color: var(--green);
            text-decoration: none;
            font-weight: 500;
        }
        .login-footer a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .login-card {
                padding: 36px 24px 32px;
                border-radius: 20px;
            }
            .logo-area img {
                width: 64px;
                height: 64px;
            }
            .logo-area h1 {
                font-size: 19px;
            }
        }
    </style>
</head>
<body>

    {{-- Animated background shapes --}}
    <div class="bg-shapes">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="login-wrapper">
        <div class="login-card">

            {{-- Logo --}}
            <div class="logo-area">
                <img src="{{ asset('images/application/'.application()->main_logo) }}" alt="Palli Chetana Logo">
                <h1>Palli Chetana</h1>
                <p>Admin Panel — Sign in to continue</p>
            </div>

            <div class="divider"></div>

            {{-- Alerts --}}
            @if(session('status'))
                <div style="background:#e8f5e9;color:#2a8547;padding:12px 16px;border-radius:12px;font-size:13px;margin-bottom:16px;font-weight:500;">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Login Form --}}
            <form action="{{ route('login') }}" method="POST" id="loginForm" autocomplete="off">
                @csrf

                {{-- Email --}}
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-wrapper">
                        <i class="bi bi-envelope input-icon"></i>
                        <input type="email"
                               name="email"
                               id="email"
                               placeholder="admin@pallichetana.org"
                               value="{{ old('email') }}"
                               required
                               autofocus>
                    </div>
                    @error('email')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <i class="bi bi-lock input-icon"></i>
                        <input type="password"
                               name="password"
                               id="password"
                               placeholder="Enter your password"
                               required>
                        <button type="button" class="toggle-password" onclick="togglePass()" aria-label="Toggle password visibility">
                            <i class="bi bi-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                    @error('password')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Remember & Forgot --}}
                <div class="extras-row">
                    <label class="custom-check">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="checkmark"><i class="bi bi-check2"></i></span>
                        Remember me
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">Forgot Password?</a>
                    @endif
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn-login" id="loginBtn">
                    <div class="spinner"></div>
                    <span class="btn-text">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Sign In
                    </span>
                </button>
            </form>

            {{-- Footer --}}
            <div class="login-footer">
                <a href="{{ url('/') }}"><i class="bi bi-arrow-left"></i> Back to website</a>
                <br><br>
                &copy; {{ date('Y') }} Palli Chetana. All rights reserved.
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePass() {
            const input = document.getElementById('password');
            const icon = document.getElementById('eyeIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }

        // Ripple effect on button
        document.getElementById('loginBtn').addEventListener('mousedown', function(e) {
            const btn = this;
            const ripple = document.createElement('span');
            ripple.classList.add('btn-ripple');
            const rect = btn.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
            ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
            btn.appendChild(ripple);
            setTimeout(() => ripple.remove(), 600);
        });

        // Loading state on submit
        document.getElementById('loginForm').addEventListener('submit', function() {
            const btn = document.getElementById('loginBtn');
            btn.classList.add('loading');
            btn.disabled = true;
        });

        // Interactive focus glow on input icons
        document.querySelectorAll('.input-wrapper input').forEach(input => {
            const icon = input.parentElement.querySelector('.input-icon');
            input.addEventListener('focus', () => { if(icon) icon.style.color = '#2a8547'; });
            input.addEventListener('blur', () => { if(icon) icon.style.color = '#999'; });
        });
    </script>
</body>
</html>
