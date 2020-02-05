<?php

namespace App\Http\Controllers;

use App\Tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');

    }

    public function index()
    {
        $tasks = Tasks::latest()->paginate(5);


        return view('tasks.index',compact('tasks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


  
    public function create()
    {
        return view('tasks.create');
    }


    
    public function store(Request $request)
    {
        request()->validate([
            'task_name' => 'required',
            'task_detail' => 'required',
            'user_id' => 'required',
        ]);


        Tasks::create($request->all());


        return redirect()->route('tasks.index')
                        ->with('success','Task created successfully.');
    }


    
    public function show(Tasks $task)
    {
        return view('tasks.show',compact('task'));
    }


    public function edit(Tasks $task)
    {
        return view('tasks.edit',compact('task'));
    }


   
    public function update(Request $request, Tasks $task)
    {
         request()->validate([
            'task_name' => 'required',
            'task_detail' => 'required',
            'user_id' => 'required',
        ]);


        $task->update($request->all());


        return redirect()->route('tasks.index')
                        ->with('success','Task updated successfully');
    }


    public function destroy(Tasks $task)
    {
        $task->delete();


        return redirect()->route('tasks.index')
                        ->with('success','Task deleted successfully');
    }
}