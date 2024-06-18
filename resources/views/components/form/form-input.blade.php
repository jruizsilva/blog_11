<div class="relative">
    <input {!! $attributes->merge([
        'class' =>
            'py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none pr-10',
        'type' => $type,
        'name' => $name,
    ]) !!}>
    @error($name)
        <div class="absolute right-2 top-3">
            <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
            </svg>
        </div>
        <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
    @enderror
</div>
