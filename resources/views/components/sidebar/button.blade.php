@props([
    'label' => 'label',
    'route' => ''
])

<a x-data="{ currentRoute: '{{ Route::currentRouteName() }}' }" class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-neutral-700 rounded-lg hover:bg-gray-100"
    href="{{route($route)}}"
    x-bind:class="currentRoute === '{{$route}}' ? 'bg-gray-100' : ''">
    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
    stroke-linejoin="round">
    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
    <polyline points="9 22 9 12 15 12 15 22" />
    </svg>
    {{$label}}
</a>