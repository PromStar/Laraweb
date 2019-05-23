@extends('layouts.app')
@section('title', __("Employees"))
@section('content')
<div class="container-fluid p-5">
   <div class="row">
      <div class="col-md-12">
         <div class="form-group">
            <a href="{{ route("employees.create") }}" class="btn btn-success">{{__("Create new employee")}}</a>
         </div>
      </div>
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">{{__("Companies")}}</div>

            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
               @endif

               <table id="data" class="display" style="width:100%">
                  <thead>
                     <tr>
                        <th>{{__("First name")}}</th>
                        <th>{{__("Last name")}}</th>
                        <th>{{__("Company")}}</th>
                        <th>{{__("Email")}}</th>
                        <th>{{__("Phone")}}</th>
                        <th></th>
                     </tr>
                  </thead>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
$(function() {
   var $table = $('#data').DataTable({
      @if (App::getLocale() == 'lt')
      language: {
          "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Lithuanian.json"
      },
      @endif
      processing: true,
      serverSide: true,
      ajax: {
         url: "{{ route('employees.data') }}",
         type: "POST",
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      },
      columns: [
         {
            data: 'first_name'
         },
         {
            data: 'last_name',
         },
         {
            data: 'company',
            render: function ( data, type, row ) {
               return (data) ? data.name : '-';
            }
         },
         {
            data: 'email',
            render: function ( data, type, row ) {
               return (data) ? '<a href="mailto:' + data + '">' + data + '</a>' : '-';
            }
         },
         {
            data: 'phone',
            render: function ( data, type, row ) {
               return (data) ? '<a href="tel:' + data + '">' + data + '</a>' : '-';
            }
         },
         {
            data: '',
            sortable: false,
            class: 'text-center',
            render: function ( data, type, row ) {
               return '<a href="' + route('employees.edit', row.id) + '"><i class="fas fa-edit"></i></a><a href="#" ajax-destroy data-url="' + route('employees.destroy', row.id) + '" class="ml-2"><i class="fas fa-trash-alt"></i></a>';
            }
         }
      ]
   });

   $(document).on('click', 'a[ajax-destroy]', function() {
      let __this = $(this);
      Swal.fire({
        title: '{{__("Are you sure?")}}',
        text: '{{__("Please confirm your action")}}',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: '{{__("Delete it!")}}'
      }).then((result) => {
        if (result.value) {
           $.ajax({
              url: __this.data('url'),
              method: 'DELETE',
              headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: {
                 ajax: true
              },
              success: function(result){
                 $('#data').DataTable().ajax.reload();
              }
           });
          Swal.fire(
            '{{__("Deleted")}}!',
            '{{__("Employee has been deleted.")}}',
            'success'
          )
        }
      })
   });
})
</script>
@endsection
