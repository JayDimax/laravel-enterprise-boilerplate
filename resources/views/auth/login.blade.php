<x-guest-layout variant="login">
    <header class="mb-7">
        <h1 class="text-2xl font-semibold tracking-tight text-[#073b40]">{{ __('Log in to your account') }}</h1>
        <p class="mt-2 text-sm leading-6 text-slate-600">{{ __('Welcome back. Enter your credentials to continue.') }}</p>
    </header>

    <x-auth-session-status class="mb-5 rounded-lg border border-emerald-200 bg-emerald-50 p-3 text-sm text-emerald-800" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf
        <div>
            <x-input-label for="email" :value="__('Email address')" class="mb-2 font-medium text-[#073b40]" />
            <div class="relative">
                <span class="auth-input-icon pointer-events-none absolute inset-y-0 left-0 grid w-12 place-items-center text-[#073b40]" aria-hidden="true">@</span>
                <x-text-input id="email" class="block h-[52px] w-full rounded-lg border-slate-300 pl-14" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="password" :value="__('Password')" class="mb-2 font-medium text-[#073b40]" />
            <div class="relative">
                <span class="auth-input-icon pointer-events-none absolute inset-y-0 left-0 grid w-12 place-items-center text-[#073b40]" aria-hidden="true">●</span>
                <x-text-input id="password" class="block h-[52px] w-full rounded-lg border-slate-300 pl-14" type="password" name="password" required autocomplete="current-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="flex items-center justify-between gap-4 text-sm">
            <label for="remember_me" class="inline-flex items-center gap-2 text-slate-700"><input id="remember_me" type="checkbox" class="rounded border-slate-300 text-[#073b40] focus:ring-[#ff7f45]" name="remember">{{ __('Remember me') }}</label>
            @if (Route::has('password.request'))<a class="font-medium text-[#073b40] underline decoration-[#ff7f45] decoration-2 underline-offset-4 hover:text-[#ff7f45] focus:outline-none focus:ring-2 focus:ring-[#ff7f45]" href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a>@endif
        </div>
        <button class="h-12 w-full rounded-lg bg-[#073b40] px-5 font-medium text-white transition hover:bg-[#032d32] focus:outline-none focus:ring-2 focus:ring-[#ff7f45] focus:ring-offset-2" type="submit">{{ __('Log in') }}</button>
    </form>
    @if (Route::has('register'))<p class="mt-6 text-center text-sm text-slate-600">{{ __('Don’t have an account?') }} <a href="{{ route('register') }}" class="font-medium text-[#073b40] underline decoration-[#ff7f45] decoration-2 underline-offset-4">{{ __('Create one') }}</a></p>@endif
</x-guest-layout>
