<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->input('teacher_id')) {
            # code...
            $cource = Course::with(['teacher','class_group'])->where('teacher_id',$request->input('teacher_id'))->get();

        }else{
            $cource = Course::with(['teacher','class_group'])->get();
        }

        return response()->json([
            'status' => true,
            'data' => $cource,
            'message' => 'Data class found'
        ],200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'teacher_id' => 'required',
            'group_class_id' => 'required',
            // 'description' => 'required|string|min:8|confirmed',
        ]);

        $cource = Course::create([
            'name' => $request->name,
            'teacher_id' => $request->teacher_id,
            'group_class_id' => $request->group_class_id,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return response()->json([
            'status' => true,
            'data' => $cource,
            'message' => 'Data Course Has been Saved'
        ],200);
    }
    public function update(Course $cource,Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'teacher_id' => 'required',
            'group_class_id' => 'required',
            'is_active' => 'required',
            // 'description' => 'required|string|min:8|confirmed',
        ]);


        $cource = $cource->update([
            'name' => $request->name,
            'teacher_id' => $request->teacher_id,
            'group_class_id' => $request->group_class_id,
            'description' => $request->description,
            'status' => $request->status,
            'is_active' => $request->is_active,
        ]);
        return response()->json([
            'status' => true,
            'data' => $cource,
            'message' => 'Data has been updated'
        ],200);
    }
    public function delete(Course $cource)
    {
        $cource->delete();

        return response()->json([
            'status' => true,
            // 'data' => $cource,
            'message' => 'Data has been deleted'
        ],200);
    }

}
