<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware("auth")->except("index");
    }
    public function index()
    {
        return view("Posts.index",[
            "posts"=> Post::with('profile')->inRandomOrder()->get(),
            "count"=> Post::count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
        $this->uploadImage($request,$validated);
        $validated["profile_id"] = Auth::id();
        Post::create($validated);
        return redirect()->route("posts.index")->with("success","Post added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    private function uploadImage(StorePostRequest $request,array &$validated){
        if($request->hasFile("image")){
            $validated["image"] = $request->file("image")->store("posts-pics","public");
        }
    }
}
