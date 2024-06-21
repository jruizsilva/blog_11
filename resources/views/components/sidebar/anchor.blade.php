@props([
    'label' => 'label',
    'route' => '',
    'leftIcon' => '',
    'rightIcon' => '',
])

<a x-data="{ currentRoute: '{{ Route::currentRouteName() }}' }" 
    x-bind:class="currentRoute === '{{$route}}' ? 'bg-gray-100' : ''"
        class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-neutral-700 rounded-lg hover:bg-gray-100"
        href={{route($route)}}>
    @if ($leftIcon)
    <i class="{{$leftIcon}}"></i>        
    @endif
    {{$label}}
    @if ($rightIcon)
    <i class="{{$rightIcon}} ms-auto size-4 text-xs"></i>
    @endif
</a>