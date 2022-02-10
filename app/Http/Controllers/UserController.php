<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function getUser(Request $request)
    {
       return User::with('post','comment')->get();
    }
    public function createUser(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
        'data' => $user,
        'message' => 'user created'
        ], 201);
    }
}
