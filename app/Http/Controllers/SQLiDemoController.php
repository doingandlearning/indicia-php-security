<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class SQLiDemoController extends Controller
{
    public function vulnerableQuery(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Vulnerable raw SQL query
        $sql = "SELECT * FROM users WHERE email = '{$email}'";



        $results = DB::select($sql);

        if (count($results) > 0) {
            $user = $results[0];
            if (Hash::check($password, $user->password)) {
                return response()->json($user);
            } else {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }
        }
        return response()->json($results);
    }

    public function vulnerableRawMethod(Request $request)
    {
        $code = $request->input('code');

        // Vulnerable usage of whereRaw
        $validCode = DB::table('codes')
            ->where('enabled', true)
            ->whereRaw("code = '{$code}'")
            ->first();
        return response()->json($validCode);
    }
}
