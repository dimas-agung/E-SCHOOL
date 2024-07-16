<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('teacher_id')) {
            # code...
            $teacher = Teacher::with(['user','class'])->where('id',$request->input('teacher_id'))->get();

        }else{
            $teacher = Teacher::with(['user','class'])->get();
        }

        return response()->json([
            'status' => true,
            'data' => $teacher,
            'message' => 'Data teacher found'
        ],200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'nip' => 'required',
            'nuptk' => 'required',
            'name' => 'required',
            'birth' => 'required',
            'birth_place' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'status' => 'required',
            // 'is_active' => 'required',
            'join_date' => 'required',
        ]);

        $teacher = Teacher::create([
            'user_id' => $request->input('user_id'),
            'nip' => $request->input('nip'),
            'nuptk' => $request->input('nuptk'),
            'name' => $request->input('name'),
            'birth' => $request->input('birth'),
            'birth_place' => $request->input('birth_place'),
            'gender' => $request->input('gender'),
            'religion' => $request->input('religion'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'status' => $request->input('status'),
            // 'is_active' => $request->input(''),
            'join_date' => $request->input('join_date'),
        ]);

        return response()->json([
            'status' => true,
            'data' => $teacher,
            'message' => 'Data Teacher Has been Saved'
        ],200);
    }
    public function update(Teacher $teacher,Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'nip' => 'required',
            'nuptk' => 'required',
            'name' => 'required',
            'birth' => 'required',
            'birth_place' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'status' => 'required',
            // 'is_active' => 'required',
            'join_date' => 'required',
        ]);


        $teacher = $teacher->update([
            'user_id' => $request->input('user_id'),
            'nip' => $request->input('nip'),
            'nuptk' => $request->input('nuptk'),
            'name' => $request->input('name'),
            'birth' => $request->input('birth'),
            'birth_place' => $request->input('birth_place'),
            'gender' => $request->input('gender'),
            'religion' => $request->input('religion'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'status' => $request->input('status'),
            // 'is_active' => $request->input(''),
            'join_date' => $request->input('join_date'),
        ]);
        return response()->json([
            'status' => true,
            'data' => $teacher,
            'message' => 'Data has been updated'
        ],200);
    }
    public function delete(Teacher $teacher)
    {
        $teacher->delete();

        return response()->json([
            'status' => true,
            // 'data' => $teacher,
            'message' => 'Data has been deleted'
        ],200);
    }

}
