<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HelperController extends Controller
{
    public function login() {
        return view('helper.login');
    }

    public function auth(Request $request) {
        $validated = $request->validate([
            'nik' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('helpers')->attempt(['nik' => $validated['nik'], 'password' => $validated['password']])) {
            $request->session()->regenerate();
            return redirect()->route('helper.dashboard');
        }

        return back()->with('error', 'NIK / Password tidak sesuai');
    }

    public function logout(Request $request) {
        Auth::guard('helpers')->logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function dashboard() {
        $tasks = DB::table('tasks')->where('helper_id', null)->orderBy('created_at', 'desc')->get();
        $activeTasks = DB::table('tasks')->where('helper_id', Auth::guard('helpers')->user()->id)->where('status', 'ongoing')->orderBy('created_at', 'desc')->get();
        $completedTasks = DB::table('tasks')->where('helper_id', Auth::guard('helpers')->user()->id)->where('status', 'completed')->orderBy('created_at', 'desc')->get();

        return view('helper.dashboard', ['tasks' => $tasks, 'activeTasks' => $activeTasks, 'completedTasks' => $completedTasks]);
    }

    public function confirmTask(Request $request, $id) {
        try {
            DB::table('tasks')->where('id', $id)->update([
                'helper_id' => Auth::guard('helpers')->user()->id,
                'status' => 'ongoing',
            ]);

            return back()->with('success', 'Berhasil mengambil request');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function completeTask(Request $request, $id) {
        try {
            DB::table('tasks')->where('id', $id)->update([
                'status' => 'completed'
            ]);

            return back()->with('success', 'Berhasil menyelesaikan request');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}   
