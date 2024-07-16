<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

Class UserController extends Controller
{
    //
    public function indec(Request $request)
    {
        if ($request->input('user_id')) {
            # code...
            $user = User::where('id',$request->input('user_id'))->first();
            foreach ($user as $key => $value) {
                $user->role_name = $value->getRoleNames();
            }

        }else{
            $user = User::get();
            $user->role_name = $user->getRoleNames();
        }
        // $user = User::first();
        return response()->json([
            'status' => true,
            'data' => $user,
            'message' => 'Data User found'
        ],200);

    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|string',
            'password' => 'required|string',
            'role_name' => 'required|string',
            // 'description' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin123'),
        ]);
        $role = [
            $request->role_name
        ];
        $user->assignRole($role);

        return response()->json([
            'status' => true,
            'data' => $user,
            'message' => 'Data user Has been Saved'
        ],200);
    }
    public function update(User $user,Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|string',
            'password' => 'required|string',
            'role_name' => 'required|string',
            // 'description' => 'required|string|min:8|confirmed',
        ]);

        $user->update([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin123'),
        ]);
        $role = [
            $request->role_name
        ];
        $user->assignRole($role);
        return response()->json([
            'status' => true,
            'data' => $user,
            'message' => 'Data has been updated'
        ],200);
    }
    public function delete(User $user)
    {
        $user->delete();

        return response()->json([
            'status' => true,
            // 'data' => $user,
            'message' => 'Data has been deleted'
        ],200);
    }
}
