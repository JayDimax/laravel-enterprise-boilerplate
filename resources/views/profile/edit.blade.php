<x-app-layout title="Profile">
    <x-page-title title="Profile" eyebrow="Account" description="Manage your identity, security credentials, and account lifecycle." />

    <div class="profile-module grid max-w-5xl gap-6">
        <x-card title="Profile information" subtitle="Keep your name and email address current.">
            <div class="max-w-xl">@include('profile.partials.update-profile-information-form')</div>
        </x-card>

        <x-card title="Update password" subtitle="Use a strong, unique password for this workspace.">
            <div class="max-w-xl">@include('profile.partials.update-password-form')</div>
        </x-card>

        <x-card title="Delete account" subtitle="Permanently remove your account and associated data." class="border-red-200 dark:border-red-900">
            <div class="max-w-xl">@include('profile.partials.delete-user-form')</div>
        </x-card>
    </div>
</x-app-layout>
