<x-guest-layout>
    <div class="mb-8 text-center uppercase tracking-[0.2em]">
        <h2 class="text-2xl font-black text-gray-800">Daftar Akun</h2>
        <div class="w-12 h-1 bg-olive mx-auto mt-2"></div>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Nama Lengkap</label>
            <input id="name" class="block w-full px-4 py-3 rounded-xl border-gray-100 bg-gray-50 focus:border-olive focus:ring-olive transition-all" type="text" name="name" :value="old('name')" required autofocus placeholder="Masukan nama lengkap" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Alamat Email</label>
            <input id="email" class="block w-full px-4 py-3 rounded-xl border-gray-100 bg-gray-50 focus:border-olive focus:ring-olive transition-all" type="email" name="email" :value="old('email')" required placeholder="nama@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Kata Sandi</label>
            <input id="password" class="block w-full px-4 py-3 rounded-xl border-gray-100 bg-gray-50 focus:border-olive focus:ring-olive transition-all"
                type="password"
                name="password"
                required placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Konfirmasi Sandi</label>
            <input id="password_confirmation" class="block w-full px-4 py-3 rounded-xl border-gray-100 bg-gray-50 focus:border-olive focus:ring-olive transition-all"
                type="password"
                name="password_confirmation" required placeholder="Ulangi sandi" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-6">
            <button type="submit" class="w-full bg-olive text-white py-4 rounded-2xl font-black text-lg hover:shadow-xl hover:-translate-y-1 transition-all active:scale-95 shadow-lg shadow-olive/20 mb-6 uppercase tracking-widest">
                Daftar Akun ✨
            </button>

            <p class="text-center text-sm text-gray-500">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-olive font-bold hover:underline">Masuk di Sini</a>
            </p>
        </div>
    </form>
</x-guest-layout>