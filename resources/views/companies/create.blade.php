@extends('layouts.app')
@section('title', __("Create company"))
@section('content')
<div class="container-fluid p-5">
   <div class="row">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">{{__("New company")}}</div>
            <div class="card-body">
               <form id="create" action="{{ route("companies.store") }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                     <label>{{__("Name")}}</label>
                     <input type="text" name="name" value="{{ old('name') }}" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}">
                     <p class="invalid-feedback">{{ $errors->first('name') ?? '' }}</p>
                  </div>
                  <div class="form-group">
                     <label>{{__("Email")}}</label>
                     <input type="email" name="email" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}">
                     <p class="invalid-feedback">{{ $errors->first('email') ?? '' }}</p>
                  </div>
                  <div class="form-group">
                     <label>{{__("Logo")}}</label>
                     <div class="custom-file">
                         <input type="file" name="logo" class="custom-file-input {{ $errors->has('logo') ? ' is-invalid' : '' }}" id="logoFile">
                         <label class="custom-file-label" for="logoFile">{{__("Choose file...")}}</label>
                         <div class="invalid-feedback">{{ $errors->first('logo') ?? '' }}</div>
                     </div>
                  </div>

                  <div class="form-group">
                     <label>{{__("Website")}}</label>
                     <input type="text" name="website" value="{{ old('website') }}" class="form-control {{ $errors->has('website') ? ' is-invalid' : '' }}">
                     <p class="invalid-feedback">{{ $errors->first('website') ?? '' }}</p>
                  </div>
                  <div class="text-right">
                     <a href="{{ route("companies.index") }}" class="btn btn-danger">{{__("Go back")}}</a>
                     <button type="submit" class="btn btn-success ml-2">{{__("Submit form")}}</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('label.custom-file-label').html(fileName);
        });
    });
</script>
@endsection
