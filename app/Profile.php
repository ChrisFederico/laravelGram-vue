<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    
     public function profileImage() {

        $imagePath = ($this->image) ?  $this->image : 'profile/l1Bqb9Jk57K5fz1BC0L7ahzijIUDrM7ZeCJbGabR.png';

        return '/storage/' . $imagePath;
     }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function followers() {
        return $this->belongsToMany(User::class);
    }
}
