<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Throwable;
use App\Models\Like;

class RequestsController extends Controller
{
    public function storeComment(Request $request): void
    {

        $inputs = $request->validate([
            'content' => 'required|max:255|string',
            'course_id' => 'required|integer'
        ]);
        try {
            Comment::create([
                'user_id' => $request->user()->id,
                'course_id' => $inputs['course_id'],
                'content' => $inputs['content']
            ]);
        } catch (Throwable  $th) {
            return;
        }
    }

    public function storeLike(Request $request)
    {

        $checkUser = Like::where('course_id', $request->input('course_id'))->where('user_id', $request->user()->id)->first();
        if ($checkUser) {
            $checkUser->delete();
            $likes = Like::where('course_id', $request->input('course_id'))->get();
            return json_encode(['status' => 'success', 'data' => count($likes)]);
        } else {
            try {
                $executeQuery = Like::create([
                    'user_id' => $request->user()->id,
                    'course_id' => $request->input('course_id'),
                ]);
                $likes = Like::where('course_id', $request->input('course_id'))->get();
                if ($executeQuery) {
                    return json_encode(['status' => 'success', 'data' => count($likes)]);
                }
            } catch (Throwable  $th) {
                return $th;
            }
        }
    }


    /**
     * Display the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
}
