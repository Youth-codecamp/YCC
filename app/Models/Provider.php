<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Provider extends Model
{
    use HasFactory;
    public function Courses()
    {
        return $this->hasMany(Course::class);
    }
}
