<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{

    public function index(){
        $tasks = Task::all();
        return view('layouts.main', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
    
        try {
            $task = new Task();
            $task->position = Task::count() + 1;
            $task->title = $request->input('title');
            $task->description = $request->input('description');
            $task->save();
    
            DB::commit();
    
            Session::flash('message', 'Task Created');
            Session::flash('alert-class', 'alert-success');
            return redirect('todoApp');
        } catch (\Exception $e) {
            DB::rollback();
    
            Session::flash('message', 'Task Not Created');
            Session::flash('alert-class', 'alert-danger');
            return redirect('todoApp');
        }
    }

    public function status($id){
        
        $task = Task::findOrFail($id);
        $task->status = $task->status == 1 ? 0 : 1;
        $task->save();

        if ($task->status == 1) {
            Session::flash('message', 'Task Checked');
        } else {
            Session::flash('message', 'Task Unchecked');
        }
        Session::flash('alert-class', 'alert-primary');
        return redirect('todoApp');
    }

    public function update(Request $request, $id){
        
        $task = Task::find($id);
        $task->update($request->all());
    
        Session::flash('message', 'Task Updated');
        Session::flash('alert-class', 'alert-dark');
        return redirect('todoApp');
    }

    public function destroy($id){
        
        $task = Task::find($id);
    
        if (!$task) {
            return redirect('todoApp');
        }
    
        $task->delete();
    
        Session::flash('message', 'Task Deleted');
        Session::flash('alert-class', 'alert-danger');
        return redirect('todoApp');
    }    
}