@extends('layouts.app')
@section('title', __("Create employee"))
@section('content')
<div class="container-fluid p-5">
   <div class="row">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">{{__("New employee")}}</div>
            <div class="card-body">
               <form id="create" action="{{ route("employees.store") }}" method="POST">
                  @csrf
                  <div class="form-group">
                     <label>{{__("First name")}}</label>
                     <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}">
                     <p class="invalid-feedback">{{ $errors->first('first_name') ?? '' }}</p>
                  </div>
                  <div class="form-group">
                     <label>{{__("Last name")}}</label>
                     <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}">
                     <p class="invalid-feedback">{{ $errors->first('last_name') ?? '' }}</p>
                  </div>
                  <div class="form-group">
                     <label>{{__("Company")}}</label>
                     <select name="company" class="form-control {{ $errors->has('company') ? ' is-invalid' : '' }}">
                        <option value="">{{__("No company")}}</option>
                        @foreach ($companies as $id => $name)
                           <option value="{{ $id }}">{{ $name }}</options>
                        @endforeach
                     </select>
                     <p class="invalid-feedback">{{ $errors->first('company') ?? '' }}</p>
                  </div>
                  <div class="form-group">
                     <label>{{__("Email")}}</label>
                     <input type="email" name="email" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}">
                     <p class="invalid-feedback">{{ $errors->first('email') ?? '' }}</p>
                  </div>
                  <div class="form-group">
                     <label>{{__("Phone")}}</label>
                     <input type="text" name="phone" value="{{ old('phone') }}" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}">
                     <p class="invalid-feedback">{{ $errors->first('phone') ?? '' }}</p>
                  </div>
                  <div class="text-right">
                     <a href="{{ route("employees.index") }}" class="btn btn-danger">{{__("Go back")}}</a>
                     <button type="submit" class="btn btn-success ml-2">{{__("Submit form")}}</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
