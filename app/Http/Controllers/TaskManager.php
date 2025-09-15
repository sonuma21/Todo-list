<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskManager extends Controller
{
    public function addTask()
    {
        return view('task.add');
    }

    public function viewTasks()
    {
        $tasks = Tasks::where("user_id", Auth::id())->where("status", "completed")->paginate(8);
        return view('task.view', compact('tasks'));
    }

    public function addTaskPost(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'deadline' => 'required|date|after_or_equal:today',
            'description' => 'required|string',
        ]);
        $task = new Tasks();
        $task->title = $request->title;
        $task->deadline = $request->deadline;
        $task->description = $request->description;
        $task->user_id = Auth::user()->id;
        $task->save();
        toast("Task Added Successfully", "success");
        return redirect(route('home'));
    }
    public function listTasks()
    {

        $tasks = Tasks::where("user_id", Auth::id())->where("status", NULL)->paginate(8);
        return view('welcome', compact('tasks'));
    }

    public function updateTaskStatus($id)
    {
        if (Tasks::where("user_id", Auth::user()->id)
            ->where('id', $id)->update(['status' => "completed"])
        ) {
            toast("Task Completed Successfully", "success");
            return redirect(route('home'));
        }
        toast("Task not added", "unsuccessful");
        return redirect(route('home'));
    }

    public function deleteTaskStatus($id)
    {
        if (Tasks::where("user_id", Auth::user()->id)
            ->where('id', $id)->delete()
        ) {
            toast("Task Deleted Successfully", "success");
            return redirect()->back();
        }
        toast("Task failed to delete", "unsuccessful");
        return redirect(route('home'));
    }
}
