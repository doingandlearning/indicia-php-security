<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Rules\PalindromeRule;

class ValidationController extends Controller
{
    public function showForm()
    {
        return view('day1.form-validation');
    }

    public function submitForm(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', new PalindromeRule()],
        //     'age' => 'required|numeric|min:0|max:100',
        //     'password' => ['required', Password::min(6)->uncompromised(10)]
        // ]);

        // database store

        return back()->withInput();
    }
}
