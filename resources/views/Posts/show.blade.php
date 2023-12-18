<x-appcontainer>
    <main class="row justify-content-center">
        <h2 class="my-4 text-warning text-center text-capitalize fw-bolder">{{ $profile->username }}<span class="text-white"> | </span>{{ $profile->age }}yrs</h2>
        <div class="col-5 my-3">
            <div class="card bg-transparent border-white">
                <div class="card-header border-white p-0">
                    <img class="card-img-top" src="{{ asset("storage/".$profile->image) }}" alt="">
                </div>
                <div class="card-body py-4">
                    <div class="m-0 text-white d-flex my-2"><span class="me-4 fw-bolder text-capitalize text-info">email:</span> <p class="m-0 w-75">{{ $profile->email }}</p></div>
                    <div class="m-0 text-white d-flex my-2"><span class="me-4 fw-bolder text-capitalize text-info">Bio:</span> <p class="m-0 w-75">{{ $profile->bio }}</p></div>
                    <div class="m-0 text-white d-flex my-2"><span class="me-4 fw-bolder text-capitalize text-info">Password:</span> <p class="m-0 w-75">{{ $profile->password }}</p></div>
                </div>
                <div class="card-footer py-3 border-white d-flex justify-content-around align-items-center">
                    <form class="w-50" action="{{ route("profiles.destroy" , compact("profile")) }}" method="post">
                        @method("DELETE")
                        @csrf
                        <input class="d-block w-50 m-auto btn btn-danger" type="submit" value="Delete">
                    </form>
                    <form class="w-50" action="{{ route("profiles.edit" , compact("profile")) }}" method="get">
                        @csrf
                        <input class="d-block w-50 m-auto btn btn-success" type="submit" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-appcontainer>
