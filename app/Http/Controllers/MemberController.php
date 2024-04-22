<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');

        // Vulnerable SQL Query
        $query = "SELECT public, name, tenant_id FROM members WHERE public = 1 and name LIKE '%$search%'";
        $members = DB::select($query);

        return view('day2.search', ['members' => $members]);
    }
}
