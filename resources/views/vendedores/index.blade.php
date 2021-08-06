@extends('layouts.template')


@section('content')
<div class="col-md-12">
		<div class="card">
			<div class="card-header">
            <div class="d-flex align-items-center">
					<h4 class="card-title">Vendedores</h4>
                    <a class="btn btn-primary btn-round ml-auto" href="{{ route('vendedores.create') }}">
					      <i class="fa fa-plus"></i>
						  Nuevo vendedor
					</a>
				</div>
			</div>

            <div class="card-body">
			<div class="table-responsive">
			<table id="datatable" class="display table table-striped table-hover" >
			<thead class="">
				<tr>
				<th scope="col">#</th>
                <th scope="col">Rut</th>
				<th scope="col">Nombre</th>
				<th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody>
            @foreach ($sellers as $s)
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$s->rut }}</td>
            <td>{{$s->name}} {{$s->last_name}}</td>
            <td><div class="form-button-action">
                        <a type="button" href="{{ route('vendedores.edit', $s->id) }}"
                         data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg"
                         data-original-title="Editar">
                         <i class="fa fa-edit"></i>
                        </a>
                        <button class="btn btn-link btn-danger  remove" data-id="{{ $s->id }}" data-action="{{ route('vendedores.destroy',$s->id) }}"  data-original-title="Eliminar"><i class="fa fa-times"></i></button>
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