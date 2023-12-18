<header class="header my-5 justify-content-center align-items-center">
    <nav class="w-50 m-auto d-flex justify-content-around align-items-center">
        <a class="py-2 px-3 btn btn-primary text-decoration-none" href="{{ route("profiles.index") }}">Profiles</a>
        @auth
        <a class="py-2 px-3 btn btn-primary text-decoration-none" href="{{ route("profiles.show",auth()->user()->id) }}">{{ auth()->user()->username }}</a>
        <a class="py-2 px-3 btn btn-primary text-decoration-none" href="{{ route("posts.create")}}">Add Post</a>;
        
        @endauth
        @guest
            <a class="py-2 px-3 btn btn-primary text-decoration-none" href="{{ route("auth.index") }}">Login</a>
            <a class="py-2 px-3 btn btn-primary text-decoration-none" href="{{ route("profiles.create") }}">Signin</a>
        @endguest
    </nav>
</header>
