<div class="alert alert-{{ $type }}" role="alert">
    @if($message)
        {{ $message }}
    @else
        {{ $slot }}
    @endif
</div>
