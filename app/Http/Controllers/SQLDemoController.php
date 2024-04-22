<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SQLDemoController extends Controller
{
    public function index(Request $request)
    {
        $userInput = $request->input('code', ''); // Get user input from query parameter 'code'

        try {
            // Intentionally vulnerable SQL query
            $result = DB::select("select * from `codes` where `enabled` = 1 and `code` = '$userInput' limit 1");
            return response()->json($result);
        } catch (\Exception $e) {
            // Intentionally returning raw SQL error
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
