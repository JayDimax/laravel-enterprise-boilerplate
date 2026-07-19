<x-app-layout title="Settings">
    <x-page-title title="Application settings" description="Manage global workspace behavior and operational defaults." />
    <form method="POST" action="{{ route('system.settings.update') }}" class="space-y-6">@csrf @method('PUT')
        <x-card title="General" subtitle="Identity and contact information used across the platform."><div class="grid gap-5 md:grid-cols-2"><x-input label="Application name" name="app_name" value="{{ config('app.name') }}" required/><x-input label="Support email" name="support_email" type="email" value="support@example.com"/><x-select label="Timezone" name="timezone"><option>Asia/Manila</option><option>UTC</option><option>America/New_York</option></x-select><x-select label="Default locale" name="locale"><option value="en">English (US)</option><option value="en_GB">English (UK)</option></x-select></div></x-card>
        <x-card title="Security" subtitle="Workspace-wide access safeguards."><div class="space-y-4"><x-checkbox name="require_verification" checked>Require email verification for new accounts</x-checkbox><x-checkbox name="audit_changes" checked>Record administrative changes in the audit log</x-checkbox><x-checkbox name="maintenance">Enable maintenance mode</x-checkbox></div></x-card>
        <div class="flex justify-end"><x-button type="submit">Save settings</x-button></div>
    </form>
</x-app-layout>
