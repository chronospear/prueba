@extends('layouts.template')


@section('content')

<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="d-flex align-items-center">
					<h4 class="card-title">Información</h4>
				</div>
			</div>

            <div class="card-body">

         
									<ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
									<li class="nav-item">
											<a class="nav-link active" id="pills-comandos-tab" data-toggle="pill" href="#pills-comandos" role="tab" aria-controls="pills-comandos" aria-selected="true">Comandos</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-jetstream-tab" data-toggle="pill" href="#pills-jetstream" role="tab" aria-controls="pills-jetstream" aria-selected="false">Jetstream</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-livewire-tab" data-toggle="pill" href="#pills-livewire" role="tab" aria-controls="pills-livewire" aria-selected="false">Livewire</a>
										</li>
									</ul>

									
									<div class="tab-content mt-2 mb-3" id="pills-tabContent">
									<div class="tab-pane fade show active" id="pills-comandos" role="tabpanel" aria-labelledby="pills-comandos-tab">
											<p>El primer paso para ejecutar Laravel es utilizar el comando:</p>
											<hr>
											<li>composer create-project --prefer-dist laravel/laravel miproyecto</li>
											<hr>
											<p>Este comando creara un nuevo proyecto de Laravel en la ruta asignada, luego para poder ver la pagina por defecto de Laravel situada en la raiz hay que levantar el servidor con el siguiente comando:</p>
											<hr>
											<li>php artisan serve</li>
											<hr>
											<p>Para finalizar solo hay que ir a la ruta por defecto que asigna Laravel en nuestro navegador: </p>
											<hr>
											<li>http://127.0.0.1:8000/</li>
										</div>
										<div class="tab-pane fade" id="pills-jetstream" role="tabpanel" aria-labelledby="pills-jetstream-tab">
											<p>Jetstream es un scaffolding diseñado para Laravel 8  el cual cuenta con las siguientes caracteristicas:
                                                <ul>
                                                    <li>Verificación por correo electrónico</li>
                                                    <li>Autenticación de dos factores</li>
                                                    <li>Administrador de sesiones</li>
                                                    <li>Soporte de Api</li>
                                                </ul>
                                                Esto ayuda a tener una base solida a la hora de construir un proyecto, ya que el tiempo de desarrollo se disminuye considerablemente, ejemplo para un sistema de autentificación completo (vista de perfil, modificar datos, cargar una imagen de avatar, cambiar contraseña, crear tokens de autentificación y un sistema de roles) que normalmente tomaria dias de desarrollo para realizarlo desde cero con Jetstream tomaria cuestión de minutos, para utilizar Jetstream debe instalarse al momento de realizar la instalación de Laravel con cualquiera de sus dos stack Livewire o Inertia, tambien provee de un diseño moderno para las aplicaciones a desarrollar
                                            </p>
										</div>
										<div class="tab-pane fade" id="pills-livewire" role="tabpanel" aria-labelledby="pills-livewire-tab">
											<p>Livewire es un framework desarrollado para Laravel 8, el cual permite crear interfaces dinamicas de manera sencilla y continuando con el uso de las vistas Blade, permite generar comportamientos dinamicos sin el uso de javascript (esto significa no escribir codigo del lado del cliente) , esto es posible gracias al uso de Ajax, similar a Vue y React pero de forma mas simple, por ejemplo Livewire muestra una lista de datos y cada vez que se agrega un nuevo dato a esa lista Livewire realiza una peticion Ajax y vuelve a renderizar la lista y mostrarla actualizada sin necesidad de una codificacion adicional para genera este comportamiento.</p>
											</p>
										</div>

										
									
             </div>
        </div>
</div>



@endsection