<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClassGroup;
use Illuminate\Http\Request;

class ClassGroupController extends Controller
{
    //
    public function index(Request $request)
    {
        $class_group = ClassGroup::with(['class'])->get();

        return response()->json([
            'status' => true,
            'data' => $class_group,
            'message' => 'Data class found'
        ],200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'level' => 'required',
            'name' => 'required',
            // 'description' => 'required|min:8|confirmed',
        ]);

        $class_group = ClassGroup::create([
            'level' => $request->level,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'status' => true,
            'data' => $class_group,
            'message' => 'Data Class Has been Saved'
        ],200);
    }
    public function update(ClassGroup $class_group,Request $request)
    {
        $request->validate([
            'level' => 'required',
            'name' => 'required',
            // 'description' => 'required|min:8|confirmed',
        ]);

        $class_group = $class_group->update([
            'level' => $request->level,
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return response()->json([
            'status' => true,
            'data' => $class_group,
            'message' => 'Data has been updated'
        ],200);
    }
    public function delete(ClassGroup $class_group)
    {
        $class_group->delete();

        return response()->json([
            'status' => true,
            // 'data' => $class_group,
            'message' => 'Data has been deleted'
        ],200);
    }

}
