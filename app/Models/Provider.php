<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Provider extends Model
{
    use HasFactory;
    protected $fillable = [
        "profile_picture_path",
        "name",
        "likes"
    ];
    public function Courses()
    {
        return $this->hasMany(Course::class);
    }
}
