<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    
    public function getProfileImage(){
        // $image = ($this->image) ? $this->image : "profile/default.png";
        // return  "/storage/$image" ;
        return ($this->image) ? $this->image : "profile/default.png";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }   
    
    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
    
}
