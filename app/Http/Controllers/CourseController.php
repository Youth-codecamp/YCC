<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Provider;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index($CoursePar, $title)
    {
        $Course = Course::findOrFail($CoursePar);
        $Provider = Provider::find($Course->provider_id);
         if ($Course) {
             return Inertia::render('Watch', compact('Course','Provider'));
         } else {
             abort(404);
         }
    }
}
