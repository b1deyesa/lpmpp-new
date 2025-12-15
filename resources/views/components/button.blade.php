@if ($type == 'link')
    <a class="button {{ $class }}" href="{{ $href }}" {{ $attributes }}>{{ $slot }}</a>
@else
    <button class="button {{ $class }}" type="{{ $type }}" {{ $attributes }}>{{ $slot }}</button>
@endif