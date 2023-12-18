@if (session()->has("success"))
    <div class="row w-50 m-auto my-5">
        <x-alerts type="success">
            {{ session("success") }}
        </x-alerts>
    </div>
@endif
