<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:7|max:16'
        ]);

        $validated['password'] = Hash::make($request->password);

        try {
            $users = DB::table('users')->insert($validated);
            return redirect()->route('login')->with('success', 'Berhasil registrasi');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }

    }
}
