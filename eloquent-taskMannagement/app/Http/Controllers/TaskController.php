<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //tao ham hien thi
    public function index()
    {
        $tasks = Task::all();
        return view('task.list', compact('tasks'));
    }

//tao form
    public function create()
    {
        return view('tasks.create');
    }

    //tao ham them moi
    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request->input('title');
        $task->content = $request->input('content');
        //uploade file
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('image', 'public');
            $task->image = $path;
        }

        $task->due_date = $request->input('due_date');
        $task->save();
        return redirect()->route('tasks.index');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->title = $request->input('title');
        $task->content = $request->input('content');

        //cap nhat anh
        if ($request->hasFile('image')) {

            //xoa anh cu neu co
            $currentImg = $task->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            // cap nhat anh moi
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $task->image = $path;
        }

        $task->due_date = $request->input('due_date');
        $task->save();

        return redirect()->route('tasks.index');
    }
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $image = $task->image;
        if ($image) {
            Storage::delete('/public/' . $image);
        }
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
