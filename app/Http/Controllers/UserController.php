<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {
        return view('index');
    }

    public function listTasks() {
        $tasks = DB::table('tasks')->leftJoin('helpers', 'tasks.helper_id', '=', 'helpers.id')->leftJoin('reviews', 'tasks.id', '=', 'reviews.task_id')->select('tasks.*', 'helpers.name as helper_name', 'helpers.phone as helper_phone', 'reviews.id as review_id')->where('tasks.user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view('user.list-task', ['tasks' => $tasks]);
    }

    public function createTask() {
        return view('user.create-task');
    }

    public function editTask($id) {
        $task = DB::table('tasks')->where('id', $id)->first();
        return view('user.edit-task', ['task' => $task]);
    }

    public function storeTask(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'task_name' => 'required',
            'task_description' => 'required',
            'task_time_range' => 'required',
            'location' => 'required',
            'price_range' => 'required',
        ]);

        $validated['user_id'] = Auth::user()->id;
        $validated['task_time_range'] = Carbon::parse($validated['task_time_range'])->format('Y-m-d H:i:s');

        try {
            DB::table('tasks')->insert($validated);
            return redirect()->route('user.list-task')->with('success', 'Berhasil membuat request');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }

    }

    public function updateTask(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required',
            'task_name' => 'required',
            'task_description' => 'required',
            'task_time_range' => 'required',
            'location' => 'required',
            'price_range' => 'required',
        ]);

        $validated['task_time_range'] = Carbon::parse($validated['task_time_range'])->format('Y-m-d H:i:s');
        try {
            DB::table('tasks')->where('id', $id)->update([
                'name' => $validated['name'],
                'task_name' => $validated['task_name'],
                'task_description' => $validated['task_description'],
                'task_time_range' => $validated['task_time_range'],
                'location' => $validated['location'],
                'price_range' => $validated['price_range'],
            ]);
            
            return redirect()->route('user.list-task')->with('success', 'Berhasil mengupdate request');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function deleteTask(Request $request) {
        try {
            DB::table('tasks')->where('id', $request->id)->delete();
            return back()->with('success', 'Berhasil menghapus request');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function dashboard() {
        return view('user.dashboard');
    }

    public function logout(Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
