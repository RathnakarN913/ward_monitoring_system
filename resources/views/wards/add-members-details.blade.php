@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">


                        <h4 class="fw-bold  mb-4"  style="    padding-top: 4rem !important;">
                            <span class="text-muted fw-light">39 వ వార్డు కుటుంబ సభ్యుల జాబితా</span>
                        </h4>

                        <div class="row ">
                            <div class="col-md-12">
                                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{route('wards_add_member')}}"><i class="bx bx-user me-1"></i> Basic Detials</a>
                                        </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('wards_house_owner')}}"><i class="bx bx-home me-1"></i> House Owner Details</a>
                                        </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('wards_family_member')}}"><i class="bx bx-group me-1"></i> Family Members Details</a>
                                        </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('wards_enter_service')}}"><i class="bx bx-file me-1"></i> Enter Service Details</a>
                                        </li>
                                </ul>
                                <div class="card mb-4">

                                    <div class="card-body">
                                        <form id="formAccountSettings" method="POST" onsubmit="return false">
                                            <div class="row align-items-end">
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1">House No / ఇంటి నెం</small>
                                                        <input type="text" class="form-control" id="" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> House Details / ఇంటి వివరాలు </small>
                                                        <div class="d-flex align-items-center ">
                                                            <div class="radio-btnn p-2">
                                                                <input type="radio" id="owned" name="fav_language" value="owned">
                                                                <label for="owned" class="ms-1">Owned/స్వంతం</label>
                                                            </div>
                                                            <div class="radio-btnn p-2">
                                                                <input type="radio" id="rent" name="fav_language" value="rent">
                                                                <label for="rent" class="ms-1">Rented/అద్దె</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Type of the House / ఇంటి రకం </small>
                                                        <select class="form-select">
                                                            <option>-- Select --</option>
                                                            <option>Slab / స్లాబ్ </option>
                                                            <option> Gunapenka / గూనపెంక </option>
                                                            <option>Flakes / రేకులు </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Religion / మతం </small>
                                                        <select class="form-select">
                                                            <option>-- Select --</option>
                                                            <option> Hindu / హిందూ </option>
                                                            <option> Muslim / ముస్లిం</option>
                                                            <option> Christianity / క్రైస్తవ </option>
                                                            <option>Sikhism / సిక్కు</option>
                                                            <option> Jainism / జైన </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Caste / కులము </small>
                                                        <select class="form-select">
                                                            <option>-- Select --</option>
                                                            <option> BC / బీసీ</option>
                                                            <option> OC / ఓసీ</option>
                                                            <option> SC / ఎస్సీ </option>
                                                            <option> ST/ఎస్సీ </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1">Annual Income / సంవత్సర ఆదాయం</small>
                                                        <input type="text" class="form-control" id="" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Ration card / రేషన్ కార్డు</small>
                                                        <div class="d-flex align-items-center ">
                                                            <div class="radio-btnn p-2">
                                                                <input type="radio" id="Yes" name="fav_language" value="Yes">
                                                                <label for="Yes" class="ms-1">Yes</label>
                                                            </div>
                                                            <div class="radio-btnn p-2">
                                                                <input type="radio" id="no" name="fav_language" value="no">
                                                                <label for="no" class="ms-1">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Type of Ration card / రేషన్ కార్డు రకం </small>
                                                        <select class="form-select">
                                                            <option>-- Select --</option>
                                                            <option> Pink / గులాబి</option>
                                                            <option> White / తెలుపు</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Enter Ration Card Number/రేషన్ కార్డ్ నంబర్&zwnj;ను నమోదు చేయండి </small>
                                                        <input type="text" class="form-control" id="" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Address/Street /అడ్రస్ / వీధి </small>
                                                        <textarea rows="5" class="form-control"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2 mb-2">Save changes</button>
                                                <a href="house-owner-details.html" class="btn btn-outline-secondary mb-2">Add House Owner Details / ఇంటి యజమాని వివరాలను జోడించండి</a>
                                            </div>
                                        </form>
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
