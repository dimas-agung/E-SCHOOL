<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->input('student_id')) {
            # code...
            $student = Student::with(['class','user'])->where('student_id',$request->input('student_id'))->get();

        }else{
            $student = Student::with(['class','user'])->get();
        }

        return response()->json([
            'status' => true,
            'data' => $student,
            'message' => 'Data class found'
        ],200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'class_id' => 'required',
            'nis' => 'required',
            'nisn' => 'required',
            'name' => 'required',
            'birth' => 'required',
            'birth_place' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'status' => 'required',
            // // 'is_active' => 'required',
            'join_date' => 'required',
        ]);

        $student = Student::create([
            'user_id' => $request->input('user_id'),
            'class_id' => $request->input('class_id'),
            'nis'  => $request->input('nis'),
            'nisn' => $request->input('nisn'),
            'name'  => $request->input('name'),
            'birth'  => $request->input('birth'),
            'birth_place'  => $request->input('birth_place'),
            'gender'  => $request->input('gender'),
            'religion'  => $request->input('religion'),
            'address'  => $request->input('address'),
            'phone_number'  => $request->input('phone_number'),
            'status'  => $request->input('status'),
            // 'is_active'  => $request->input('is_active'),
            'join_date'  => $request->input('join_date'),
        ]);

        return response()->json([
            'status' => true,
            'data' => $student,
            'message' => 'Data student Has been Saved'
        ],200);
    }
    public function update(Student $student,Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'class_id' => 'required',
            'nis' => 'required',
            'nisn' => 'required',
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



        $student = $student->update([
            'user_id' => $request->input('user_id'),
            'class_id' => $request->input('class_id'),
            'nis'  => $request->input('nis'),
            'nisn' => $request->input('nisn'),
            'name'  => $request->input('name'),
            'birth'  => $request->input('birth'),
            'birth_place'  => $request->input('birth_place'),
            'gender'  => $request->input('gender'),
            'religion'  => $request->input('religion'),
            'address'  => $request->input('address'),
            'phone_number'  => $request->input('phone_number'),
            'status'  => $request->input('status'),
            'is_active'  => $request->input('is_active'),
            'join_date'  => $request->input('join_date'),
        ]);
        return response()->json([
            'status' => true,
            'data' => $student,
            'message' => 'Data has been updated'
        ],200);
    }
    public function delete(Student $student)
    {
        $student->delete();

        return response()->json([
            'status' => true,
            // 'data' => $student,
            'message' => 'Data has been deleted'
        ],200);
    }
}
