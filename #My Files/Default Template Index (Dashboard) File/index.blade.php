@include('includes/header_start')

            <!--Morris Chart CSS -->
            <link rel="stylesheet" href="assets/plugins/morris/morris.css">

@include('includes/header_end')

                            <!-- Page title -->
                            <ul class="list-inline menu-left mb-0">
                                <li class="list-inline-item">
                                    <button type="button" class="button-menu-mobile open-left waves-effect">
                                        <i class="ion-navicon"></i>
                                    </button>
                                </li>
                                <li class="hide-phone list-inline-item app-search">
                                    <h3 class="page-title">Dashboard</h3>
                                </li>
                            </ul>

                            <div class="clearfix"></div>
                        </nav>

                    </div>
                    <!-- Top Bar End -->

                    <!-- ==================
                         PAGE CONTENT START
                         ================== -->

                    <div class="page-content-wrapper">

                        <div class="header-bg">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 mb-4 pt-5">
                                        <div id="morris-bar-example" class="dash-chart"></div>

                                        <div class="mt-4 text-center">
                                            <button type="button" class="btn btn-outline-primary ml-1 waves-effect waves-light">Year 2017</button>
                                            <button type="button" class="btn btn-outline-info ml-1 waves-effect waves-light">Year 2018</button>
                                            <button type="button" class="btn btn-outline-primary ml-1 waves-effect waves-light">Year 2019</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-info">15,852</h3>
                                            Monthly Statistics
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-purple">9,514</h3>
                                            New Orders
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-primary">289</h3>
                                            New Users
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-danger">5,220</h3>
                                            Unique Visitors
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row">

                                <div class="col-xl-4">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">Monthly Earnings</h4>

                                            <div class="row text-center m-t-20">
                                                <div class="col-6">
                                                    <h5 class="">56241</h5>
                                                    <p class="text-muted font-14">Marketplace</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="">23651</h5>
                                                    <p class="text-muted font-14">Total Income</p>
                                                </div>
                                            </div>

                                            <div id="morris-donut-example" class="dash-chart"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-8">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">Email Sent</h4>

                                            <div class="row text-center m-t-20">
                                                <div class="col-4">
                                                    <h5 class="">56241</h5>
                                                    <p class="text-muted font-14">Marketplace</p>
                                                </div>
                                                <div class="col-4">
                                                    <h5 class="">23651</h5>
                                                    <p class="text-muted font-14">Total Income</p>
                                                </div>
                                                <div class="col-4">
                                                    <h5 class="">23651</h5>
                                                    <p class="text-muted font-14">Last Month</p>
                                                </div>
                                            </div>

                                            <div id="morris-area-example" class="dash-chart"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <h4 class="mt-0 m-b-30 header-title">Latest Transactions</h4>

                                            <div class="table-responsive">
                                                <table class="table m-t-20 mb-0 table-vertical">

                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/images/users/avatar-2.jpg" alt="user-image" class="thumb-sm rounded-circle mr-2"/>
                                                            Herbert C. Patton
                                                        </td>
                                                        <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                                        <td>
                                                            $14,584
                                                            <p class="m-0 text-muted font-14">Amount</p>
                                                        </td>
                                                        <td>
                                                            5/12/2016
                                                            <p class="m-0 text-muted font-14">Date</p>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-secondary btn-sm waves-effect">Edit</button>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <img src="assets/images/users/avatar-3.jpg" alt="user-image" class="thumb-sm rounded-circle mr-2"/>
                                                            Mathias N. Klausen
                                                        </td>
                                                        <td><i class="mdi mdi-checkbox-blank-circle text-warning"></i> Waiting payment</td>
                                                        <td>
                                                            $8,541
                                                            <p class="m-0 text-muted font-14">Amount</p>
                                                        </td>
                                                        <td>
                                                            10/11/2016
                                                            <p class="m-0 text-muted font-14">Date</p>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-secondary btn-sm waves-effect">Edit</button>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <img src="assets/images/users/avatar-4.jpg" alt="user-image" class="thumb-sm rounded-circle mr-2"/>
                                                            Nikolaj S. Henriksen
                                                        </td>
                                                        <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                                        <td>
                                                            $954
                                                            <p class="m-0 text-muted font-14">Amount</p>
                                                        </td>
                                                        <td>
                                                            8/11/2016
                                                            <p class="m-0 text-muted font-14">Date</p>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-secondary btn-sm waves-effect">Edit</button>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <img src="assets/images/users/avatar-5.jpg" alt="user-image" class="thumb-sm rounded-circle mr-2"/>
                                                            Lasse C. Overgaard
                                                        </td>
                                                        <td><i class="mdi mdi-checkbox-blank-circle text-danger"></i> Payment expired</td>
                                                        <td>
                                                            $44,584
                                                            <p class="m-0 text-muted font-14">Amount</p>
                                                        </td>
                                                        <td>
                                                            7/11/2016
                                                            <p class="m-0 text-muted font-14">Date</p>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-secondary btn-sm waves-effect">Edit</button>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <img src="assets/images/users/avatar-6.jpg" alt="user-image" class="thumb-sm rounded-circle mr-2"/>
                                                            Kasper S. Jessen
                                                        </td>
                                                        <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                                        <td>
                                                            $8,844
                                                            <p class="m-0 text-muted font-14">Amount</p>
                                                        </td>
                                                        <td>
                                                            1/11/2016
                                                            <p class="m-0 text-muted font-14">Date</p>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-secondary btn-sm waves-effect">Edit</button>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <h4 class="mt-0 m-b-15 header-title">Recent Activity Feed</h4>

                                            <ol class="activity-feed mb-0">
                                                <li class="feed-item">
                                                    <span class="date">Sep 25</span>
                                                    <span class="activity-text">Responded to need “Volunteer Activities”</span>
                                                </li>

                                                <li class="feed-item">
                                                    <span class="date">Sep 24</span>
                                                    <span class="activity-text">Added an interest “Volunteer Activities”</span>
                                                </li>
                                                <li class="feed-item">
                                                    <span class="date">Sep 23</span>
                                                    <span class="activity-text">Joined the group “Boardsmanship Forum”</span>
                                                </li>
                                                <li class="feed-item">
                                                    <span class="date">Sep 21</span>
                                                    <span class="activity-text">Responded to need “In-Kind Opportunity”</span>
                                                </li>
                                                <li class="feed-item">
                                                    <span class="date">Sep 18</span>
                                                    <span class="activity-text">Created need “Volunteer Activities”</span>
                                                </li>
                                                <li class="feed-item">
                                                    <span class="date">Sep 17</span>
                                                    <span class="activity-text">Attending the event “Some New Event”. Responded to needed.</span>
                                                </li>
                                                <li class="feed-item pb-1">
                                                    <span class="activity-text">
                                                        <a href="" class="text-primary">More Activities</a>
                                                    </span>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- end row -->

                         </div>


                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

@include('includes/footer_start')

        <!--Morris Chart-->
        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>

        <script src="assets/pages/dashborad.js"></script>

@include('includes/footer_end')