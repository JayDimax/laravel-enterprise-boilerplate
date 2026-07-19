@props(['variant' => 'secure'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel Enterprise') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#073b40] font-sans text-[#073b40] antialiased">
    <main class="min-h-screen bg-[#073b40]">
        <section class="grid min-h-screen w-full overflow-hidden bg-[#073b40] lg:grid-cols-[46%_54%]" aria-label="Secure account access">
            <div class="flex items-center bg-white p-6 sm:p-10 lg:m-10 lg:mr-0 lg:rounded-2xl lg:p-12">
                <div class="mx-auto w-full max-w-[460px]">
                    <a href="{{ url('/') }}" class="mb-9 inline-flex items-center gap-3 rounded-md focus:outline-none focus:ring-2 focus:ring-[#ff7f45] focus:ring-offset-4" aria-label="Laravel Enterprise home">
                        <span class="grid h-10 w-10 place-items-center rounded-xl bg-[#ff7f45] text-sm font-semibold tracking-[-.08em] text-white">LE</span>
                        <span class="text-xl font-semibold tracking-tight text-[#073b40]">Laravel Enterprise</span>
                    </a>
                    {{ $slot }}
                </div>
            </div>

            <aside class="relative hidden min-h-screen overflow-hidden bg-[#073b40] lg:flex lg:flex-col lg:items-center lg:justify-center" aria-hidden="true">
                <div class="absolute inset-0 opacity-[.12]" style="background-image:linear-gradient(rgba(255,255,255,.16) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.16) 1px,transparent 1px);background-size:52px 52px"></div>
                <div class="absolute left-[9%] top-[13%] h-28 w-44 rounded-xl border border-white/10 bg-white/5 p-4">
                    <span class="block h-2 w-20 rounded bg-white/20"></span>
                    <span class="mt-5 block h-10 w-10 rounded-full border-8 border-[#ff7f45]/70"></span>
                </div>
                <div class="absolute bottom-[18%] right-[7%] flex h-28 w-48 items-end gap-3 rounded-xl border border-white/10 bg-white/5 p-5">
                    <i class="h-8 w-5 bg-white/15"></i>
                    <i class="h-14 w-5 bg-[#ff7f45]/60"></i>
                    <i class="h-20 w-5 bg-white/20"></i>
                    <i class="h-12 w-5 bg-[#9bd8c5]/50"></i>
                </div>
                <svg class="relative z-10 h-auto w-[72%] max-w-[480px] drop-shadow-2xl" width="480" height="430" viewBox="0 0 480 430" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M87 151C105 56 260 30 344 94c82 62 67 200-8 249-76 49-227 24-266-66-18-43 8-81 17-126Z" fill="#FFF1E9"/>
                    <circle cx="360" cy="116" r="38" fill="#9BD8C5" opacity=".55"/>
                    <rect x="111" y="106" width="258" height="238" rx="22" fill="white"/>
                    <rect x="111" y="106" width="258" height="56" rx="22" fill="#FF7F45"/>
                    <path d="M111 140h258v22H111z" fill="#FF7F45"/>
                    <circle cx="145" cy="134" r="8" fill="#073B40" opacity=".55"/>
                    <rect x="140" y="190" width="92" height="13" rx="6.5" fill="#D8E7E7"/>
                    <rect x="140" y="218" width="200" height="34" rx="8" fill="#F2F6F5" stroke="#D8E7E7"/>
                    <rect x="140" y="270" width="200" height="34" rx="8" fill="#F2F6F5" stroke="#D8E7E7"/>
                    <circle cx="326" cy="193" r="46" fill="#073B40"/>
                    <path d="M310 192v-10c0-22 32-22 32 0v10" stroke="#FF7F45" stroke-width="9" stroke-linecap="round"/>
                    <rect x="302" y="190" width="48" height="40" rx="10" fill="#FF7F45"/>
                    <circle cx="326" cy="207" r="5" fill="#073B40"/>
                    <path d="M326 212v8" stroke="#073B40" stroke-width="4" stroke-linecap="round"/>
                    <rect x="173" y="320" width="134" height="34" rx="8" fill="#FF7F45"/>
                    <path d="m70 318 26 26 45-56" stroke="#9BD8C5" stroke-width="13" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <div class="relative z-10 -mt-5 text-center text-white">
                    <p class="text-xs font-medium uppercase tracking-[.22em] text-[#ffb08a]">{{ $variant === 'register' ? 'Ready for your team' : ($variant === 'forgot' ? 'Recover access safely' : 'Protected enterprise access') }}</p>
                    <p class="mt-2 text-sm text-white/65">Secure authentication · Permission-aware workspace</p>
                </div>
                <p class="absolute bottom-7 z-10 text-xs text-white/55">© {{ date('Y') }} {{ config('app.name', 'Laravel Enterprise') }}</p>
            </aside>
        </section>
    </main>
</body>
</html>
