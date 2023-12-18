<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileCreateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware("auth")->except(["index","create","store"]);
        $this->middleware("guest")->only(["create","store"]);
    }
    public function index()
    {
        return view("profiles.index",[
            "profiles"=> Profile::paginate(9),
            "count"=>Profile::all()->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Profiles.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfileCreateRequest $request)
    {
        $validated = $request->validated();
        $this->uploadImage($request, $validated);
        $validated["password"] = Hash::make($validated["password"]);
        $validated["bio"] = $request->bio;
        Profile::create($validated);
        return AuthController::login($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return view("Profiles.show",[
            "profile"=> Profile::with(['posts' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }])->find($profile->id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        return view("Profiles.edit",compact("profile"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileUpdateRequest $request, Profile $profile)
    {
        $validated = $request->validated();
        $this->uploadImage($request, $validated);
        $validated["bio"] = $request->bio;
        $profile->update($validated);
        return redirect()->route("profiles.index")->with("success",$validated["username"]." updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $id = $profile->id;
        $profile->delete();
        if(Auth::user()->id == $id){
            return AuthController::logout();
        }
        return redirect()->route("profiles.index")->with("success",$profile->username." has been deleted successfully");
    }

    private function uploadImage(ProfileCreateRequest|ProfileUpdateRequest $request,array &$validated){
        if($request->hasFile("image")){
            $validated["image"] = $request->file("image")->store("profiles-pics","public");
        }
    }
}
