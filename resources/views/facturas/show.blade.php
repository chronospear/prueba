@extends('layouts.template')

@section('content')
<div class="col-md-12">
		<div class="card">
			<div class="card-header">
            <div class="d-flex align-items-center">
					<h4 class="card-title">Factura N° {{$invoice->id}}</h4>
                    <a type="button" class="btn btn-previous btn-fill btn-default btn-round ml-auto" href="{{ route('facturas.index') }}">Volver</a>
			</div>
			<div class="card-body">

            <div class="row mt-3">

            <div class="col-md-6">
					<div class="form-group form-group-default">
						<label>Fecha</label>
							<input type="text" class="form-control" name="fecha" value="{{\Carbon\Carbon::parse($invoice->date)->format('d/m/Y')}}">
					</div>
				</div>

                <div class="col-md-6">
					<div class="form-group form-group-default">
						<label>Tipo</label>
							<input type="text" class="form-control" name="tipo" value="{{$invoice->type}}">
					</div>
				</div>

                <div class="col-md-6">
					<div class="form-group form-group-default">
						<label>Usuario</label>
							<input type="text" class="form-control" name="usuario" value="{{$invoice->user->name ?? 'Sin'}} {{$invoice->user->last_name ?? 'Usuario'}}">
					</div>
				</div>

                <div class="col-md-6">
					<div class="form-group form-group-default">
						<label>Vendedor</label>
							<input type="text" class="form-control" name="vendedor" value="{{$invoice->seller->name ?? 'Sin'}} {{$invoice->seller->last_name ?? 'Vendedor'}}">
					</div>
				</div>

                <div class="col-md-6 ml-auto mr-auto    ">
					<div class="form-group form-group-default">
						<label>Total</label>
							<input type="text" class="form-control" name="description" placeholder="description" value="$ {{number_format($invoice->totalproducts())}}">
					</div>
				</div>

            </div>

            <div class="card">      
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Productos</h4>
                        <a class="btn btn-primary btn-round ml-auto"  href="{{ route('productos.create') }}">
                            <i class="fa fa-plus"></i>
                            Nuevo producto
                        </a>
                </div>

            <div class="card-body">
                <div class="table-responsive">
                <table id="datatable" class="display table table-striped table-hover" >
                <thead class="">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">nombre</th>
                    <th scope="col">cantidad</th>
                    <th scope="col">precio</th>
                    <th scope="col">Total</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($invoice->product as $p)
                <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$p->name}}</td>
                <td>{{$p->quantity}}</td>
                <td>$ {{number_format($p->price)}}</td>
                <td>$ {{number_format($p->total())}}</td>
                <td><div class="form-button-action">
                        <a type="button" href="{{ route('productos.edit', $p->id) }}"
                         data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg"
                         data-original-title="Editar">
                         <i class="fa fa-edit"></i>
                        </a>
                        <button class="btn btn-link btn-danger  remove" data-id="{{ $p->id }}" data-action="{{ route('productos.destroy',$p->id) }}"  data-original-title="Eliminar"><i class="fa fa-times"></i></button>
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

                
    </div>
 </div>
</div>

@endsection