<x-guest-layout>
    <!-- Ajout du CDN Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles personnalisés pour le design WhatsApp -->
    <style>
        body {
            background: linear-gradient(135deg, #ECE5DD 0%, #D3D3D3 100%);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }
        h2 {
            color: #075E54;
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-whatsapp {
            background: #25D366;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-whatsapp:hover {
            background: #20c058;
            transform: translateY(-2px);
        }
        .form-control {
            border-radius: 10px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .text-muted {
            color: #075E54 !important;
        }
        .text-muted:hover {
            color: #25D366 !important;
        }
        .alert {
            border-radius: 10px;
            background: #f8d7da;
            color: #721c24;
        }
    </style>

    <div class="login-container">
        <h2><i class="fas fa-sign-in-alt me-2"></i> Connexion</h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 alert" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-muted">
                    <i class="fas fa-envelope me-1"></i> {{ __('Email') }}
                </x-input-label>
                <x-text-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-muted">
                    <i class="fas fa-lock me-1"></i> {{ __('Password') }}
                </x-input-label>
                <x-text-input id="password" class="block mt-1 w-full form-control"
                              type="password"
                              name="password"
                              required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600"><i class="fas fa-check me-1"></i> {{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Boutons et lien Mot de passe oublié -->
            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-muted hover:text-muted" href="{{ route('password.request') }}">
                        <i class="fas fa-question-circle me-1"></i> {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="btn-whatsapp">
                    <i class="fas fa-sign-in-alt me-2"></i> {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
