@extends('layouts.root')
@section('title', __("Sign In"))
@section('content')
<div class="vertical-center">
   <div class="container">
      <div class="lara-title m-b-md">
          <a href="{{ route("welcome") }}">Laraweb</a>
      </div>
      <div class="row">
         <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin">
               <div class="card-body">
                  <h5 class="card-title text-center">{{ __("Sign In") }}</h5>
                  <form class="form-signin" method="POST" action="{{ route('login') }}">
                     @csrf
                     <div class="form-label-group">
                        <input type="email" id="inputEmail" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('E-Mail Address') }}" required autofocus>
                        <label for="inputEmail">{{ __('E-Mail Address') }}</label>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="form-label-group">
                        <input type="password" id="inputPassword" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" required>
                        <label for="inputPassword">{{ __('Password') }}</label>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember">{{ __("Remember password") }}</label>
                     </div>
                     <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">{{ __("Sign in") }}</button>
                     @if (Route::has('password.request'))
                     <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                     </a>
                     @endif
                     <a class="btn btn-link float-right" href="{{ route('register') }}">
                        {{ __('New Account') }}
                     </a>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
