<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::orderBy('status', 'asc')->orderBy('id', 'desc')->get();
        return view('layouts.main', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
    
        try {
            $task = new Task();
            $task->title = $request->input('title');
            $task->description = $request->input('description');
            $task->save();
    
            DB::commit();
    
            return redirect('todoApp');
        } catch (\Exception $e) {
            DB::rollback();
    
            return redirect('todoApp');
        }
    }

    public function status($id){
        
        $task = Task::findOrFail($id);
        $task->status = $task->status == 1 ? 0 : 1;
        $task->save();

        return redirect('todoApp');
    }

    public function update(Request $request, $id){
        
        $task = Task::find($id);
        $task->update($request->all());
    
        return redirect('todoApp');
    }

    public function destroy($id){
        
        $task = Task::find($id);
    
        if (!$task) {
            return redirect('todoApp');
        }
    
        $task->delete();
    
        return redirect('todoApp');
    }    
}