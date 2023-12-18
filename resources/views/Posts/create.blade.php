<x-appcontainer>
    <div class="row">
        <h1 class="text-center fw-bolder my-3">Add Post</h1>
    </div>
    @include("Partials.flashbags")
    <main class="row justify-content-center">
        <form class="col-5 border rounded-4 p-5 shadow" action="{{ route("posts.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-1">
              <label for="title" class="form-label text-warning fw-bolder ">Title:</label>
              <input type="text" class="form-control" value="{{ old("title") }}" name="title" id="title" placeholder="Enter your post title">
              <x-errors name="title"/>
            </div>
            <div class="mb-1">
              <label for="description" class="form-label text-warning fw-bolder ">Description:</label>
              <textarea class="form-control" value="{{ old("description") }}" rows="5" name="description" id="description" placeholder="Type somthing..."></textarea>
              <x-errors name="description"/>
            </div>
            <div class="mb-1">
              <label for="image" class="form-label text-warning fw-bolder ">Image:</label>
              <input type="file" class="form-control" name="image" id="image">
              <x-errors name="image"/>
            </div>
            <div class="mt-4">
              <input class="d-block w-50 m-auto btn btn-primary" type="submit" value="Add Post">
            </div>
        </form>
    </main>
</x-appcontainer>
