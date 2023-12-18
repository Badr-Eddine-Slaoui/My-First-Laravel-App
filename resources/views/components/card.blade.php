@props(["profile"])
<div class="col-4 my-3">
    <div class="card bg-transparent border-white">
        <div class="card-header border-white p-0">
            <img class="card-img-top" src="{{ asset("storage/".$profile->image) }}" alt="">
        </div>
        <div class="card-body py-4">
            <h3 class="my-2 text-warning text-center text-capitalize fw-bolder">{{ $profile->username }}</h3>
            <p class="m-0 text-white"><span class="fw-bolder text-capitalize text-info">email:</span> {{ $profile->email }}</p>
        </div>
        @auth
            <div class="card-footer py-3 border-white d-flex justify-content-around align-items-center">
                <form action="{{ route("profiles.show" , compact("profile")) }}" method="get">
                    @csrf
                    <input class="btn btn-primary" type="submit" value="Show more">
                </form>
                <form action="{{ route("profiles.destroy" , compact("profile")) }}" method="post">
                    @method("DELETE")
                    @csrf
                    <input class="btn btn-danger" type="submit" value="Delete">
                </form>
                <form action="{{ route("profiles.edit" , compact("profile")) }}" method="get">
                    @csrf
                    <input class="btn btn-success" type="submit" value="Update">
                </form>
            </div>
        @endauth
    </div>
</div>
