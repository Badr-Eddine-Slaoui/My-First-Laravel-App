<x-appcontainer>
    @include("Partials.flashbags")
    <main>
        <h1 class="my-4 text-center fw-bolder"><span class="text-warning">{{ $count }}</span> Profiles Found</h1>
        <div class="row">
            @foreach ($profiles as $profile)
                <x-card :profile="$profile"/>
            @endforeach
        </div>
        <div class="my-3">
            {{ $profiles->links() }}
        </div>
    </main>
</x-appcontainer>
