@extends('layouts.app')
@section('title', __("Companies"))
@section('content')
<div class="container-fluid p-5">
   <div class="row">
      <div class="col-md-12">
         <div class="form-group">
            <a href="{{ route("companies.create") }}" class="btn btn-success">{{__("Create new company")}}</a>
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
                        <th>{{__("Name")}}</th>
                        <th>{{__("Email")}}</th>
                        <th>{{__("Logo")}}</th>
                        <th>{{__("Website")}}</th>
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
         url: "{{ route('companies.data') }}",
         type: "POST",
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      },
      columns: [
         {
            data: 'name'
         },
         {
            data: 'email',
            defaultContent: '',
            render: function ( data, type, row ) {
               return (data) ? '<a href="mailto:' + data + '">' + data + '</a>' : '-';
            }
         },
         {
            data: 'logo',
            render: function ( data, type, row ) {
               return (data) ? '<a data-title="' + row.name + '" data-lightbox="image" href="../public/storage/' + data + '"><img width="50" src="../public/storage/' + data + '"></a>' : '-';
            }
         },
         {
            data: 'website',
            render: function ( data, type, row ) {
               return (data) ? '<a target="_blank" href="' + (data.includes("http") ? data : ('http://' + data)) + '">' + (data.includes("http") ? data : ('http://' + data)) + '</a>' : '-';
            }
         },
         {
            data: '',
            sortable: false,
            class: 'text-center',
            render: function ( data, type, row ) {
               return '<a href="' + route('companies.edit', row.id) + '"><i class="fas fa-edit"></i></a><a href="#" ajax-destroy data-url="' + route('companies.destroy', row.id) + '" class="ml-2"><i class="fas fa-trash-alt"></i></a>';
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
            '{{__("Company has been deleted.")}}',
            'success'
          )
        }
      })
   });
})
</script>
@endsection
