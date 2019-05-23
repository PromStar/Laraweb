@extends('layouts.root')
@section('title', __("Verify Your Email Address"))
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
                  <h5 class="card-title text-center">{{ __('Verify Your Email Address') }}</h5>
                  @if (session('resent'))
                      <div class="alert alert-success" role="alert">
                          {{ __('A fresh verification link has been sent to your email address.') }}
                      </div>
                  @endif

                  {{ __('Before proceeding, please check your email for a verification link.') }}
                  {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.

               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
