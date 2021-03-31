<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Task;
use App\Http\Requests\TaskRequest;

use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('indes');
        $this->crearTask();
        $tasks = Task::latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearTask()
    {
        //dd('task');

        return view('tasks.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        //guardar

        $task = Task::create(['user_id' => auth()->user()->id] + $request->all());

        //imagen
        if ($request->file('file')) {
            $task->image = $request->file('file')->store('tasks', 'public');
            $task->save();
        }
        //retornar
        return back()->with('status', 'Creado con éxito');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());

        //imagen
        if ($request->file('file')) {

            //1 eliminar imagen anterior,
            Storage::disk('public')->delete($task->image);
            //posteriormente guardar la nueva

            $task->image = $request->file('file')->store('tasks', 'public');
            $task->save();
        }

        return back()->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        Storage::disk('public')->delete($task->image);

        return back()->with('status', 'Eliminado con éxito');
    }
}
