 
@extends('admin.layouts.main')


@section('content')
<style>

</style>

<div class="content-wrapper">

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y mb-3">


                        <h4 class="fw-bold  mb-4" style="    padding-top: 4rem !important;">
                            <span class="text-muted fw-light">Dashboard</span>
                        </h4>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="bg-primary p-3 text-white" style="border-radius: 8px">
                                    <p>No of Houses Registered /<br>నమోదైన ఇళ్ల సంఖ్య</p>
                                    <h2 class="text-white m-0">254</h2>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="bg-success p-3 text-white" style="border-radius: 8px">
                                    <p>No Family Members Registered /<br>నమోదు చేయబడిన కుటుంబ సభ్యుల సంఖ్య</p>
                                    <h2 class="text-white m-0">189</h2>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="bg-warning p-3 text-white" style="border-radius: 8px">
                                    <p>No of Services Registered /<br>రిజిస్టర్ చేయబడిన సేవల సంఖ్య </p>
                                    <h2 class="text-white m-0">254</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <!--<div class="col mb-3">-->
                            <!--    <div class="card">-->
                            <!--        <div class="card-body">-->
                            <!--            <p>Services Registered</p>-->
                            <!--            <h2>154</h2>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="col-md-6 ">
                                <div class="card">
                                    <div class="card-body">
                                        <p>No Documents are to be collected</p>
                                        <h2 class="m-0">154</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="card">
                                    <div class="card-body">
                                        <p>No Requests are to be submitted to the Department</p>
                                        <h2 class="m-0">154</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="card">
                                    <div class="card-body">
                                        <p>No Requests are to be Submitted to the Department</p>
                                        <h2 class="m-0">154</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="card">
                                    <div class="card-body">
                                        <p>No Service requests completed</p>
                                        <h2 class="m-0">154</h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- / Content -->




                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme ">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                © 2023 All Rights Reserved by Ward Details.
                            </div>

                        </div>
                    </footer>
                    <!-- / Footer -->


                    <div class="content-backdrop fade"></div>
                </div>

@endsection
@push('scripts')
    
@endpush