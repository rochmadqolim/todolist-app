<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::orderBy('status', 'asc')->orderBy('id', 'desc')->get();
        return view('layouts.main', ['tasks' => $tasks]);
    }

    public function create(Request $request){
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Task::create($request->all());
        return redirect('index');
    
    }

    public function status($id){
        
        $task = Task::findOrFail($id);
        $task->status = $task->status == 1 ? 0 : 1;
        $task->save();

        return redirect('index');
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->update($request->all());
    
        return redirect('index');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
    
        if (!$task) {
            return redirect('index');
        }
    
        $task->delete();
    
        return redirect('index');
    }    
}