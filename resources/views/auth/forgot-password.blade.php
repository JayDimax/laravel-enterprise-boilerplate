<x-guest-layout variant="forgot">
    <header class="mb-6"><h1 class="text-2xl font-semibold tracking-tight text-[#073b40]">{{ __('Forgot your password?') }}</h1></header>
    <div class="mb-6 rounded-lg border border-orange-200 bg-orange-50 p-4 text-sm leading-6 text-amber-900">{{ __('Enter your email address and we’ll send you a secure link to choose a new password.') }}</div>
    <x-auth-session-status class="mb-5 rounded-lg border border-emerald-200 bg-emerald-50 p-3 text-sm text-emerald-800" :status="session('status')" />
    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">@csrf
        <div><x-input-label for="email" :value="__('Email address')" class="mb-2 font-medium text-[#073b40]" /><div class="relative"><span class="auth-input-icon pointer-events-none absolute inset-y-0 left-0 grid w-12 place-items-center text-[#073b40]" aria-hidden="true">@</span><x-text-input id="email" class="block h-[52px] w-full rounded-lg border-slate-300 pl-14" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" /></div><x-input-error :messages="$errors->get('email')" class="mt-2" /></div>
        <button class="h-12 w-full rounded-lg bg-[#073b40] px-5 font-medium text-white transition hover:bg-[#032d32] focus:outline-none focus:ring-2 focus:ring-[#ff7f45] focus:ring-offset-2" type="submit">{{ __('Send reset link') }}</button>
    </form>
    <p class="mt-6 text-center text-sm"><a href="{{ route('login') }}" class="font-medium text-[#073b40] underline decoration-[#ff7f45] decoration-2 underline-offset-4">← {{ __('Back to log in') }}</a></p>
</x-guest-layout>
