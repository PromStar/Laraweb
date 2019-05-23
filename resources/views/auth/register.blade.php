@extends('layouts.root')
@section('title', __("Register"))
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
                  <h5 class="card-title text-center">{{ __('Register') }}</h5>
                  <form class="form-signin" method="POST" action="{{ route('register') }}">
                     @csrf
                     <div class="form-label-group">
                        <input type="text" id="inputName" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" required autofocus>
                        <label for="inputName">{{ __('Name') }}</label>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="form-label-group">
                        <input type="email" id="inputEmail" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" required>
                        <label for="inputEmail">{{ __('Email') }}</label>
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
                     <div class="form-label-group">
                        <input type="password" id="inputPasswordConfirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="{{ __('Confirm Password') }}" required>
                        <label for="inputPasswordConfirmation">{{ __('Confirm Password') }}</label>
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">{{ __('Register') }}</button>
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
