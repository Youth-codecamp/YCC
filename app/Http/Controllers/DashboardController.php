<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        $Courses = Course::with(['provider', 'comments.user','likes'])->get();
        return Inertia::render('CourseDashboard', compact('Courses'));
    }
}
