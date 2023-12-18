<x-appcontainer>
    <main class="row justify-content-center">
        <div class="row">
            <h1 class="text-center fw-bolder my-3">Update Profile</h1>
        </div>
        <form class="col-5 border rounded-4 p-5 shadow" action="{{ route("profiles.update",compact("profile")) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            <div class="mb-1">
              <label for="username" class="form-label text-warning fw-bolder ">Username:</label>
              <input type="text" class="form-control" value="{{ old("username",$profile->username) }}" name="username" id="username" placeholder="Enter your username">
              <x-errors name="username"/>
            </div>
            <div class="mb-1">
              <label for="email" class="form-label text-warning fw-bolder ">Email:</label>
              <input type="email" class="form-control" value="{{ old("email",$profile->email) }}" name="email" id="email" placeholder="Enter your email">
              <x-errors name="email"/>
            </div>
            <div class="mb-1">
              <label for="age" class="form-label text-warning fw-bolder ">Age:</label>
              <input type="number" class="form-control" value="{{ old("age",$profile->age) }}" name="age" id="age" placeholder="Enter your age">
              <x-errors name="age"/>
            </div>
            <div class="mb-1">
              <label for="bio" class="form-label text-warning fw-bolder ">Bio:</label>
              <textarea class="form-control" rows="5" name="bio" id="bio" placeholder="Enter your bio">{{ old("bio",$profile->bio) }}</textarea>
            </div>
            <div class="mb-1">
              <label for="image" class="form-label text-warning fw-bolder ">Image:</label>
              <input type="file" class="form-control" name="image" id="image">
              <x-errors name="image"/>
            </div>
            <div class="mt-4">
              <input class="d-block w-50 m-auto btn btn-primary" type="submit" value="Save">
            </div>
        </form>
    </main>
</x-appcontainer>
