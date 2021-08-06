@extends('layouts.template')

@section('content')
<div class="col-md-12">
		<div class="card">
			<div class="card-header">
            <div class="d-flex align-items-center">
					<h4 class="card-title">Tarea</h4>
                    <a type="button" class="btn btn-previous btn-fill btn-default btn-round ml-auto" href="{{ route('tareas.index') }}">Volver</a>
			</div>
			<div class="card-body">

            <div class="row mt-3">

				<div class="col-md-6">
					<div class="form-group form-group-default">
						<label>Nombre</label>
							<input type="text" class="form-control" name="name" placeholder="Name" value="{{$task->name}}">
                            @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                            @enderror
					</div>
				</div>

                <div class="col-md-6">
					<div class="form-group form-group-default">
						<label>descripción</label>
							<input type="text" class="form-control" name="description" placeholder="description" value="{{$task->description}}">
                            @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                            @enderror
					</div>
				</div>

                <div class="col-md-6">
					<div class="form-group form-group-default">
						<label>Fecha de ejecución</label>
							<input type="text" class="form-control" name="estimated_date" placeholder="estimated_date" value="{{ \Carbon\Carbon::parse($task->estimated_date)->format('d/m/Y')}}">
                            @error('estimated_date')
                                    <small class="text-danger">{{ $message }}</small>
                            @enderror
					</div>
				</div>

                <div class="col-md-6">
					<div class="form-group form-group-default">
						<label>Fecha maxima de ejecución</label>
							<input type="text" class="form-control" name="maxdate" placeholder="maxdate" value="{{ \Carbon\Carbon::parse($task->max_date)->format('d/m/Y')}}">
                            @error('maxdate')
                                    <small class="text-danger">{{ $message }}</small>
                            @enderror
					</div>
				</div>

                <div class="col-md-6">
					<div class="form-group form-group-default">
						<label>Usuario asignado</label>
							<input type="text" class="form-control" name="user" placeholder="user" value="{{ $task->user->name ?? 'sin' }} {{ $task->user->last_name ?? 'Usuario'}}">
                            @error('user')
                                    <small class="text-danger">{{ $message }}</small>
                            @enderror
					</div>
				</div>

                <div class="col-md-6">
					<div class="form-group form-group-default">
						<label>Autor de la tarea</label>
							<input type="text" class="form-control" name="author" placeholder="author" value="{{ $task->author->name }} {{ $task->author->last_name }}">
                            @error('author')
                                    <small class="text-danger">{{ $message }}</small>
                            @enderror
					</div>
				</div>

                
</div>

</div>
</div>

    <div class="card">      
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Logs</h4>
                    <a class="btn btn-primary btn-round ml-auto"  href="{{ url('tareas/' . $task->id . '/logadd') }}">
                        <i class="fa fa-plus"></i>
                        Nuevo log
                    </a>
            </div>
            <div class="table-responsive">
                        <table id="datatable" class="display table table-striped table-hover" >
                        <thead class="">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Comentarios</th>
                            <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($logs as $l)
                        <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{ \Carbon\Carbon::parse($l->date)->format('d/m/Y')}}</td>
                        <td>{{$l->commentary}}</td> 
                        <td><div class="form-button-action">
                                    <button class="btn btn-link btn-danger  remove" data-id="{{ $l->id }}" data-action="{{ route('logs.destroy',$l->id) }}"  data-original-title="Eliminar"><i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
            </div>			
        </div>
    </div>
</div>















                        

        
        

                       


                     

                   


                        
                      
@section('js')
<script src="../../js/remove.js"></script>
@endsection
@endsection