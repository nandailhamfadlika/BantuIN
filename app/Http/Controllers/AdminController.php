<?php

namespace App\Http\Controllers;

use App\Models\Helper;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function login() {
        return view('admin.login');
    }

    public function logout(Request $request) {
        Auth::guard('admins')->logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function auth(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admins')->attempt(['name' => $validated['name'], 'password' => $validated['password']])) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Username / Password tidak sesuai');
    }

    public function dashboard() {
        return view('admin.dashboard');
    }

    // Menampilkan semua user
    public function manageUsers()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.manage-users', compact('users'));
    }

    // Menghapus user
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.manage-users')->with('success', 'User berhasil dihapus!');
    }

    // Menampilkan semua helpers
    public function manageHelpers()
    {
        $helpers = Helper::get();
        return view('admin.manage-helpers', compact('helpers'));
    }

    public function addHelpers() {
        return view('admin.add-helpers');
    }

    public function editHelper($id) {
        $helper = DB::table('helpers')->where('id', $id)->first();
        return view('admin.edit-helpers', ['helper' => $helper]);
    }

    public function updateHelper(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required|min:10|max:13',
            'nik' => 'required|min:16|max:16',
        ]);

        if (Str::length($request->password) > 0) {
            $validated['password'] = 'required|min:6|max:16';
        }

        if ($validated) {
            $validated['password'] = Hash::make($request->password);
        }

        try {
            DB::table('helpers')->where('id', $id)->update($validated);
            return redirect()->route('admin.manage-helpers')->with('success', 'Berhasil mengupdate helper');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal mengupdate helper');
        }
    }

    public function storeHelpers(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required|min:10|max:13',
            'nik' => 'required|min:16|max:16',
            'password' => 'required|min:6|max:16'
        ]);

        $validated['password'] = Hash::make($request->password);

        try {
            DB::table('helpers')->insert($validated);
            return redirect()->route('admin.manage-helpers')->with('success', 'Berhasil menambahkan helper');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    // Menghapus helper
    public function deleteHelper($id)
    {
        $helper = User::findOrFail($id);
        $helper->delete();

        return redirect()->route('admin.manage-helpers')->with('success', 'Helper berhasil dihapus!');
    }

    public function viewTasks() {
        $tasks = DB::table('tasks')->leftJoin('helpers', 'tasks.helper_id', '=', 'helpers.id')->leftJoin('reviews', 'tasks.id', '=', 'reviews.task_id')->select('tasks.id', 'tasks.task_name', 'tasks.name', 'tasks.task_description', 'helpers.name as helper_name', 'reviews.rating', 'reviews.review_description', 'tasks.status')->get();

        return view('admin.view-tasks', ['tasks' => $tasks]);
    }
}
