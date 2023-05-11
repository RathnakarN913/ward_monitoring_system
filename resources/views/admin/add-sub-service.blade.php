@extends('admin.layouts.main')
@section('content')



<style>
    .errorcl {
        color: red;
    }

    input.largerCheckbox {
        width: 26px;
        height: 26px;
    }
</style>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />



<div class="page-content">

    <div class="container-fluid">

          <div class=" ">


                        <h4 class="fw-bold py-3 mb-4">
                            <span class="  fw-light"><strong>  Add Sub-service / ఉప-సేవను జోడించండి     </strong>
                        </h4>
<form   method="post" id="sub_serviceForm" name="sub_serviceForm">
@csrf
                        <div class="row mb-5">
                            <div class="col-md-4 mb-2">
                                <div class="form-group">
                                    service Name /  సేవ  పేర్లు
                                    <select class="form-select" name="service" id="service">
                                        <option value="">--select--</option>
                                        @foreach ($service as $services)
                                        <option value="{{$services->service_id}}">{{$services->service_name}}</option>
                                                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-group">
                                    Sub-service Name /  ఉప-సేవ  పేర్లు

                                    <input type="text" class="form-control" name="sub_service" id="sub_service" />
                                </div>
                            </div>
                            <div class="col-md-2 mb-2">
                                <div class="form-group mt-3">
                                    <small>&nbsp;</small>
                                    <input type="submit" class="btn btn-primary" value="Save / సేవ్ చేయండి" />
                                </div>
                                </div>
                            </div>

                        </form>


                        <div class="row mb-5">
                            <div class="col-md-12 mb-2">
                                <h4 class="fw-bold py-3 ">
                                    <span class=" fw-light">Recently Added Sub-service / ఇటీవల జోడించిన ఉప-సేవలు</span>
                                </h4>
                            </div>

                            <div class="col-md-12 mb-3 table-responsive">
                                <table class="table table-bordered">
                                    <thead style="background-color: rgba(105,108,255,.16) !important">
                                        <tr>
                                            <th width="10%">Sl. No.</th>
                                            <th>Service Name</th>
                                            <th width="">Sub-service Name</th>
                                            <th width="25%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i=1;

                                        @endphp
                                        <tr>
                                            @foreach ($sub_service as $store )


                                            <td>{{$i++}}</td>
                                            <td>{{$store->service->service_name}}</td>
                                            <td>{{$store->sub_service_name}}</td>

                                            <td>
                                                <a href="{{route('subservice.edit',['id' => $store->sub_service_id])}}" style="color: #fff !important;" class="btn btn-sm btn-primary mb-2"><i class="menu-icon tf-icons bx bx-edit"></i> Edit</a>
                                                <a onclick="delete_user({{$store->sub_service_id}})" style="color: #fff !important;" class="btn btn-sm btn-danger mb-2"><i class="menu-icon tf-icons bx bx-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

    </div>

</div>

@endsection
@push('scripts')
<script>
    $(document).ready(function() {
      $('#sub_serviceForm').submit(function(e){
          e.preventDefault();
          // alert('hi');
       var formData = new FormData($(this)[0]);
       $.ajax({
          url : ' {{ route('subservice.create') }} ',
          type : 'POST',
          data : formData,
          cache : false,
          async : false,
          processData : false,
          contentType : false,
          success: function(response) {
          // Check if operation was successful
          if (response.status === 'success') {
              // Show toastr message
              toastr.success('Data inserted successfully!');
           setTimeout(function(){
          window.location.href = '{{ route('subservice') }}';}, 3000);
          } else {
              toastr.error('Error inserting data!');
          }

      },
      error: function(jqXHR, textStatus, errorThrown) {
    $('.input-error').remove();
    $('input').removeClass('is-invalid');

    if (jqXHR.status == 422) {
        for (const [key, value] of Object.entries(jqXHR.responseJSON.errors)) {

          toastr.error(value);

            $('#'+key).addClass('is-invalid');
            $('#'+key).after(
                '<span class="text-danger input-error" role="alert">' + value +
                '</span>');
        }
    } else {
        alert('something went wrong! please try again..');
     }
  }
       });
      });
  });
</script>

<script>
    function delete_user(id) {
       var del = confirm("Are you sure you want to delete this record?");
       if (del == true) {
          // alert("record deleted")
           $.ajax({
               url: '{{ route('subservice.delete') }}',
               type: 'POST',
               data: {
                   id : id,
                   _token: '{{csrf_token()}}'
               },
               success: function(data, textStatus, xhr) {
                   if (xhr.status == 201) {
                      toastr.success(data.msg);
                   }
                   setTimeout(function(){
                       window.location.href = '{{ route('subservice') }}';}, 3000);

               },
                error: function(xhr, textStatus, errorThrown) {
           if (xhr.status == 422) {
               console.log(xhr);
           var errors = xhr.responseJSON.error;
           var error_msg = 'this Record have some Dependancy can`t Delete..!';
                toastr.error(error_msg);

           } else {
           toastr.error('An error occurred while deleting the record.');
           }
       }
           });
       } else {
           alert("Record Not Deleted");
       }

   }

    </script>

@endpush
