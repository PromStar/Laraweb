@extends('layouts.app')
@section('title', __("Edit employee"))
@section('content')
<style>
img.image-preview {
   max-height: 200px;
   padding: 5px;
   border: 1px solid #ced4da;
}
</style>
<div class="container-fluid p-5">
   <div class="row">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">{{__("Edit company")}}</div>
            <div class="card-body">
               <form id="create" action="{{ route("companies.update", $data->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method("PATCH")
                  <div class="form-group">
                     <label>{{__("Name")}}</label>
                     <input type="text" name="name" value="{{ $data->name }}" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}">
                     <p class="invalid-feedback">{{ $errors->first('name') ?? '' }}</p>
                  </div>
                  <div class="form-group">
                     <label>{{__("Email")}}</label>
                     <input type="email" name="email" value="{{ $data->email }}" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}">
                     <p class="invalid-feedback">{{ $errors->first('email') ?? '' }}</p>
                  </div>
                  <div class="form-group">
                     <label>{{__("Logo")}}</label>
                     <div class="custom-file">
                        <input type="file" name="logo" class="custom-file-input {{ $errors->has('logo') ? ' is-invalid' : '' }}" id="logoFile">
                        <label class="custom-file-label" for="logoFile">{{ $data->logo ?? __("Choose file...")}}</label>
                        <div class="invalid-feedback">{{ $errors->first('logo') ?? '' }}</div>
                     </div>
                  </div>
                  @if ($data->logo)
                  <div class="form-group">
                     <img class="image-preview" src="{{asset('storage/' . $data->logo)}}"/>
                  </div>
                  <div class="form-group">
                     <input type="checkbox" id="removeImage" name="remove_image">
                     <label for="removeImage">{{__("Remove image")}}</label>
                  </div>
                  @endif
                  <div class="form-group">
                     <label>{{__("Website")}}</label>
                     <input type="text" name="website" value="{{ $data->website }}" class="form-control {{ $errors->has('website') ? ' is-invalid' : '' }}">
                     <p class="invalid-feedback">{{ $errors->first('website') ?? '' }}</p>
                  </div>
                  <div class="float-right">
                     <a href="{{ route("companies.index") }}" class="btn btn-primary">{{__("Go back")}}</a>
                     <button type="submit" class="btn btn-success ml-2">{{__("Submit form")}}</button>
                  </div>
               </form>
               <div class="float-left">
                  <form action="{{ route('companies.destroy', $data->id) }}" method="POST">
                     @csrf
                     @method("DELETE")
                     <button type="submit" class="btn btn-danger">{{__("Delete company")}}</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
   $('input[type="file"]').change(function(e){
      var fileName = e.target.files[0].name;
      $('img.image-preview').remove();
      $('label.custom-file-label').html(fileName);
   });
});
</script>
@endsection
