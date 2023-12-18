@props(["type"])
<div class="my-2 alert alert-{{ $type }}" role="alert">
    <strong>{{ $slot }}</strong>
</div>

