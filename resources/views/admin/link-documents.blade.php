@extends('admin.layouts.main')
@section('content')

  <style>
        input.largerCheckbox {
            width: 20px;
            height: 20px;
            display: inline
        }

        @media only screen and (max-width: 600px) {
 .s-doc-mobile li {
            width:100%;
        }
}
    </style>

<div class="page-content">

    <div class="container-fluid">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('success'))
    <div class="alert alert-success">{{session()->get('success')}}</div>
    @endif

 <div class="">



                        <h4 class="fw-bold py-3 mb-4">
                            <span class=" fw-light"><strong>   Link Documents to Services/సేవలకు పత్రాలను లింక్ చేయండి      </strong>   </span>
                        </h4>

                        <div class="row mb-5">
                            <div class="col-md-6 mb-3">
                                <form  method="post" id="linkdocument">
                                    @csrf
                                <div class="form-group">
                                     Select Service / సేవను ఎంచుకోండి

                                    <select class="form-select" name="service" id="service">
                                        <option value="">Select Service / సేవను ఎంచుకోండి</option>
                                      @foreach ($service as $item)
                                      <option value="{{$item->service_id}}">{{$item->service_name}}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                     Select Sub Service/ఉప సేవను ఎంచుకోండి

                                    <select class="form-select" name="subservice" id="subservice">
                                        <option value="">Select Sub Service / సేవను ఎంచుకోండి</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <small>Select Documents / పత్రాలను ఎంచుకోండి</small>
                                    <ul class="m-0 p-0 s-doc-mobile">
                                       @foreach ($documents as $data)
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" name="documents[]" value="{{$data->document_id}}" /></span>
                                            <span class="p-1">{{$data->document_name}}</span>
                                        </li>
                                    </ul>
                                    @endforeach
                                </div>
                            </div>


                            <div class="col-md-2 mb-3 ms-auto">
                                <div class="form-group text-end">
                                    <small>&nbsp;</small>
                                    <input type="submit" class="btn btn-primary" value="Save / సేవ్ చేయండి" />
                                </div>
                            </div>
                        </div>

                    </form>


                    </div>

</div>


</div>





<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>

    $(document).ready(function(){
        $('#service').on('change', function(){
            var service_id = $(this).val();
            var _token = '{{ csrf_token() }}'
            $.ajax({
                   type:'POST',
                   url:"{{ url('linkdocument_ajax') }}",
                   data:{service_id:service_id,_token:_token},
                   success:function(data){
                       console.log(data);
                       $('#subservice').html(data);
                   }
            });
        })
    });


</script>


<script>
    $(document).ready(function() {
      $('#linkdocument').submit(function(e){
          e.preventDefault();
          // alert('hi');
       var formData = new FormData($(this)[0]);
       $.ajax({
          url : ' {{ route('linkdocument_insert') }} ',
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
          window.location.href = '{{ route('linkdocument') }}';}, 3000);
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






@endsection
@push('scripts')

@endpush
