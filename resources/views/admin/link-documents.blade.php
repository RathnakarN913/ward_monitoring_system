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

 <div class="">


                        <h4 class="fw-bold py-3 mb-4">
                            <span class=" fw-light"><strong>   Link Documents to Services/సేవలకు పత్రాలను లింక్ చేయండి      </strong>   </span>
                        </h4>

                        <div class="row mb-5">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                     Select Service / సేవను ఎంచుకోండి
                                     
                                    <select class="form-select">
                                        <option value="">Select Service / సేవను ఎంచుకోండి</option>
                                        <option value="">Aadhar Card / సేవను ఎంచుకోండి</option>
                                        <option value="">PAN Card / సేవను ఎంచుకోండి</option>
                                        <option value="">Ration Card / సేవను ఎంచుకోండి</option>
                                        <option value="">Power Bill / సేవను ఎంచుకోండి</option>
                                        <option value="">Certigicate / సేవను ఎంచుకోండి</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                     Select Sub Service/ఉప సేవను ఎంచుకోండి
                                     
                                    <select class="form-select">
                                        <option value="">Select Sub Service / సేవను ఎంచుకోండి</option>
                                        <option value="">Aadhar Card / సేవను ఎంచుకోండి</option>
                                        <option value="">PAN Card / సేవను ఎంచుకోండి</option>
                                        <option value="">Ration Card / సేవను ఎంచుకోండి</option>
                                        <option value="">Power Bill / సేవను ఎంచుకోండి</option>
                                        <option value="">Certigicate / సేవను ఎంచుకోండి</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <small>Select Documents / పత్రాలను ఎంచుకోండి</small>
                                    <ul class="m-0 p-0 s-doc-mobile">
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""/></span>
                                            <span class="p-1">Aadhar</span>
                                        </li>
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""/></span>
                                            <span class="p-1">Pan card</span>
                                        </li>
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""/></span>
                                            <span class="p-1">Ration card</span>
                                        </li>
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""/></span>
                                            <span class="p-1">Labour card</span>
                                        </li>
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""/></span>
                                            <span class="p-1">Pension</span>
                                        </li>
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""/></span>
                                            <span class="p-1">birth certificate</span>
                                        </li>
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""/></span>
                                            <span class="p-1">Loan</span>
                                        </li>
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""/></span>
                                            <span class="p-1">Aadhar</span>
                                        </li>
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""/></span>
                                            <span class="p-1">Pan card</span>
                                        </li>
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""/></span>
                                            <span class="p-1">Ration card</span>
                                        </li>
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""/></span>
                                            <span class="p-1">Labour card</span>
                                        </li>
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""/></span>
                                            <span class="p-1">Pension</span>
                                        </li>
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""/></span>
                                            <span class="p-1">birth certificate</span>
                                        </li>
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""/></span>
                                            <span class="p-1">Loan</span>
                                        </li>
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""/></span>
                                            <span class="p-1">Aadhar</span>
                                        </li>
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""/></span>
                                            <span class="p-1">Pan card</span>
                                        </li>
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""/></span>
                                            <span class="p-1">Ration card</span>
                                        </li>
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""/></span>
                                            <span class="p-1">Labour card</span>
                                        </li>
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""/></span>
                                            <span class="p-1">Pension</span>
                                        </li>
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""/></span>
                                            <span class="p-1">birth certificate</span>
                                        </li>
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""/></span>
                                            <span class="p-1">Loan</span>
                                        </li>
                                    </ul>
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
























@endsection
@push('scripts')
    
@endpush