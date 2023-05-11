@extends('admin.layouts.main')
@section('content')

  <div class="content-wrapper">

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">


                        <h4 class="fw-bold  mb-4"  style="    padding-top: 4rem !important;">
                            <span class="text-muted fw-light">39 వ వార్డు కుటుంబ సభ్యుల జాబితా</span>
                        </h4>

                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('wards_add_member')}}"><i class="bx bx-user me-1"></i> Basic Detials</a>
                                        </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('wards_house_owner')}}"><i class="bx bx-home me-1"></i> House Owner Details</a>
                                        </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('wards_family_member')}}"><i class="bx bx-group me-1"></i> Family Members Details</a>
                                        </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{route('wards_enter_service')}}"><i class="bx bx-file me-1"></i> Enter Service Details</a>
                                        </li>
                                </ul>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row mb-5">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <small>Select Service / సేవను ఎంచుకోండి</small>
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
                                    <small>Select Sub Service/ఉప సేవను ఎంచుకోండి</small>
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
                                    <ul class="m-0 p-0">
                                        <li class="align-items-center d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""></span>
                                            <span class="p-1">Aadhar</span>
                                        </li>
                                        <li class="align-items-center d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""></span>
                                            <span class="p-1">Pan card</span>
                                        </li>
                                        <li class="align-items-center d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""></span>
                                            <span class="p-1">Ration card</span>
                                        </li>
                                        <li class="align-items-center d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""></span>
                                            <span class="p-1">Labour card</span>
                                        </li>
                                        <li class="align-items-center d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""></span>
                                            <span class="p-1">Pension</span>
                                        </li>
                                        <li class="align-items-center d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""></span>
                                            <span class="p-1">birth certificate</span>
                                        </li>
                                        <li class="align-items-center d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""></span>
                                            <span class="p-1">Loan</span>
                                        </li>
                                        <li class="align-items-center d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""></span>
                                            <span class="p-1">Aadhar</span>
                                        </li>
                                        <li class="align-items-center d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""></span>
                                            <span class="p-1">Pan card</span>
                                        </li>
                                        <li class="align-items-center d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""></span>
                                            <span class="p-1">Ration card</span>
                                        </li>
                                        <li class="align-items-center d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""></span>
                                            <span class="p-1">Labour card</span>
                                        </li>
                                        <li class="align-items-center d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""></span>
                                            <span class="p-1">Pension</span>
                                        </li>
                                        <li class="align-items-center d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""></span>
                                            <span class="p-1">birth certificate</span>
                                        </li>
                                        <li class="align-items-center d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""></span>
                                            <span class="p-1">Loan</span>
                                        </li>
                                        <li class="align-items-center d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""></span>
                                            <span class="p-1">Aadhar</span>
                                        </li>
                                        <li class="align-items-center d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""></span>
                                            <span class="p-1">Pan card</span>
                                        </li>
                                        <li class="align-items-center d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""></span>
                                            <span class="p-1">Ration card</span>
                                        </li>
                                        <li class="align-items-center d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""></span>
                                            <span class="p-1">Labour card</span>
                                        </li>
                                        <li class="align-items-center d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""></span>
                                            <span class="p-1">Pension</span>
                                        </li>
                                        <li class="align-items-center d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""></span>
                                            <span class="p-1">birth certificate</span>
                                        </li>
                                        <li class="align-items-center d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" value=""></span>
                                            <span class="p-1">Loan</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <small>Status /  పరిస్థితి </small>
                                    <select class="form-select">
                                        <option value="">Select Status / పరిస్థితి ఎంచుకోండి</option>
                                        <option value=""> </option>
                                        <option value=""> </option>
                                        <option value=""> </option>
                                        <option value=""> </option>
                                    </select>
                            </div>


                            <div class="col-md-2 mb-3 ms-auto">
                                <div class="form-group text-end">
                                    <small>&nbsp;</small>
                                    <input type="button" class="btn btn-primary" value="Save / సేవ్ చేయండి">
                                </div>
                            </div>
                        </div>
                                    </div>
                                    <!-- /Account -->
                                </div>

                            </div>
                        </div>



                    </div>
                    <!-- / Content -->




                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                © 2023 ALl Rights Reserved by Ward Details.
                            </div>

                        </div>
                    </footer>
                    <!-- / Footer -->


                    <div class="content-backdrop fade"></div>
                </div>

@endsection
@push('scripts')

@endpush
