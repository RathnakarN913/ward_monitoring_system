@extends('admin.layouts.main')
@section('content')


                <h4 class="fw-bold py-3 mb-4">
                    <span class=" fw-light"><strong> Link Documents to Services/సేవలకు పత్రాలను లింక్ చేయండి </strong>
                    </span>
                </h4>
                 <form action="" method="post" id="link_doc" name="link_doc">

                <div class="row mb-5">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            Select Service / సేవను ఎంచుకోండి

                            <select class="form-select" >
                                <option value="">Select Service / సేవను ఎంచుకోండి</option>
                                @foreach ($service as $services)


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
                            <span class="  "><strong> Documents Edit / పత్రాలను సవరించండి     </strong>   </span>
                        </h4>
                      <form  method="post"  id="documentForm" name="documentForm">
                        @csrf
                        <input type="hidden" name="id" value="{{ $document->document_id}}"/>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    Documents to be amended / సవరించాల్సిన పత్రాలు
                                    <input type="text" class="form-control" name="document_name" id="document_name" value="{{$document->document_name}}" />
                                </div>
                            </div>
                            <div class="col-md-2 mb-2">
                                <div class="form-group mt-3">
                                    <small>&nbsp;</small>
                                    <input type="submit" class="btn btn-primary" value="Update / నవీకరణ చేయండి" />
                                </div>
                            </div>
                        </div>
                    </form>


                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            Select Sub Service/ఉప సేవను ఎంచుకోండి

                            <select class="form-select" >
                                <option value="">Select Sub Service / సేవను ఎంచుకోండి</option>
                                @foreach ($sub_service as $services)


                                <option value="{{$services->sub_service_id}}" @if($services->service_id == $sub_service[0]->sub_service_id) selected ;@endif >{{$services->sub_service_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <small>Select Documents / పత్రాలను ఎంచుకోండి</small>
                            <ul class="m-0 p-0 s-doc-mobile">
                               @foreach ($document as $data)
                                <li class="align-items-start d-flex me-3 float-start">
                                    <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" name="documents[]" value="{{$data->document_id}}"    /></span>
                                    <span class="p-1" >{{$data->document_name}}</span>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>



                    <div class="col-md-2 mb-3 ms-auto">
                        <div class="form-group text-end">
                            <small>&nbsp;</small>
                            <input type="button" class="btn btn-primary" value="Save / సేవ్ చేయండి" />
                        </div>
                    </div>
                </div>
              </div>


        </div>
    </div>
</div>



@endsection
@push('scripts')

<script>
    $(document).ready(function() {
      $('#documentForm').submit(function(e){
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
              toastr.success('Record Updated successfully..!');
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

