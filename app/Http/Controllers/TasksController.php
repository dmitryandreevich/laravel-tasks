<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TasksController extends Controller
{
    public function index(){
        $tasks = Task::orderBy('created_at','asc')->get();
        return view('tasks.main',compact('tasks'));
    }
    public function addTask(Request $request){
        $task = new Task;
        $task->name = $request->input('name');
        $task->save();

        return redirect("/tasks");
    }
    public function deleteTask($task){
        $task->delete();
    }
    public function changeTask(Request $request, $taskId){
        $task = Task::find($taskId);
        $name = $request->input('name');
        $task->name = $name;

        $task->save();
        return redirect('/tasks');
    }
    public function selTask(Request $request,$taskId){
        $task = Task::find($taskId);
        if(is_null($task)){
            return 0;
        }
        if($request->has('delete'))
            $task->delete();
        else if($request->has('change')) {

            return view('tasks.change', [
                'name' => $task->name,
                'id' => $task->id
            ]);
        }

        return redirect('/tasks');
    }


}
