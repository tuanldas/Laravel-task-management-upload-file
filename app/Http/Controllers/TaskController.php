<?php

namespace App\Http\Controllers;

use App\Model\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function getAll() {
        $tasks = Task::all();
        return view('list', compact('tasks'));
    }

    public function add() {
        return view('add');
    }

    public function store(Request $request) {
        //Khởi tạo mới đối tượng task, gán các trường tương ứng với request gửi lên từ trình duyệt
        $task = new Task();
        $task->title = $request->inputTitle;
        $task->content = $request->inputContent;
        $task->due_date = $request->inputDueDate;

        if (!$request->hasFile('inputFile')) {
            $task->image = $task->input('inputFile');
        } else {
            $file = $request->file('inputFile');

            $fileExtension = $file->getClientOriginalExtension();
            $fileName = $request->input('inputFileName');

            $newFileName = "$fileName.$fileExtension";

            $request->file('inputFile')->storeAs('public/images', $newFileName);

            $task->image = $newFileName;
        }

        $task->save();
        return redirect()->route('welcome');
    }
}
