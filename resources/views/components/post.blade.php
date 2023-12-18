@props(["post","profile"])
<div class="row justify-content-center my-5">
    <div class="col-5">
        <div class="card row border border-1">
            <div class="row my-2 py-1">
                <a class="row w-50 text-black text-decoration-none" href="{{ route("profiles.show" , $profile) }}">
                    <div class="col-2 rounded-circle">
                        <img class="profile-pic" src="{{ asset("storage/".$profile->image) }}" alt="{{ $profile->username }}">
                    </div>
                    <div class="col-3 d-flex align-items-center mx-3">
                        <p class="m-0">{{ $profile->username }}</p>
                        <i class="fa-brands fa-laravel"></i>
                    </div>
                </a>
            </div>
            @if($post->image)
                <div class="card-header p-0">
                    <img class="w-100 object-fit-cover rounded-bottom" src="{{ asset("storage/".$post->image) }}" alt="{{ $post->title }}">
                </div>
            @endif
            @if($post->description)
                <div class="card-body {{ $post->image ? null : "Post bg-black text-white px-5 py-3 d-flex justify-content-center align-items-center rounded-bottom" }}">
                    <p class="{{ $post->image ? "card-text" : "m-0 text-center"  }}">{{ Str::limit($post->description,100, '...') }}</p>
                </div>
            @endif
        </div>
    </div>
</div>
