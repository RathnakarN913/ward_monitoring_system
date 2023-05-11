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

        <div class="">

              <!-- Content -->

                    <div class=" ">


                        <h4 class="fw-bold py-3 mb-4">
                            <span class="  "><strong>Update Service / నవీకరణ సేవ    </strong>   </span>
                        </h4>
                      <form  method="post"  id="serviceForm" name="serviceForm">
                        @csrf
                        <input type="hidden" name="id" value="{{ $service->service_id}}"/>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                     Service Name/సేవ పేరు
                                    <input type="text" class="form-control" name="service" id="service" value="{{$service->service_name}}" />
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


                    </div>
                    <!-- / Content -->
        </div>
    </div>
</div>



@endsection
@push('scripts')
<script>
      $(document).ready(function() {
        $('#serviceForm').submit(function(e){
            e.preventDefault();
            // alert('hi');
         var formData = new FormData($(this)[0]);
         $.ajax({
            url : ' {{ route('service.update') }} ',
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
                toastr.success('Record Updated successfully..!');
             setTimeout(function(){
            window.location.href = '{{ route('service') }}';}, 3000);
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


@endpush

