<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ sidebar:false, dark: localStorage.theme === 'dark', notices:false, userMenu:false }" :class="{ 'dark': dark }">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Workspace' }} - {{ config('app.name', 'Laravel Enterprise') }}</title>
    <script>if(localStorage.theme==='dark')document.documentElement.classList.add('dark')</script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-mist text-slate-700 antialiased dark:bg-slate-950 dark:text-slate-100">
@if(session('toast'))<div class="hidden" data-toast data-type="{{ session('toast.type') }}" data-message="{{ session('toast.message') }}"></div>@endif
<div class="min-h-screen min-w-0 max-w-full lg:pl-64">
    <div x-show="sidebar" x-transition.opacity class="fixed inset-0 z-40 bg-slate-950/50 lg:hidden" @click="sidebar=false"></div>
    <aside :class="sidebar ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-50 flex w-64 flex-col bg-navy text-white shadow-elevated transition-transform duration-200 lg:translate-x-0">
        <a href="{{ route('dashboard') }}" class="flex h-16 items-center gap-3 border-b border-white/10 px-5">
            <span class="grid h-9 w-9 place-items-center rounded-md border border-accent/70 bg-accent text-sm font-semibold text-navy">LE</span>
            <span><span class="block text-sm font-semibold tracking-wide">LARAVEL ENTERPRISE</span><span class="block text-[10px] uppercase tracking-[.18em] text-[#82b8b0]">Operations workspace</span></span>
        </a>
        <nav class="flex-1 space-y-6 overflow-y-auto px-3 py-5 text-sm">
            @can('dashboard.view')<x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" icon="home">Dashboard</x-sidebar-link>@endcan
            @canany(['users.view', 'roles.manage', 'permissions.manage'])
            <x-sidebar-group label="Administration">
                @can('users.view')<x-sidebar-link :href="route('administration.index','users')" :active="request()->is('administration/users*')" icon="users">Users</x-sidebar-link>@endcan
                @can('roles.manage')<x-sidebar-link :href="route('administration.index','roles')" :active="request()->is('administration/roles*')" icon="shield">Roles</x-sidebar-link>@endcan
                @can('permissions.manage')<x-sidebar-link :href="route('administration.index','permissions')" :active="request()->is('administration/permissions*')" icon="key">Permissions</x-sidebar-link>@endcan
            </x-sidebar-group>
            @endcanany
            @canany(['settings.manage', 'audit-logs.view'])
            <x-sidebar-group label="System">
                @can('settings.manage')<x-sidebar-link :href="route('system.settings')" :active="request()->routeIs('system.settings')" icon="cog">Settings</x-sidebar-link>@endcan
                @can('audit-logs.view')<x-sidebar-link :href="route('system.audit')" :active="request()->routeIs('system.audit')" icon="clock">Audit logs</x-sidebar-link>@endcan
            </x-sidebar-group>
            @endcanany
            <x-sidebar-group label="Account">
                <x-sidebar-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')" icon="user">Profile</x-sidebar-link>
                <x-sidebar-link :href="route('account.password')" :active="request()->routeIs('account.password')" icon="lock">Change password</x-sidebar-link>
            </x-sidebar-group>
        </nav>
        <div class="border-t border-white/10 p-4 text-xs text-[#b7d8d3]"><span class="mr-2 inline-block h-2 w-2 rounded-full bg-success"></span>All systems operational</div>
    </aside>
    <header class="sticky top-0 z-30 flex h-16 items-center border-b border-[#eadfd8] bg-white/95 px-4 shadow-sm dark:border-slate-800 dark:bg-slate-900 sm:px-6">
        <button @click="sidebar=true" class="mr-3 p-2 text-slate-500 lg:hidden" aria-label="Open menu"><x-icon name="menu" /></button>
        <div class="min-w-0 flex-1"><p class="truncate text-xs text-slate-500 dark:text-slate-400">Workspace / {{ $title ?? 'Dashboard' }}</p><p class="truncate text-sm font-semibold">{{ $title ?? 'Dashboard' }}</p></div>
        <div class="hidden w-64 items-center gap-2 rounded-control border border-slate-200 bg-[#fffaf6] px-3 py-2 text-sm text-slate-500 md:flex dark:border-slate-700 dark:bg-slate-800"><x-icon name="search" /><span>Search workspace</span><kbd class="ml-auto text-xs">Ctrl K</kbd></div>
        <button @click="dark=!dark; localStorage.theme=dark?'dark':'light'" class="ml-2 rounded-control p-2 text-slate-500 hover:bg-[#fff0e8] hover:text-accent" aria-label="Toggle dark mode"><x-icon name="moon" /></button>
        <button @click="notices=!notices" class="relative rounded-control p-2 text-slate-500 hover:bg-[#fff0e8] hover:text-accent" aria-label="Notifications"><x-icon name="bell" /><span class="absolute right-2 top-2 h-2 w-2 rounded-full bg-accent ring-2 ring-white"></span></button>
        <div class="relative ml-2"><button @click="userMenu=!userMenu" class="flex items-center gap-2 border-l border-slate-200 pl-3"><span class="grid h-8 w-8 place-items-center rounded-full bg-primary text-xs font-bold text-white">{{ strtoupper(substr(Auth::user()->name,0,2)) }}</span><span class="hidden text-left text-xs sm:block"><b class="block">{{ Auth::user()->name }}</b><span class="text-slate-500">Administrator</span></span></button>
            <div x-cloak x-show="userMenu" @click.outside="userMenu=false" class="absolute right-0 mt-3 w-48 border border-slate-200 bg-white p-1 shadow-xl dark:border-slate-700 dark:bg-slate-900"><a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-sm hover:bg-slate-50 dark:hover:bg-slate-800">Your profile</a><form method="POST" action="{{ route('logout') }}">@csrf<button class="w-full px-3 py-2 text-left text-sm text-red-600 hover:bg-red-50">Sign out</button></form></div>
        </div>
    </header>
    <main class="min-h-[calc(100vh-8rem)] min-w-0 max-w-full overflow-x-hidden p-4 sm:p-6 lg:p-8">{{ $slot }}</main>
    <footer class="flex flex-wrap justify-between gap-2 border-t border-slate-200 bg-white px-6 py-4 text-xs text-slate-500 dark:border-slate-800 dark:bg-slate-900"><span>Laravel Enterprise v1.0.0</span><span>Laravel {{ app()->version() }} - PHP {{ PHP_VERSION }}</span></footer>
</div>
</body></html>
