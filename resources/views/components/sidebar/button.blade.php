@props([
    'label' => 'label',
    'route' => '',
    'icon' => ''
])

<a x-data="{ currentRoute: '{{ Route::currentRouteName() }}' }" class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-neutral-700 rounded-lg hover:bg-gray-100"
    href="{{route($route)}}"
    x-bind:class="currentRoute === '{{$route}}' ? 'bg-gray-100' : ''">
    <i class="{{$icon}}"></i>
    {{$label}}
</a>