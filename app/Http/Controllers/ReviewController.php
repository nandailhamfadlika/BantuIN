<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function create($id) {
        $task = DB::table('tasks')->join('helpers', 'tasks.helper_id', '=', 'helpers.id')->select('tasks.*', 'helpers.name as helper_name', 'helpers.phone as helper_phone')->where('tasks.id', $id)->orderBy('created_at', 'desc')->first();

        return view('user.add-review', ['task' => $task]);
    }
    public function store(Request $request, $id){

        $validated = $request->validate([
            'rating_range' => 'required',
        ]);

        try {
            DB::table('reviews')->insert([
                'user_id' => $request->user_id,
                'helper_id' => $request->helper_id,
                'task_id' => $id,
                'rating' => $validated['rating_range'],
                'agreed_price' => $request->agreed_price,
                'review_description' => $request->review_description,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('user.list-task')->with('success', 'Berhasil memberikan review');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

}
