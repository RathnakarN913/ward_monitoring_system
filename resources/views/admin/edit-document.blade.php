@extends('admin.layouts.main')
@section('content')

<div class="page-content">
    <div class="container-fluid">


            <!-- Content -->

                    <div class=" ">


                        <h4 class="fw-bold py-3 mb-4">
                            <span class=" fw-light"><strong>  update Documents / పత్రాలను నవీకరించండి  </strong> </span>
                        </h4>
                        <form  method="post"  id="serviceForm" name="serviceForm">
                            @csrf
                            <input type="hidden" name="id" value="{{ $document->document_id}}"/>
                        <div class="row mb-5">
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                     Documents to be collected / సేకరించాల్సిన పత్రాలు
                                    <input type="text" class="form-control" name="document" id="document" value="{{$document->document_name}}" />
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

@endsection
@push('scripts')
<script>
    $(document).ready(function() {
      $('#serviceForm').submit(function(e){
          e.preventDefault();
          // alert('hi');
       var formData = new FormData($(this)[0]);
       $.ajax({
          url : ' {{ route('documents.update') }} ',
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
          window.location.href = '{{ route('documents') }}';}, 3000);
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
