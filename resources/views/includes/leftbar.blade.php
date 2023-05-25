<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div>

<!-- Begin page -->
<div id="wrapper">

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">

        <!-- LOGO -->
        <div class="topbar-left">
            <div class="">
                <!--<a href="index" class="logo text-center">Fonik</a>-->

                <a href="{{ URL::asset('index')}}" class="logo"><img src="{{ URL::asset('assets/images/logo.png')}}"
                                                                     height="90" alt="logo"></a>

            </div>
        </div>

        <div class="sidebar-inner slimscrollleft">
            <div id="sidebar-menu">

                <ul>

                    <li class="menu-title">Main</li>

                        <li>
                            <a href="index" class="waves-effect"><i
                                        class="fa fa-area-chart"></i><span>Dashboard </span></a>
                        </li>

                        <li>
                            <a href="myAccount" class="waves-effect"><i
                                        class="fa fa-user"></i><span>My Account</span></a>
                        </li>






                    <li class="menu-title">Appointment</li>


                    @if(\Illuminate\Support\Facades\Auth::user()->user_role_iduser_role==1 ||
                    \Illuminate\Support\Facades\Auth::user()->user_role_iduser_role==3 ||
                    \Illuminate\Support\Facades\Auth::user()->user_role_iduser_role==4)

                        <li>
                            <a href="makeAppointment" class="waves-effect"><i
                                        class="fa fa-calendar-plus-o"></i><span>Make Appointment</span></a>
                        </li>


                    @endif




                        <li>
                            <a href="appointmentLog" class="waves-effect"><i
                                        class="fa fa-tasks"></i><span>Appointment Log</span></a>
                        </li>





                    @if(\Illuminate\Support\Facades\Auth::user()->user_role_iduser_role==1 ||
                                       \Illuminate\Support\Facades\Auth::user()->user_role_iduser_role==3)

                    <li class="menu-title">Master Files</li>


                    @endif




                    @if(\Illuminate\Support\Facades\Auth::user()->user_role_iduser_role==1 ||
                    \Illuminate\Support\Facades\Auth::user()->user_role_iduser_role==3)

                        <li>
                            <a href="clientManagement" class="waves-effect"><i
                                        class="fa fa-user"></i><span>Client Management</span></a>
                        </li>

                    @endif


                    @if(\Illuminate\Support\Facades\Auth::user()->user_role_iduser_role==1)

                        <li>
                            <a href="userManagement" class="waves-effect"><i
                                        class="fa fa-user"></i><span>User Management</span></a>
                        </li>

                    @endif




                    @if(\Illuminate\Support\Facades\Auth::user()->user_role_iduser_role==1 ||
                    \Illuminate\Support\Facades\Auth::user()->user_role_iduser_role==3)

                    <li class="menu-title">Payment</li>
                        <li>
                            <a href="paymentLog" class="waves-effect"><i
                                        class="fa fa-tasks"></i><span>Payment Log</span></a>
                        </li>

                    @endif



                    @if(\Illuminate\Support\Facades\Auth::user()->user_role_iduser_role==1 ||
                                        \Illuminate\Support\Facades\Auth::user()->user_role_iduser_role==2)

                  {{--  <li class="menu-title">Counselling</li>

                        <li>
                            <a href="gdf" class="waves-effect"><i
                                        class="fa fa-user"></i><span>GDF</span></a>
                        </li>

                        <li>
                            <a href="sessionReport" class="waves-effect"><i
                                        class="fa fa-user"></i><span>Session Report</span></a>
                        </li>

                        <li>
                            <a href="clientHistory" class="waves-effect"><i
                                        class="fa fa-user"></i><span>Client History</span></a>
                        </li>--}}


                    @endif



                    @if(\Illuminate\Support\Facades\Auth::user()->user_role_iduser_role==1 ||
                   \Illuminate\Support\Facades\Auth::user()->user_role_iduser_role==2 ||
                   \Illuminate\Support\Facades\Auth::user()->user_role_iduser_role==3)


                    <li class="menu-title">Settings</li>

                        <li>
                            <a href="category" class="waves-effect"><i
                                        class="fa fa-book"></i><span>Category</span></a>
                        </li>





                        <li class="menu-title">Test</li>

                        <li>
                            <a href="testPage" class="waves-effect"><i
                                        class="fa fa-book"></i><span>Test Page</span></a>
                        </li>



                    @endif



                    @if(\Illuminate\Support\Facades\Auth::user()->user_role_iduser_role==3)


                    <li class="menu-title">Reports</li>

                        <li>
                            <a href="revenueReport" class="waves-effect"><i
                                        class="fa fa-file-text-o"></i><span>Revenue Report</span></a>
                        </li>


                        <li>
                            <a href="clientReport" class="waves-effect"><i
                                        class="fa fa-file-text-o"></i><span>Client Report</span></a>
                        </li>

                    @endif









                </ul>

            </div>




            <div class="clearfix"></div>

        </div> <!-- end sidebarinner -->
    </div> <!-- Left Sidebar End -->