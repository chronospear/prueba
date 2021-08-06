@extends('layouts.login-register')

@section('content')
        <h3 class="text-center">{{ __('Iniciar Sesión') }}</h3>
            <form method="POST" action="{{ route('login') }}">
               @csrf
               <div class="login-form">

				<div class="form-group form-floating-label">
					<input id="email" name="email" type="text" class="form-control input-border-bottom @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
					<label for="email" class="placeholder">{{ __('Correo') }}</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>



                <div class="form-group form-floating-label">
					<input id="password" name="password" type="password" class="form-control input-border-bottom @error('password') is-invalid @enderror" required>
					<label for="password" class="placeholder">{{ __('Contraseña') }}</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>

             
				 <div class="form-action mb-3">
                    <button type="submit"  class="btn btn-primary btn-rounded btn-login"> {{ __('Entrar') }}</button>
				</div>
                
                <div class="login-account">
					<span class="msg">¿No tienes una cuenta?</span>
					<a href="{{ route('register') }}" id="show-signup" class="link">Registrate</a>
				</div>
		    </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
    