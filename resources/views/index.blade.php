@include('includes/header_start')

<!--Morris Chart CSS -->
<link rel="stylesheet" href="assets/plugins/morris/morris.css">
<meta name="csrf-token" content="{{ csrf_token() }}" />

@include('includes/header_end')
<nav>
    <!-- Page title -->
    <ul class="list-inline menu-left mb-0">
        <li class="list-inline-item">
            <button type="button" class="button-menu-mobile open-left waves-effect">
                <i class="ion-navicon"></i>
            </button>
        </li>
        <li class="hide-phone list-inline-item app-search">
            <h3 class="page-title">{{$title}}</h3>
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

    {{--<div class="header-bg">
        <h3 align="center">Daily Statistics</h3>

    </div>--}}



    <div class="container-fluid">


        <div class="row"> <!--ColorFull Widgets-->


            <div class="col-md-6 col-xl-1">

            </div>



            <div class="card text-white bg-warning mb-3" style="max-width: 21rem; min-width: 21rem;">
                <div class="card-header"><h4>Pending Appointments</h4></div>
                <div class="card-body">
                    <h4 class="card-title">{{$pendingApp}}</h4>
                    <p class="card-text">Total pending appointments.</p>
                </div>
            </div>



            <div class="col-md-6 col-xl-1">

            </div>

            <div class="col-md-6 col-xl-1">

            </div>




            <div class="card text-white bg-danger mb-3" style="max-width: 21rem; min-width: 21rem;">
                <div class="card-header"><h4>Canceled Appointments</h4></div>
                <div class="card-body">
                    <h4 class="card-title">{{$canceledApp}}</h4>
                    <p class="card-text">Total canceled appointments.</p>
                </div>
            </div>


        </div>



<!--Space Between Rows (Widgets) Start-->
        <div class="row">
            <div class="col-md-6 col-xl-12">
                <div class="card text-center m-b-30">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6 col-xl-12">
                <div class="card text-center m-b-30">
                </div>
            </div>
        </div>
 <!--Space Between Rows (Widgets) End-->



        <div class="row">



            <div class="col-md-6 col-xl-1">

            </div>



            <div class="card text-white bg-primary mb-3" style="max-width: 21rem; min-width: 21rem;">
                <div class="card-header"><h4>Completed Appointments</h4></div>
                <div class="card-body">
                    <h4 class="card-title">{{$completedApp}}</h4>
                    <p class="card-text">Total completed appointments.</p>
                </div>
            </div>




            <div class="col-md-6 col-xl-1">

            </div>

            <div class="col-md-6 col-xl-1">

            </div>





            @if(Auth::user()->user_role_iduser_role!=4)   {{--Role ID eka 4 nowana ayata witharak pennanava--}}



            <div class="card text-white bg-secondary mb-3" style="max-width: 21rem; min-width: 21rem;">
                <div class="card-header"><h4>New Clients</h4></div>
                <div class="card-body">
                    <h4 class="card-title">{{$totCustomers}}</h4>
                    <p class="card-text">Daily new clients.</p>
                </div>
            </div>


            @endif


        </div>



    {{--<div class="row">

    </div>--}}

    {{-- <div class="row">
         <div class="col-md-12 text-center">
             <div class="card m-b-30">
                 <div class="card-body">
                     <label class="label label-success">Income Chart</label>
                     <div id="incomeChart"></div>
                 </div>
             </div>
         </div>
     </div>--}}


    {{-- <div class="row">
         <div class="col-xl-8">
             <div class="card m-b-30">
                 <div class="card-body">
                     <h4 class="mt-0 m-b-30 header-title">Latest Appointments</h4>

                     <div class="table-responsive">
                         <table class="table m-t-20 mb-0 table-vertical">

                             --}}{{--<tbody>
                             @foreach($latestJobs as $job)
                                 <tr>
                                     <td>{{$job->jobcard_id}}</td>
                                     <td>{{$job->customer_firstname}}</td>
                                     <td><i class="mdi mdi-checkbox-blank-circle text-success"></i>
                                         @if($job->jobcard_status == 1)
                                             {{"Completed"}}
                                         @elseif($job->jobcard_status == 2)
                                             {{"Paid"}}
                                         @elseif($job->jobcard_status == 3)
                                             {{"Cancelled"}}
                                         @endif
                                     </td>
                                     <td>LKR {{$job->jobcard_paid_amount}}
                                         <p class="m-0 text-muted font-14">Value</p>
                                     </td>
                                     <td>
                                         {{$job->jobcard_date}}
                                         <p class="m-0 text-muted font-14">Date</p>
                                     </td>
                                     <td>
                                         <a href="job-card"><button type="button" class="btn btn-secondary btn-sm waves-effect">  Go to Job Card</button></a>
                                     </td>
                                 </tr>
                             @endforeach
                             </tbody>--}}{{--
                         </table>
                     </div>
                 </div>
             </div>
         </div>

     </div>--}}
    <!-- end row -->

    </div>
</div> <!-- Page content Wrapper -->

</div> <!-- content -->

@include('includes/footer_start')

<!--Morris Chart-->
<script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/plugins/raphael/raphael-min.js"></script>

<script src="assets/pages/dashborad.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.post('incomeChart', {

        }, function(chartData) {
            // console.log(chartData)
            var data = [];

            for (let index = 0; index < chartData.length; index++) {
                data.push({ // pushing to array
                    y: chartData[index].jobcard_date,
                    a: chartData[index].jobcard_total,

                }, )
            }

            config = {
                data: data,
                xkey: 'y',
                ykeys: ['a'],
                labels: ['Income Chart'],
                fillOpacity: 0.6,
                hideHover: 'auto',
                behaveLikeLine: true,
                resize: true,
                pointFillColors: ['#ffffff'],
                pointStrokeColors: ['black'],
                lineColors: ['gray', 'red']
            };


            config.element = 'incomeChart';
            Morris.Bar(config);

        })



    });

    // //we store out timerIdhere
    // var timeOutId = 0;
    // //we define our function and STORE it in a var
    // var test = 0;

</script>

@include('includes/footer_end')