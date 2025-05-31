<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
        .modern-input, .modern-select {
            background: rgba(248, 250, 252, 0.8);
            border: 2px solid transparent;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .modern-input:focus, .modern-select:focus {
            background: rgba(255, 255, 255, 0.95);
            border-color: #3b82f6;
            outline: none;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            transform: translateY(-1px);
        }
        
        .modern-btn {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .modern-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }
        
        .modern-btn:hover::before {
            left: 100%;
        }
        
        .modern-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(59, 130, 246, 0.4);
        }
        
        .error-alert {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            border: 1px solid #f87171;
            animation: slideDown 0.3s ease-out;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .input-group {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
        }
        
        .input-group:nth-child(1) { animation-delay: 0.1s; }
        .input-group:nth-child(2) { animation-delay: 0.2s; }
        .input-group:nth-child(3) { animation-delay: 0.3s; }
        .input-group:nth-child(4) { animation-delay: 0.4s; }
        .input-group:nth-child(5) { animation-delay: 0.5s; }
        
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .floating-elements::before {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -100px;
            right: -100px;
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-elements::after {
            content: '';
            position: absolute;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            bottom: -75px;
            left: -75px;
            animation: float 8s ease-in-out infinite reverse;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
        }
        
        .role-option {
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .role-option:hover {
            background: rgba(59, 130, 246, 0.1);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center relative overflow-hidden floating-elements py-8">
    <div class="glass-card p-10 rounded-3xl w-full max-w-md fade-in relative z-10">
        <div class="text-center mb-8">
            <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-blue-600 rounded-2xl mx-auto mb-6 flex items-center justify-center transform -rotate-3">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Buat Akun Baru</h1>
            <p class="text-gray-600">Bergabunglah dengan sistem kami</p>
        </div>
        
        @if ($errors->any())
            <div class="error-alert text-red-700 p-4 rounded-2xl mb-6">
                @foreach ($errors->all() as $error)
                    <p class="text-sm">{{ $error }}</p>
                @endforeach
            </div>
        @endif
        
        <form action="{{ route('register') }}" method="POST" class="space-y-5">
            @csrf
            <div class="input-group" style="transform: translateY(20px);">
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                <input type="text" name="name" id="name" 
                       class="modern-input w-full px-4 py-3 rounded-xl text-gray-800 placeholder-gray-400" 
                       placeholder="Masukkan nama lengkap" required>
            </div>
            
            <div class="input-group" style="transform: translateY(20px);">
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                <input type="email" name="email" id="email" 
                       class="modern-input w-full px-4 py-3 rounded-xl text-gray-800 placeholder-gray-400" 
                       placeholder="name@example.com" required>
            </div>
            
            <div class="input-group" style="transform: translateY(20px);">
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                <input type="password" name="password" id="password" 
                       class="modern-input w-full px-4 py-3 rounded-xl text-gray-800 placeholder-gray-400" 
                       placeholder="Minimal 8 karakter" required>
            </div>
            
            <div class="input-group" style="transform: translateY(20px);">
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" 
                       class="modern-input w-full px-4 py-3 rounded-xl text-gray-800 placeholder-gray-400" 
                       placeholder="Ulangi password" required>
            </div>
            
            <div class="input-group" style="transform: translateY(20px);">
                <label for="role" class="block text-sm font-semibold text-gray-700 mb-2">Role</label>
                <select name="role" id="role" class="modern-select w-full px-4 py-3 rounded-xl text-gray-800" required>
                    <option value="admin">Admin</option>
                    <option value="vendor">Vendor</option>
                </select>
            </div>
            
            <button type="submit" class="modern-btn w-full text-white font-semibold py-3 rounded-xl relative overflow-hidden">
                Daftar Sekarang
            </button>
        </form>
        
        <div class="mt-8 text-center">
            <p class="text-gray-600">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 font-semibold hover:underline transition-colors">
                    Masuk Di Sini
                </a>
            </p>
        </div>
    </div>

    <script>
        // Add smooth animations
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.modern-input, .modern-select');
            
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('focused');
                });
            });
            
            // Password strength indicator
            const passwordInput = document.getElementById('password');
            const confirmInput = document.getElementById('password_confirmation');
            
            passwordInput.addEventListener('input', function() {
                const strength = getPasswordStrength(this.value);
                // Add visual feedback based on strength
            });
            
            confirmInput.addEventListener('input', function() {
                if (this.value !== passwordInput.value) {
                    this.style.borderColor = '#ef4444';
                } else {
                    this.style.borderColor = '#10b981';
                }
            });
            
            // Add ripple effect to button
            const button = document.querySelector('.modern-btn');
            button.addEventListener('click', function(e) {
                const rect = this.getBoundingClientRect();
                const ripple = document.createElement('span');
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    background: rgba(255, 255, 255, 0.3);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    pointer-events: none;
                `;
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
        
        function getPasswordStrength(password) {
            let strength = 0;
            if (password.length >= 8) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            return strength;
        }
        
        // CSS for ripple animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>