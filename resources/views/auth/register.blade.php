<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="field">
            <label for="name">Nama Lengkap</label>
            <input id="name" type="text" name="name"
                value="{{ old('name') }}"
                placeholder="Nama lengkap kamu"
                required autofocus autocomplete="name" />
            @error('name')<p class="error-msg">{{ $message }}</p>@enderror
        </div>

        <div class="field">
            <label for="email">Email</label>
            <input id="email" type="email" name="email"
                value="{{ old('email') }}"
                placeholder="contoh@email.com"
                required autocomplete="username" />
            @error('email')<p class="error-msg">{{ $message }}</p>@enderror
        </div>

        <div class="field">
            <label for="password">Password</label>
            <input id="password" type="password" name="password"
                placeholder="••••••••"
                required autocomplete="new-password" />
            @error('password')<p class="error-msg">{{ $message }}</p>@enderror
        </div>

        <div class="field">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                placeholder="••••••••"
                required autocomplete="new-password" />
            @error('password_confirmation')<p class="error-msg">{{ $message }}</p>@enderror
        </div>

        <button type="submit" class="btn-login">Daftar</button>

        <div class="forgot">
            <a href="{{ route('login') }}">Sudah punya akun? Masuk</a>
        </div>
    </form>
</x-guest-layout>