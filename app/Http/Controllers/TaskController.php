<?php

namespace App\Http\Controllers;
use App\Task;
use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {


//        $tasks = Task::orderBy('tasks.created_at', 'desc')
//            ->get();
//        ;

            return view('tasks.index',['tasks'=>Task::orderBy('tasks.created_at', 'desc')->get(),]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create', ['task'=>[],
        'users'=>User::get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
   {
        $task=Task::create($request->except('users'));
               if($request->input('users')):
                   $task->users()->attach($request->input('users'));
endif;


        return redirect()->route('task.index',$task);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

//        $task=Task::find($id);
//        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $task=Task::find($id);
        if(!$task){
            return redirect()->route('task.index')->withErrors("Данный пост не существует");
        }
        return view('tasks.edit', compact('task'),['users'=>User::get() ]);
//        return view('tasks.edit',['task'=>$id, 'users'=>User::get() ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
        $task = Task::find($id);
        $task->update($request->except('users'));
//        $id = $task->id;
        $task->users()->detach();
        if($request->input('users')):
            $task->users()->attach($request->input('users'));
        endif;
        return redirect()->route('task.index',$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->users()->detach();
        $task->delete();
        return redirect()->route('task.index',$id);
    }
}
