@php $singular=Str::singular(ucfirst($section)); @endphp
<x-app-layout :title="'Create '.$singular">
    <x-page-title :title="'Create '.$singular" description="Add a reusable access record to the workspace." />
    <form method="POST" action="{{ route('administration.store', $section) }}" class="grid gap-6 xl:grid-cols-[1.5fr_1fr]">
        @csrf
        <x-card title="Record details" subtitle="Fields marked required must be completed.">
            <div class="space-y-5">
                <x-input label="Name" name="name" required placeholder="Enter a clear name" />
                @if($section==='users')
                    <x-input label="Email address" name="email" type="email" required placeholder="name@example.com" />
                    <x-select label="Primary role" name="role"><option value="">No role</option>@foreach(\Spatie\Permission\Models\Role::orderBy('name')->get() as $role)<option>{{ $role->name }}</option>@endforeach</x-select>
                @else
                    <x-textarea label="Description" name="description" placeholder="Explain what this {{ strtolower($singular) }} allows." />
                @endif
                <x-checkbox name="active" checked>Active and available for assignment</x-checkbox>
            </div>
        </x-card>
        <x-card title="Publishing"><p class="mb-5 text-sm text-slate-500">Review the record before saving. Changes are recorded in the audit log.</p><div class="flex gap-2"><x-button type="submit">Save {{ strtolower($singular) }}</x-button><x-button variant="secondary" :href="route('administration.index',$section)">Cancel</x-button></div></x-card>
    </form>
</x-app-layout>
