<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Music;

class Artist extends Model
{
    use HasFactory;

    

    protected $fillable = [
        'name',
        'dob',
        'gender',
        'address',
        'first_release_year',
        'no_of_albums_released',
    ];

    public function music(){
        $this->hasMany(Music::class);
    }
}
