<x-guest-layout>
<style>
* { box-sizing: border-box; margin: 0; padding: 0; }

body {
    background: #1a0a0a;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Segoe UI', sans-serif;
}

.login-card {
    background: #fff;
    border-radius: 16px;
    padding: 2.5rem;
    width: 100%;
    max-width: 400px;
    margin: 2rem auto;
}

.logo { text-align: center; margin-bottom: 1.5rem; }

.logo-icon {
    width: 56px; height: 56px;
    background: #c0392b;
    border-radius: 12px;
    margin: 0 auto 0.75rem;
    display: flex; align-items: center; justify-content: center;
}

.logo-icon svg { width: 28px; height: 28px; stroke: #f5c518; fill: none; stroke-width: 2; }

.logo h1 { font-size: 22px; font-weight: 600; color: #1a0a0a; }
.logo p  { font-size: 13px; color: #888; margin-top: 4px; }

.divider {
    height: 3px;
    background: linear-gradient(90deg, #c0392b, #f5c518, #c0392b);
    border-radius: 2px;
    margin-bottom: 1.75rem;
}

.field { margin-bottom: 1rem; }
.field label { display: block; font-size: 13px; font-weight: 500; color: #444; margin-bottom: 6px; }
.field input {
    width: 100%; height: 42px;
    border: 1px solid #e0d5c5;
    border-radius: 8px;
    padding: 0 14px;
    font-size: 14px; color: #1a0a0a;
    outline: none; transition: border 0.2s;
}
.field input:focus {
    border-color: #c0392b;
    box-shadow: 0 0 0 3px rgba(192,57,43,0.12);
}

.remember { display: flex; align-items: center; gap: 8px; margin: 0.75rem 0 1.25rem; }
.remember input[type=checkbox] { accent-color: #c0392b; width: 15px; height: 15px; }
.remember span { font-size: 13px; color: #666; }

.btn-login {
    width: 100%; height: 44px;
    background: #c0392b; color: #f5c518;
    border: none; border-radius: 8px;
    font-size: 15px; font-weight: 600;
    cursor: pointer; letter-spacing: 0.5px;
    transition: background 0.2s;
}
.btn-login:hover { background: #a93226; }

.forgot { text-align: center; margin-top: 1rem; }
.forgot a { font-size: 13px; color: #c0392b; text-decoration: none; }
.forgot a:hover { text-decoration: underline; }

.motif { display: flex; justify-content: center; gap: 6px; margin-top: 1.5rem; }
.motif span { width: 10px; height: 10px; transform: rotate(45deg); }
.m1,.m3,.m5 { background: #c0392b; }
.m2,.m4 { background: #f5c518; }

.error-msg { color: #c0392b; font-size: 12px; margin-top: 4px; }
</style>

<div class="login-card">
    <div class="logo">
        <div class="logo-icon">
            <svg viewBox="0 0 24 24"><path d="M3 6h18M3 12h18M3 18h18" stroke-linecap="round"/></svg>
        </div>
        <h1>Toko Ulos</h1>
        <p>Masuk ke akun Anda</p>
    </div>

    <div class="divider"></div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="field">
            <label for="email">Email</label>
            <input id="email" type="email" name="email"
                value="{{ old('email') }}"
                placeholder="contoh@email.com"
                required autofocus autocomplete="username" />
            @error('email')
                <p class="error-msg">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="password">Password</label>
            <input id="password" type="password" name="password"
                placeholder="••••••••"
                required autocomplete="current-password" />
            @error('password')
                <p class="error-msg">{{ $message }}</p>
            @enderror
        </div>

        <div class="remember">
            <input id="remember_me" type="checkbox" name="remember" />
            <span>Ingat saya</span>
        </div>

        <button type="submit" class="btn-login">Masuk</button>

        @if (Route::has('password.request'))
            <div class="forgot">
                <a href="{{ route('password.request') }}">Lupa password?</a>
            </div>
        @endif

        <div class="motif">
            <span class="m1"></span>
            <span class="m2"></span>
            <span class="m3"></span>
            <span class="m4"></span>
            <span class="m5"></span>
        </div>
    </form>
</div>
</x-guest-layout>