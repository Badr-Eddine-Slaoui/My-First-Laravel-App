<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ["username","email","password","age","bio","image"] ;

    public function getImageAttribute($value){
        return $value ?? "profiles-pics/profile-default.png";
    }

    public function posts(){
        return $this->hasMany(Post::class,"profile_id","id");
    }
}
