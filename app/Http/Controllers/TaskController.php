<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Log;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = Task::Get();
        
        return view('tareas.index',compact('task'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::Get();
        return view('tareas.create', compact('users'));
    }

    public function logadd($id){

        $task = Task::find($id);
        return view('tareas.logadd', compact('task'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $campos=[
            'name'=>'required|string',
            'description' => 'required|string',
            'estimated_date'=>'required|',
            'maxdate' => 'required|date_format:d/m/Y|after_or_equal:estimated_date',
            'user_id' => 'required|integer'];

            $Mensaje=[
            'name.required' => 'El nombre de la tarea es obligatorio',
            'description.required' => 'La descripción es obligatoria.',
            'estimated_date.required' => 'La fecha estimada de ejecución de la tarea es obligatoria',
            'maxdate.required' => 'La fecha maxima de ejecución de la tarea es obligatoria',
            'maxdate.date' => 'Se debe ingregar un formato de fecha valido',
            'estimated_date.date' => 'Se debe ingregar un formato de fecha valido',
            'user_id.required' => 'El usuario es obligatorio',
            'user_id.integer' => 'El usuario es obligatorio',
            'maxdate.after_or_equal'=> 'La fecha maxima no puede ser anterior a la fecha estimada.'
            ];

        $this->validate($request,$campos,$Mensaje);

        $userAuthor = Auth::user()->id;

        $t = new Task;
        $t->name = $request->name;
        $t->description = $request->description;
        $t->estimated_date = Carbon::createFromFormat('d/m/Y',$request->estimated_date)->format('Y-m-d');
        $t->max_date =Carbon::createFromFormat('d/m/Y', $request->maxdate)->format('Y-m-d');
        $t->author_id = $userAuthor;
        $t->user_id = $request->user_id;
        $t->save();

        return redirect('tareas')->with('status','Tarea ingresada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user()->id;

        $task = Task::find($id);

        if($task['users_id']==$user || $task['author_id']==$user){
           
            $logs = Log::where('tasks_id',$id)->get();
            return view('tareas.show',compact('task','logs'));
        }else{

            return redirect('tareas');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user()->id;

        $task = Task::find($id);

        if($task['author_id']==$user){

        $task = Task::find($id);
        $users = User::Get();
        return view('tareas.edit', compact('task','users'));
        }else{

            return redirect('tareas');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $campos=[
                'name'=>'required|string',
                'description' => 'required|string',
                'estimated_date'=>'required|',
                'maxdate' => 'required|date_format:d/m/Y|after_or_equal:estimated_date',
                'user_id' => 'required|integer'];
    
                $Mensaje=[
                'name.required' => 'El nombre de la tarea es obligatorio',
                'description.required' => 'La descripción es obligatoria.',
                'estimated_date.required' => 'La fecha estimada de ejecución de la tarea es obligatoria',
                'maxdate.required' => 'La fecha maxima de ejecución de la tarea es obligatoria',
                'maxdate.date' => 'Se debe ingregar un formato de fecha valido',
                'estimated_date.date' => 'Se debe ingregar un formato de fecha valido',
                'user_id.required' => 'El usuario es obligatorio',
                'user_id.integer' => 'El usuario es obligatorio',
                'maxdate.after_or_equal'=> 'La fecha maxima no puede ser anterior a la fecha estimada.'
                ];
    
            $this->validate($request,$campos,$Mensaje);
            $t = Task::find($id);
            $estimated = Carbon::createFromFormat('d/m/Y',$request->estimated_date)->format('Y-m-d'); 
            $max = Carbon::createFromFormat('d/m/Y', $request->maxdate)->format('Y-m-d');
            if($t->name != $request->name ||
               $t->description != $request->description ||
               $t->estimated_date != $estimated ||
               $t->max_date != $max||
               $t->user_id != $request->user_id){

            $t->name = $request->name;
            $t->description = $request->description;
            $t->estimated_date = $estimated;
            $t->max_date =$max;
            $t->user_id = $request->user_id;
            $t->save();
          

         
            return redirect('tareas')->with('status','¡La Tarea fue editada exitosamente!.');

         }else{

            return redirect('tareas')->with('status','No se ingresaron datos nuevos.');
         }

        
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user()->id;

        $task = Task::find($id);

        if($task['author_id']==$user){
           
            $t = task::find($id);
            $t->delete();
            return redirect('tareas')->with('status','¡La Tarea fue eliminada exitosamente!.');
        }else{

            return redirect('tareas');
        }
        
    }
}
