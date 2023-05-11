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
                            <span class="  "><strong>Update Sub Service / నవీకరణ సేవ    </strong>   </span>
                        </h4>
                        <form   method="post" id="sub_serviceForm" name="sub_serviceForm">
                            @csrf
                        <input type="hidden" name="id" value="{{ $sub_service->sub_service_id}}"/>

                            <div class="row mb-5">
                                                        <div class="col-md-4 mb-2">
                                                            <div class="form-group">
                                                                service Name /  సేవ  పేర్లు
                                                                <select class="form-select" name="service" id="service">
                                                                    <option value="">--select--</option>
                                                                    @foreach ($service as $services)
                                                                    <option value="{{$services->service_id}}" {{$sub_service->service_id==$services->service_id ? "selected" :""}} >{{$services->service_name}}</option>
                                                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-2">
                                                            <div class="form-group">
                                                                Sub-service Name /  ఉప-సేవ  పేర్లు

                                                                <input type="text" class="form-control" value="{{$sub_service->sub_service_name}}" name="sub_service" id="" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 mb-2">
                                                            <div class="form-group mt-3">
                                                                <small>&nbsp;</small>
                                                                <input type="submit" class="btn btn-primary" value="Update / సేవ్ చేయండి" />
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
        $('#sub_serviceForm').submit(function(e){
            e.preventDefault();
            // alert('hi');
         var formData = new FormData($(this)[0]);
         $.ajax({
            url : ' {{ route('subservice.update') }} ',
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


@endpush

