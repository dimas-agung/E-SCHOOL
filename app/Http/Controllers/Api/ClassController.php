<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GradeClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->input('teacher_id')) {
            # code...
            $class = GradeClass::with(['teacher','class_group'])->where('teacher_id',$request->input('teacher_id'))->get();
        }else{

            $class = GradeClass::with(['teacher','class_group'])->get();
        }

        return response()->json([
            'status' => true,
            'data' => $class,
            'message' => 'Data class found'
        ],200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'class_group_id' => 'required|integer|max:255',
            'teacher_id' => 'required|string',
            'name' => 'required|string',
            // 'description' => 'required|string|min:8|confirmed',
        ]);

        $class = GradeClass::create([
            'class_group_id' => $request->class_group_id,
            'teacher_id' => $request->teacher_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'status' => true,
            'data' => $class,
            'message' => 'Data Class Has been Saved'
        ],200);
    }
    public function update(GradeClass $class,Request $request)
    {
        $request->validate([
            'class_group_id' => 'required|integer|max:255',
            'teacher_id' => 'required|string',
            'name' => 'required|string',
            // 'description' => 'required|string|min:8|confirmed',
        ]);

        $class = $class->update([
            'class_group_id' => $request->class_group_id,
            'teacher_id' => $request->teacher_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return response()->json([
            'status' => true,
            'data' => $class,
            'message' => 'Data has been updated'
        ],200);
    }
    public function delete(GradeClass $class)
    {
        $class->delete();

        return response()->json([
            'status' => true,
            // 'data' => $class,
            'message' => 'Data has been deleted'
        ],200);
    }

}
