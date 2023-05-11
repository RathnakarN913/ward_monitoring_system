@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">


                        <h4 class="fw-bold mb-4" style="    padding-top: 4rem !important;">
                            <span class="text-muted fw-light">Reports</span>
                        </h4>

                        <div class="row mb-4">
                            <div class="col-md-4 mb-4 input-felds">
                                <div class="form-group">
                                    <small class="mb-1">Family owner name/కుటుంబ యజమాని పేరు</small>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4 mb-4 input-felds">
                                <div class="form-group">
                                    <small class="mb-1">House No / ఇంటి నెం</small>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4 mb-4 input-felds">
                                <div class="form-group">
                                    <small class="mb-1">Mobile Number/మొబైల్ నంబర్</small>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4 mb-4 input-felds">
                                <div class="form-group">
                                    <small class="mb-1">Occupation/వృత్తి</small>
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
                                    <small class="mb-1">Gender/లింగం</small>
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
                                    <small class="mb-1">Education Details/విద్య వివరాలు </small>
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

                            <div class="col-md-2 float-end">
                                <button type="submit" class="btn btn-primary me-2">Search</button>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="table-primary text-center">
                                            <th>Sl.no / క్రమసంఖ్య</th>
                                            <th>House No / ఇంటి నెం</th>
                                            <th>Address/Street అడ్రస్/వీధి</th>
                                            <th>Family Owner Name / కుటుంబ యజమాని పేరు</th>
                                            <th>Mobile Number / మొబైల్ నంబర్</th>
                                            <th>No of People / వ్యక్తుల సంఖ్య</th>
                                            <th>Edit / సవరించు</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>3-2-58</td>
                                            <td>Gummakonda Colony</td>
                                            <td>Sriramula Maheshj</td>
                                            <td>9440229402</td>
                                            <td><a href="family-report.html">5</a></td>
                                            <td><i class="bx bx-edit"></i></td>
                                        </tr>
                                    </tbody>
                                </table>
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