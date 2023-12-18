<x-appcontainer>
    <main class="row justify-content-center">
        <div class="row">
            <h1 class="text-center fw-bolder my-3">Create Profile</h1>
        </div>
        <form class="col-5 border rounded-4 p-5 shadow" action="{{ route("profiles.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-1">
              <label for="username" class="form-label text-warning fw-bolder ">Username:</label>
              <input type="text" class="form-control" value="{{ old("username") }}" name="username" id="username" placeholder="Enter your username">
              <x-errors name="username"/>
            </div>
            <div class="mb-1">
              <label for="email" class="form-label text-warning fw-bolder ">Email:</label>
              <input type="email" class="form-control" value="{{ old("email") }}" name="email" id="email" placeholder="Enter your email">
              <x-errors name="email"/>
            </div>
            <div class="mb-1">
              <label for="age" class="form-label text-warning fw-bolder ">Age:</label>
              <input type="number" class="form-control" value="{{ old("age") }}" name="age" id="age" placeholder="Enter your age">
              <x-errors name="age"/>
            </div>
            <div class="mb-1">
              <label for="bio" class="form-label text-warning fw-bolder ">Bio:</label>
              <textarea class="form-control" value="{{ old("bio") }}" rows="5" name="bio" id="bio" placeholder="Enter your bio"></textarea>
            </div>
            <div class="mb-1">
              <label for="image" class="form-label text-warning fw-bolder ">Image:</label>
              <input type="file" class="form-control" name="image" id="image">
              <x-errors name="image"/>
            </div>
            <div class="mb-1">
              <label for="password" class="form-label text-warning fw-bolder ">Password:</label>
              <input type="password" class="form-control" value="{{ old("password") }}" name="password" id="password" placeholder="Enter your password">
              <x-errors name="password"/>
            </div>
            <div class="mb-2">
              <label for="password_confirmation" class="form-label text-warning fw-bolder ">Password Confirmation:</label>
              <input type="password" class="form-control" value="{{ old("password_confirmation") }}" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password">
            </div>
            <div class="mt-4">
              <input class="d-block w-50 m-auto btn btn-primary" type="submit" value="Sign-up">
            </div>
        </form>
    </main>
</x-appcontainer>
