<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="field">
            <label for="email">Email</label>
            <input id="email" type="email" name="email"
                value="{{ old('email') }}"
                placeholder="contoh@email.com"
                required autofocus autocomplete="username" />
            @error('email')<p class="error-msg">{{ $message }}</p>@enderror
        </div>
        <div class="field">
            <label for="password">Password</label>
            <input id="password" type="password" name="password"
                placeholder="••••••••"
                required autocomplete="current-password" />
            @error('password')<p class="error-msg">{{ $message }}</p>@enderror
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
    </form>
</x-guest-layout>