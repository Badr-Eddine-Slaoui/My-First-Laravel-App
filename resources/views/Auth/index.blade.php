<x-appcontainer>
    <main class="row justify-content-center">
        <div class="row">
            <h1 class="text-center fw-bolder my-3">Login</h1>
        </div>
        <form class="col-5 border rounded-4 p-5 shadow" action="{{ route("auth.login") }}" method="post">
            @csrf
            <div class="mb-1">
              <x-errors name="login"/>
              <label for="email" class="form-label text-warning fw-bolder ">Email:</label>
              <input type="email" class="form-control" value="{{ old("email") }}" name="email" id="email" placeholder="Enter your email">
            </div>
            <div class="mb-1">
              <label for="password" class="form-label text-warning fw-bolder ">Password:</label>
              <input type="password" class="form-control"  name="password" id="password" placeholder="Enter your password">
            </div>
            <div class="mb-1">
              <input type="checkbox" class="form-check-input"  name="remember" id="remember">
              <label for="remember" class="form-check-label text-warning fw-bolder ">Remember me</label>
            </div>
            <div class="mt-4">
              <input class="d-block w-50 m-auto btn btn-primary" type="submit" value="login">
            </div>
        </form>
    </main>
</x-appcontainer>
