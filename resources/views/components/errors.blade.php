@props(["name"])
@error($name)
    <x-alerts type="danger">
        {{ $message }}
    </x-alerts>
@enderror
