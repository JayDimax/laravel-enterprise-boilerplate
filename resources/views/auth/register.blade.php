<x-guest-layout variant="register">
    <header class="mb-6"><h1 class="text-2xl font-semibold tracking-tight text-[#073b40]">{{ __('Create your account') }}</h1><p class="mt-2 text-sm leading-6 text-slate-600">{{ __('Set up secure access to your enterprise workspace.') }}</p></header>
    <form method="POST" action="{{ route('register') }}" class="space-y-4">@csrf
        @foreach ([['name','Name','text','name'],['email','Email address','email','username'],['password','Password','password','new-password'],['password_confirmation','Confirm password','password','new-password']] as [$field,$label,$type,$autocomplete])
            <div><x-input-label :for="$field" :value="__($label)" class="mb-2 font-medium text-[#073b40]" /><div class="relative"><span class="auth-input-icon pointer-events-none absolute inset-y-0 left-0 grid w-12 place-items-center text-[#073b40]" aria-hidden="true">{{ $field === 'name' ? '◯' : ($type === 'email' ? '@' : '●') }}</span><x-text-input :id="$field" class="block h-12 w-full rounded-lg border-slate-300 pl-14" :type="$type" :name="$field" :value="in_array($field, ['name','email']) ? old($field) : null" required :autofocus="$field === 'name'" :autocomplete="$autocomplete" /></div><x-input-error :messages="$errors->get($field)" class="mt-2" /></div>
        @endforeach
        <button class="mt-2 h-12 w-full rounded-lg bg-[#073b40] px-5 font-medium text-white transition hover:bg-[#032d32] focus:outline-none focus:ring-2 focus:ring-[#ff7f45] focus:ring-offset-2" type="submit">{{ __('Create account') }}</button>
    </form>
    <p class="mt-5 text-center text-sm text-slate-600">{{ __('Already have an account?') }} <a href="{{ route('login') }}" class="font-medium text-[#073b40] underline decoration-[#ff7f45] decoration-2 underline-offset-4">{{ __('Log in') }}</a></p>
</x-guest-layout>
