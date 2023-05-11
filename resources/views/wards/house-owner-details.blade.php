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
                                        <a class="nav-link active" href="{{route('wards_house_owner')}}"><i class="bx bx-home me-1"></i> House Owner Details</a>
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
                                            <div class="row">
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Family owner name / కుటుంబ యజమాని పేరు </small>
                                                        <input type="text" class="form-control" id="" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Date of Birth / పుట్టిన తేది </small>
                                                        <input type="date" class="form-control" id="" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Mobile Number/మొబైల్ నంబర్ </small>
                                                        <input type="text" class="form-control" id="" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Education / చదువు </small>
                                                        <select class="form-select">
                                                            <option>-- Select --</option>
                                                            <option> Illiterate/నిరక్షరాస్యుడు </option>
                                                            <option> Pursuing School / పాఠశాలను కొనసాగిస్తోంది </option>
                                                            <option> Completed Schooling / పాఠశాల విద్య పూర్తి చేశారు</option>
                                                            <option> Pursuing Degree / డిగ్రీని అభ్యసిస్తున్నారు</option>
                                                            <option> Completed Degree / డిగ్రీ పూర్తి చేశారు </option>
                                                            <option> Pursuing PG / పీజీ చదువుతున్నారు </option>
                                                            <option> Completed PG / పీజీ పూర్తి చేశారు </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Education Details / విద్య వివరాలు </small>
                                                        <select class="form-select">
                                                            <option>-- Select --</option>
                                                            <option> BBA </option>
                                                            <option> Bcom </option>
                                                            <option> Btech </option>
                                                            <option> BSC </option>
                                                            <option> BZC </option>
                                                            <option> MSC </option>
                                                            <option> MBA </option>
                                                            <option>MCA</option>
                                                            <option>Mtech</option>
                                                            <option>Mcom</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-check mt-4 pt-2">
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                        <small class="form-check-small" for="exampleCheck1"> Staying out of Town/టౌన్ వెలుపల ఉంటున్నారు </small>

                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Location of the Person / వ్యక్తి యొక్క స్థానం </small>
                                                        <select class="form-select">
                                                            <option>-- Select --</option>
                                                            <option> Staying in the state / రాష్ట్రంలోనే ఉంటున్నారు </option>
                                                            <option> Staying out of the state / రాష్ట్రం వెలుపల ఉంటున్నారు </option>
                                                            <option> Staying out of the country / దేశం వెలుపల ఉంటున్నారు </option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Enter the Details / వివరాలను నమోదు చేయండి </small>
                                                        <input type="text" class="form-control" id="" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Occupation/వృత్తి </small>
                                                        <select class="form-select">
                                                            <option>-- Select --</option>
                                                            <option> Lawyer / న్యాయవాది </option>
                                                            <option> Docter / వైద్యుడు </option>
                                                            <option> Engineer/ ఇంజనీర్ </option>
                                                            <option> Private Employee / ప్రైవేట్ ఉద్యోగి </option>
                                                            <option> Bank Employee / బ్యాంకు ఉద్యోగి</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Gender/లింగం </small>
                                                        <select class="form-select">
                                                            <option>-- Select --</option>
                                                            <option> Male / పురుషుడు</option>
                                                            <option> Female / స్త్రీ </option>
                                                            <option> Others / ఇతరులు</option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Blood Group / రక్తపు గ్రూపు </small>
                                                        <select class="form-select">
                                                            <option>-- Select --</option>
                                                            <option> A+</option>
                                                            <option> A- </option>
                                                            <option> B+</option>
                                                            <option> B- </option>
                                                            <option> O+ </option>
                                                            <option> O- </option>
                                                            <option> AB+ </option>
                                                            <option> AB- </option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-check mt-4 pt-2">
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                                        <label class="form-check-label" for="exampleCheck2"> B.P / బి.పి </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-check mt-2 pt-2">
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck3">
                                                        <label class="form-check-label" for="exampleCheck3"> Sugar / షుగర్ </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-check mt-2 pt-2">
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck4">
                                                        <label class="form-check-label" for="exampleCheck4"> Covid Vaccine / కోవిడ్‌కి టీకా </label>

                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-check mt-2 pt-2">
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck5">
                                                        <label class="form-check-label" for="exampleCheck5"> Pension / పెన్షన్ </label>

                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Type of Pension/పెన్షన్ రకం </small>
                                                        <select class="form-select">
                                                            <option>-- Select --</option>
                                                            <option> Old Age Pension/వృద్ధాప్య పెన్షన్</option>
                                                            <option> Widow Pension/వితంతు పింఛను </option>
                                                            <option>Disabled Pension/వికలాంగుల పెన్షన్</option>
                                                            <option> Beedi Workers Pension/బీడీ కార్మికుల పెన్షన్ </option>
                                                            <option> Single Women Pension/ఒంటరి మహిళల పెన్షన్ </option>
                                                            <option> Persons with HIV-AIDS Pension/HIV-AIDS పెన్షన్ ఉన్న వ్యక్తులు</option>
                                                            <option> Weavers Pension/నేత కార్మికుల పెన్షన్ </option>
                                                            <option> Filaria Patient Pension/ఫైలేరియా పేషెంట్ పెన్షన్ </option>
                                                            <option> Toddy Tappers Pension/టాడీ ట్యాపర్స్ పెన్షన్ </option>


                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Upload Photo / ఫోటోను అప్‌లోడ్ చేయండి్ </small>
                                                        <input type="file" class="form-control" id="" placeholder="">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2 mb-2">Save changes</button>
                                                <a href="family-member-details.html" class="btn btn-outline-secondary mb-2">Add Family Member Details/కుటుంబ సభ్యుల వివరాలను జోడించండి </a>
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
