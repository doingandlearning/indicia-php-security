<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileUser;
use Illuminate\Support\Facades\Hash;

class ProfileUserController extends Controller
{
    public function index()
    {
        $users = ProfileUser::all();
        return view('users.index', ['users' => $users]);
    }
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:profile_users',
            'dob' => 'nullable|date',
            'password' => 'required|string|min:8',
        ]);

        $user = new ProfileUser();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->dob = $validated['dob'];
        if ($request->has('consent_given')) {
            $user->consent_given = $request->consent_given == 'on';
        }
        $user->password = Hash::make($validated['password']);
        $user->save();

        return redirect()->route('users.show', $user);
    }
    public function show(ProfileUser $user)
    {
        return view('users.show', ['user' => $user]);
    }

    public function edit(ProfileUser $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, ProfileUser $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'dob' => 'nullable|date',
        ]);

        if ($request->has('consent_given')) {
            $validated['consent_given'] = true;
        }

        $user->update($validated);
        return redirect()->route('users.show', $user);
    }

    public function destroy(ProfileUser $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
