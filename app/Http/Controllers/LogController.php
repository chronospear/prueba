<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Task;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Mail\newlog;
use Illuminate\Support\Facades\Mail;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'commentary' => 'required|string'];

            $Mensaje=['required' => 'El comentario es obligatorio.'];

            $this->validate($request,$campos,$Mensaje);

            $l = new Log();
            $l->commentary = $request->commentary;
            $l->tasks_id = $request->task;
            $l->date = Carbon::now();
            $l->save();

          $user = Task::where('id',$request->task)->pluck('author_id');
          $email = User::where('id',$user)->pluck('email');
         $data=$request->task;
          //Mail::to($email)->send(new newlog($data));
        return redirect('tareas')->with('status','Log ingresado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(Log $log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(Log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Log $log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy($log)
    {
        $log = Log::find($log);
        $log->delete();

        return redirect()->back()->with('status','Log eliminado exitosamente.');
    }
}
