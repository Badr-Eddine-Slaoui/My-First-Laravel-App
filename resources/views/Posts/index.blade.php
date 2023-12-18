<x-appcontainer>
    <div class="row w-50 m-auto">
        @include("Partials.flashbags")
    </div>
    <main>
        <h1 class="my-4 text-center fw-bolder"><span class="text-warning">{{ $count }}</span> Profiles Found</h1>
        @foreach ($posts as $post)
            <x-post :post="$post" :profile="$post->profile"/>
        @endforeach
    </main>
</x-appcontainer>
