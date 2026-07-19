@props(['label','name'])<label class="block"><span class="app-label">{{ $label }}</span><select name="{{ $name }}" {{ $attributes->merge(['class'=>'app-field']) }}>{{ $slot }}</select></label>
