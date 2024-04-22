<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Vulnerable SQL Query
        $query = "SELECT * FROM users WHERE email = '$username'";

        $user = DB::select($query);

        if (!empty($user) && Hash::check($password, $user[0]->password)) {
            return $user;
        }

        return "Invalid credentials!";
    }
}
