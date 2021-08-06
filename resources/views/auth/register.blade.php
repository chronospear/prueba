@extends('layouts.login-register')

@section('content')
            <h3 class="text-center">{{ __('Registrarse') }}</h3>
            <form method="POST" action="{{ route('register') }}">
            @csrf
				<div class="form-group form-floating-label">
					<input id="name" name="name" type="text" class="form-control input-border-bottom {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required autofocus>
					<label for="name" class="placeholder">Nombre</label>
                    @error('name')
                       <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                     @enderror
				</div>
                <div class="form-group form-floating-label">
					<input id="last_name" name="last_name" type="text" class="form-control input-border-bottom {{ $errors->has('last_name') ? ' is-invalid' : '' }}" value="{{ old('last_name') }}" required autofocus>
					<label for="last_name" class="placeholder">Apellidos</label>
                    @error('last_name')
                       <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                     @enderror
				</div>
                <div class="form-group form-floating-label">
					<input id="rut" name="rut" type="text" class="form-control input-border-bottom {{ $errors->has('rut') ? ' is-invalid' : '' }}" value="{{ old('rut') }}" required oninput="checkRut(this)" maxlength="10" autofocus>
					<label for="rut" class="placeholder">Rut</label>
                    <small class="text-danger" id="check"></small>
                    @error('rut')
                       <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                     @enderror
				</div>
                <div class="form-group form-floating-label">
					<input id="email" name="email" type="email" class="form-control input-border-bottom {{ $errors->has('email') ? ' is-invalid' : '' }}"  required autofocus>
					<label for="email" class="placeholder">Correo</label>
                    @error('email')
                       <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                     @enderror
				</div>
                <div class="form-group form-floating-label">
					<input id="password" name="password" type="password" class="form-control input-border-bottom {{ $errors->has('password') ? ' is-invalid' : '' }}"  required autofocus>
					<label for="password" class="placeholder">Contraseña</label>
                    @error('password')
                       <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                </div>

                <div class="form-group form-floating-label">
                    <input id="password-confirm" type="password" class="form-control input-border-bottom" name="password_confirmation" required>
                    <label for="password-confirm" class="placeholder">Confirmar Contraseña</label>

                </div>
        
                
                <div class="form-action">
					<a href="{{ url()->previous() }}" id="show-signin" class="btn btn-danger btn-link btn-login mr-3">Cancelar</a>
					<Button type="submit" class="btn btn-primary btn-rounded btn-login">Registrarse</a>
				</div>
                </form>
            </div>
        </div>
    </div>
@section('js')
<script src="../../js/validarRUT.js"></script>
@endsection
@endsection

