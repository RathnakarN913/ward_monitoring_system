@extends('admin.layouts.main')
@section('content')


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />



<div class="page-content">
    
    <div class="container-fluid">
          
          
            <!-- Content -->

                    <div class=" ">


                        <h4 class="fw-bold py-3 mb-4">
                            <span class="  fw-light"> <strong>   Reports / నివేదికలు   </strong> </span>
                        </h4>

                        <div class="row">
                            
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    Service Name / సేవ పేరు
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
                            
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                     Sub Service Name/ఉప సేవ పేరు
                                    <select class="form-select">
                                        <option value="">Select sub Service / సేవను ఎంచుకోండి</option>
                                        <option value="">Aadhar Card / సేవను ఎంచుకోండి</option>
                                        <option value="">PAN Card / సేవను ఎంచుకోండి</option>
                                        <option value="">Ration Card / సేవను ఎంచుకోండి</option>
                                        <option value="">Power Bill / సేవను ఎంచుకోండి</option>
                                        <option value="">Certigicate / సేవను ఎంచుకోండి</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                     Select Document /  పత్రాలను ఎంచుకోండి
                                     
                                    <select class="form-select">
                                        <option value="">Select Document /  పత్రాలను ఎంచుకోండి</option>
                                        <option value="">Aadhar Card / సేవను ఎంచుకోండి</option>
                                        <option value="">PAN Card / సేవను ఎంచుకోండి</option>
                                        <option value="">Ration Card / సేవను ఎంచుకోండి</option>
                                        <option value="">Power Bill / సేవను ఎంచుకోండి</option>
                                        <option value="">Certigicate / సేవను ఎంచుకోండి</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <small>&nbsp;</small>
                                    <a style="color:#fff ;width: 100%" class="btn btn-primary" ><i class="menu-icon tf-icons bx bx-search"></i>Search</a>
                                </div>
                            </div>
                            
                            
<!--
                            <div class="col-md-2 dropdown ms-auto mb-3 text-end">
                                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Filters
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#"><input type="text" class="form-control" /></a></li>
                                    <li><a class="dropdown-item" href="#">Service Name/సేవ పేరు</a></li>
                                    <li><a class="dropdown-item" href="#">Sub Service Name/ఉప సేవ పేరు</a></li>
                                    <li><a class="dropdown-item" href="#">Documents Name/పత్రాల పేరు</a></li>
                                </ul>
                            </div>
-->

                            <div class="col-md-12 mb-3 table-responsive">

                                <table class="table table-bordered">
                                    <thead style="background-color: rgba(105,108,255,.16) !important">
                                        <tr>
                                            <th width="5%">Sl. No. / క్రమసంఖ్య </th>
                                            <th width="20%">Service Name / సేవ పేరు</th>
                                            <th width="30%">Sub Service Name / ఉప సేవ పేరు</th>
                                            <th width="25%">Mapped Documents / మ్యాప్ చేయబడిన పత్రాలు</th>
                                            <th width="30%">Edit / సవరించు</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Aadhar card</td>
                                            <td>Aadhar card</td>
                                            <td>Aadhar card</td>
                                            <td>
                                                <a style="color:#fff !important;" class="btn btn-sm btn-primary mb-2"><i class="menu-icon tf-icons bx bx-edit"></i> Edit</a>
                                                <a style="color:#fff !important;" class="btn btn-sm btn-danger mb-2"><i class="menu-icon tf-icons bx bx-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->  

    </div>

</div>






















@endsection
@push('scripts')
    
@endpush