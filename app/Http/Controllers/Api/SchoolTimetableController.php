<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SchoolTimetable;
use Illuminate\Http\Request;

class SchoolTimetableController extends Controller
{
    //
    public function index(Request $request)
    {
        $SchoolTimetable = SchoolTimetable::with(['teacher','class']);
        if ($request->input('teacher_id')) {
            # code...
            $SchoolTimetable->where('teacher_id',$request->input('teacher_id'));
        }else if ($request->input('class_id')) {
            # code...
            $SchoolTimetable->where('class_id',$request->input('class_id'));
        }else if ($request->input('semester')) {
            # code...
            $SchoolTimetable->where('semester',$request->input('semester'));
        }
        $SchoolTimetable = $SchoolTimetable->get();
        return response()->json([
            'status' => true,
            'data' => $SchoolTimetable,
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

        $SchoolTimetable = SchoolTimetable::create([
            'name' => $request->name,
            'teacher_id' => $request->teacher_id,
            'group_class_id' => $request->group_class_id,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return response()->json([
            'status' => true,
            'data' => $SchoolTimetable,
            'message' => 'Data SchoolTimetable Has been Saved'
        ],200);
    }
    public function update(SchoolTimetable $SchoolTimetable,Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'teacher_id' => 'required',
            'group_class_id' => 'required',
            'is_active' => 'required',
            // 'description' => 'required|string|min:8|confirmed',
        ]);


        $SchoolTimetable = $SchoolTimetable->update([
            'name' => $request->name,
            'teacher_id' => $request->teacher_id,
            'group_class_id' => $request->group_class_id,
            'description' => $request->description,
            'status' => $request->status,
            'is_active' => $request->is_active,
        ]);
        return response()->json([
            'status' => true,
            'data' => $SchoolTimetable,
            'message' => 'Data has been updated'
        ],200);
    }
    public function delete(SchoolTimetable $SchoolTimetable)
    {
        $SchoolTimetable->delete();

        return response()->json([
            'status' => true,
            // 'data' => $SchoolTimetable,
            'message' => 'Data has been deleted'
        ],200);
    }
}
