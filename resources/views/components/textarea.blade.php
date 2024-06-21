@props([
    'icon' => '',
    'type' => 'text',
])

<div class="relative">
  @if ($icon)
    <div
      class="absolute inset-y-0 z-20 flex items-center pointer-events-none start-0 ps-4">
      <i class="flex-shrink-0 text-gray-400 {{ $icon }}"></i>
    </div>
  @endif
  <textarea {!! $attributes->merge([
      'class' =>
          'block w-full px-4 py-2 text-sm border border-gray-200 rounded-lg outline-1 outline-blue-500' .
          ($icon !== '' ? ' ps-11' : ''),
  ]) !!}></textarea>
</div>
