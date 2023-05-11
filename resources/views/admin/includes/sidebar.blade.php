{{-- <style>
    #logout-confirm.modal-backdrop {
        --vz-backdrop-zindex: 1050;
        --vz-backdrop-bg: #000;
        --vz-backdrop-opacity: -0.5;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 0;
        width: 100vw;
        height: 100vh;
        background-color: var(--vz-backdrop-bg);
    }
    .navbar-brand-box {
    padding: 0 1.3rem;
    text-align: center;
    -webkit-transition: all .1s ease-out;
    transition: all .1s ease-out;
    border-bottom: 1px #1766af solid;
}
</style> --}}

<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('home') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{url('public/assets/images/tslogo.png')}}" class="img-fluid" alt="" title="" style="width:70px; "/>
            </span>
            <span class="logo-lg">
                 <img src="{{url('public/assets/images/tslogo.png')}}" class="img-fluid" alt="" title="" style="width:70px; "/>
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('home') }}" class="logo logo-light">
            <span class="logo-sm">
                 <img src="{{url('public/assets/images/tslogo.png')}}" class="img-fluid" alt="" title="" style="width:70px; "/>
            </span>
            <span class="logo-lg">
                <img src="{{url('public/assets/images/tslogo.png')}}" class="img-fluid" alt="" title="" style="width:70px; "/>
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                @if(Auth::user()->user_type == '1')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('home') }}" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>

                </li> <!-- end Dashboard Menu -->

                 <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('service') }}" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-file-fill"></i> <span data-key="t-dashboards">Add service </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('subservice') }}" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-file-fill"></i> <span data-key="t-dashboards">Add Sub Service</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('documents') }}" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-file-fill"></i> <span data-key="t-dashboards">Add Document</span>
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('linkdocument') }}" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-file-fill"></i> <span data-key="t-dashboards">Link Documents to Services</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('reports') }}" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">

                        <i class="ri-file-fill"></i> <span data-key="t-dashboards"> Reports</span>

                    </a>
                </li> <!-- end Dashboard Menu -->
                @endif
                @if(Auth::user()->user_type == '2')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('wardshome') }}" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                      <i class="fa-solid fa-gauge"></i> <span data-key="t-dashboards"> Dashboard</span>
                    </a>
                </li>

                 <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('wards_add_member') }}" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                      <i class="fa-solid fa-user"></i> <span data-key="t-dashboards"> Add Member Details</span>
                    </a>
                </li>

                 <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('wards_reports') }}" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                       <i class="fa-solid fa-file"></i> <span data-key="t-dashboards"> Reports</span>
                    </a>
                </li>
            @endif

                <li class="nav-item">
                    <a class="nav-link menu-link" href="" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards" data-bs-toggle="modal" data-bs-target="#logout-confirm">
                        <i class="ri-shut-down-fill"></i> <span data-key="t-dashboards">Logout</span>
                    </a>

                    <!--Modal confirm logout-->
                    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}

                    {{-- <div class="modal fade" id="logout-confirm" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-md ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to logout ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary"
                                        onclick="event.preventDefault();document.getElementById('logout-form1').submit();">Logout</button>
                                    <form id="logout-form1" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> --}}




                </li> <!-- end Dashboard Menu -->
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
