@extends('layouts.root')
@section('title', __("Reset Password"))
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
                  <h5 class="card-title text-center">{{ __('Reset Password') }}</h5>
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
                     <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">{{ __('Send Password Reset Link') }}</button>
                     @if (Route::has('password.request'))
                     <a class="btn btn-link" href="{{ route('register') }}">
                        {{ __('New Account') }}
                     </a>
                     @endif
                     <a class="btn btn-link float-right" href="{{ route('login') }}">
                        {{ __('Login to Existing Account') }}
                     </a>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
