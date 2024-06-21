@props([
    'label' => 'label',
    'leftIcon' => '',
    'rightIcon' => '',
])

<button {!!$attributes->merge([
    'class' => "w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-neutral-700 rounded-lg hover:bg-gray-100"
])!!}>
    @if ($leftIcon)
    <i class="{{$leftIcon}}"></i>        
    @endif
    {{$label}}
    @if ($rightIcon)
    <i class="{{$rightIcon}} ms-auto size-4 text-xs"></i>
    @endif
</button>