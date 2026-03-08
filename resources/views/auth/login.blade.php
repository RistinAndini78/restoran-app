<x-guest-layout>
    <div class="mb-8 text-center uppercase tracking-[0.2em]">
        <h2 class="text-2xl font-black text-gray-800">Masuk Akun</h2>
        <div class="w-12 h-1 bg-olive mx-auto mt-2"></div>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Alamat Email</label>
            <input id="email" class="block w-full px-4 py-3 rounded-xl border-gray-100 bg-gray-50 focus:border-olive focus:ring-olive transition-all" type="email" name="email" :value="old('email')" required autofocus placeholder="nama@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex justify-between items-center mb-2">
                <label for="password" class="block text-xs font-bold text-gray-400 uppercase tracking-widest">Kata Sandi</label>
                @if (Route::has('password.request'))
                <a class="text-[10px] font-bold text-olive hover:underline uppercase tracking-tighter" href="{{ route('password.request') }}">
                    Lupa Sandi?
                </a>
                @endif
            </div>
            <input id="password" class="block w-full px-4 py-3 rounded-xl border-gray-100 bg-gray-50 focus:border-olive focus:ring-olive transition-all"
                type="password"
                name="password"
                required placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded-lg border-gray-300 text-olive shadow-sm focus:ring-olive" name="remember">
                <span class="ms-2 text-sm font-medium text-gray-500">Ingat Saya</span>
            </label>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full bg-olive text-white py-4 rounded-2xl font-black text-lg hover:shadow-xl hover:-translate-y-1 transition-all active:scale-95 shadow-lg shadow-olive/20 mb-6 uppercase tracking-widest">
                Masuk 🤝
            </button>

            <p class="text-center text-sm text-gray-500">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-olive font-bold hover:underline">Daftar Sekarang</a>
            </p>
        </div>
    </form>
</x-guest-layout>