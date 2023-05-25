
@include('includes/header_start')

<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">

<!-- Plugins css -->
<link href="{{ URL::asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet"/>
<link href="{{ URL::asset('assets/css/custom_checkbox.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/css/jquery.notify.css')}}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('assets/css/mdb.css')}}" rel="stylesheet" type="text/css">

<meta name="csrf-token" content="{{ csrf_token() }}"/>


@include('includes/header_end')

<!-- Page title -->
<ul class="list-inline menu-left mb-0">
    <li class="list-inline-item">
        <button type="button" class="button-menu-mobile open-left waves-effect">
            <i class="ion-navicon"></i>
        </button>
    </li>
    <li class="hide-phone list-inline-item app-search">
        <h3 class="page-title">{{ $title }}</h3>
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
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12" align="right">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="button"
                                    data-toggle="modal"  data-target="#changePasswordModal" >
                                Change Password
                            </button>
                        </div>
                    </div>


                    <div align="center">
                        <img src="{{ URL::asset('assets/images/MyAccountProfile.png')}}" height="90" />
                    </div>


                    <div class="row">
                        <div class="col-lg-4">
                        </div>

                        <div class="col-lg-4">
                            {{--<h3 class="text-center">Client ID</h3>--}}


                            <h3 class="text-center">{{$users->first_name}} {{$users->last_name}}</h3>
                        </div>

                        <div class="col-lg-4">
                        </div>
                    </div>


                    <div class="container-fluid">

                    <div class="row">

                        <div class="col-lg-6">


                            <form action="updateUserDetails" method="POST" id="updateCustomerId">


                            <div class="form-group">
                                <label for="pass">First Name</label>
                                <input type="text" class="form-control" id="fName readonly" autocomplete="off" name="fName" placeholder="First Name" readonly value="{{$users->first_name}}">

                                <input type="hidden" id="hiddenUserId" name="hiddenUserId" value="{{$users->idmaster_user}}"/>


                                <small class="text-danger" id="fNameError"></small>
                            </div>

                            <div class="form-group">
                                <label for="pass">Contact No</label>
                                <input type="number" class="form-control" id="contactNo readonly" autocomplete="off" name="contactNo" placeholder="+(94) XX XXX XXXX" readonly   value="{{$users->contact_number}}">
                                <small class="text-danger" id="contactNoError"></small>
                            </div>

                            <div class="form-group">
                                <label for="pass">Date of Birth</label>
                                <input type="date" class="form-control" id="dob readonly" autocomplete="off" name="dob" placeholder="Date of Birth" readonly value="{{$users->dob}}">
                                <small class="text-danger" id="dobError"></small>
                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="form-group">
                                <label for="pass">Last Name</label>
                                <input type="text" class="form-control" id="lName readonly" autocomplete="off" name="lName" placeholder="Last Name" readonly value="{{$users->last_name}}">
                                <small class="text-danger" id="lNameError"></small>
                            </div>

                            <div class="form-group">
                                <label for="pass">Gender</label>
                                <select class="form-control" name="my-input-id" id="my-input-id" required disabled value="{{$users->gender}}">
                                    <option> Male </option>
                                    <option> Female </option>
                                </select>
                                <small class="text-danger" id="my-input-idError"></small>
                            </div>



                            <label style="padding-top: 13px"> </label>
                            <div class="row">

                                <div class="col-lg-6" align="right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="button" onclick="enablefield()">Edit Profile</button>
                                </div>

                                <div class="col-lg-6">
                                    <button id="saveBtn" style="display: none" class="btn btn-primary w-md waves-effect waves-light" type="submit" >Save</button>
                                </div>

                            </div>


                            </form>


                        </div>

                    </div>

                  </div>

                </div>
            </div>
        </div>
    </div> <!-- container -->

</div> <!-- Page content Wrapper -->

</div> <!-- content -->



<!-- Start Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1"
     role="dialog"
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <label> New Password <span style="color:red">*</span> </label>
                    <input type="password" class="form-control" name="newPassword"
                           id="newPassword" required placeholder="New Password" />
                    <span class="text-danger" id="newPasswordError"></span>
                </div>

                <div class="form-group">
                    <label> Confirm Password <span style="color:red">*</span> </label>
                    <input type="password" class="form-control" name="confirmPassword"
                           id="confirmPassword" required placeholder="Confirm Password" />
                    <span class="text-danger" id="confirmPasswordError"></span>
                </div>


                <div class="form-group">
                    <button type="button"  class="btn btn-primary float-right"
                            onclick="changePassword()" >
                        Save</button>
                </div>


            </div>

        </div>
    </div>
</div>
<!-- End Change Password Modal -->





@include('includes/footer_start')

<!-- Plugins js -->
<script src="{{ URL::asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')}}"
        type="text/javascript"></script>

<!-- Plugins Init js -->
<script src="{{ URL::asset('assets/pages/form-advanced.js')}}"></script>

<!-- Required datatable js -->
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/jszip.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/pdfmake.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/vfs_fonts.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.html5.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.print.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
<!-- Responsive examples -->
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

<script src="{{ URL::asset('assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
<script src="{{ URL::asset('assets/pages/sweet-alert.init.js')}}"></script>

<!-- Datatable init js -->
<script src="{{ URL::asset('assets/pages/datatables.init.js')}}"></script>

<!-- Parsley js -->
<script type="text/javascript" src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/bootstrap-notify.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.notify.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('form').parsley();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });
    $(document).on("wheel", "input[type=number]", function (e) {
        $(this).blur();
    });
    function adMethod(dataID, tableName) {

        $.post('activateDeactivate', {id: dataID, table: tableName}, function (data) {


        });
    }









function enablefield() {
    $('input').attr('readonly',false);
    document.getElementById('my-input-id').disabled=false;


    $("#saveBtn").show();



    var profile=$("#hiddenUserId").val();


    $.post('getUserDetails',{
        profile:profile
    },function(data){


        $("#fName").val(data.first_name);
        $("#lName").val(data.last_name);
        $("#dob").val(data.dob);
        $("#contactNo").val(data.contact_number);
        $("#my-input-id").val(data.gender);

    })

}



    $('#updateCustomerId').on('submit',function (event) {
        event.preventDefault();
        $.ajax({
            type:'POST',

            url:"{{route('updateUserDetails') }}",

            data:new FormData(this),
            dataType:'JSON',
            contentType:false,
            cache:false,
            processData:false,
            success:function(data){


                if (data.errors != null) {

                    if(data.errors.first_name){
                        var p = document.getElementById('fNameError');
                        p.innerHTML = data.errors.first_name[0];

                    }
                    if(data.errors.last_name){
                        var p = document.getElementById('lNameError');
                        p.innerHTML = data.errors.last_name[0];

                    }
                    if(data.errors.dob){
                        var p = document.getElementById('dobError');
                        p.innerHTML = data.errors.dob[0];

                    }
                    if(data.errors.contactNo){
                        var p = document.getElementById('contactNoError');
                        p.innerHTML = data.errors.contactNo[0];

                    }



                }
                if (data.success != null) {
                    notify({
                        type: "success", //alert | success | error | warning | info
                        title: 'PROFILE UPDATED',
                        autoHide: true, //true | false
                        delay: 2500, //number ms
                        position: {
                            x: "right",
                            y: "top"
                        },
                        icon: '<img src="{{ URL::asset('assets/images/correct.png') }}" />',

                        message: data.success,
                    });

                    setTimeout(function () {
                        location.reload();
                    }, 800);
                }


            }
        });
    });





    $(document).ready(function(){
        $( document ).on( 'focus', ':input', function(){
            $( this ).attr( 'autocomplete', 'off' );
        });
    });

    $(document).on("wheel", "input[type=number]", function (e) {
        $(this).blur();
    });







//Change Password Start
    function changePassword(){


        $("#newPasswordError").html('');
        $("#confirmPasswordError").html('');


        var newPassword= $("#newPassword").val();
        var confirmPassword= $("#confirmPassword").val();


        if(newPassword != confirmPassword){

            document.getElementById("confirmPasswordError").innerHTML="Confirm password is not matching";
            return;
        }

        $.post('changePassword',{


            newPassword:newPassword,
            confirmPassword:confirmPassword


        },function (data) {

            if (data.errors != null) {

                if(data.errors.newPassword){
                    var p = document.getElementById('newPasswordError');
                    p.innerHTML = data.errors.newPassword[0];
                }

                if(data.errors.confirmPassword){
                    var p = document.getElementById('confirmPasswordError');
                    p.innerHTML = data.errors.confirmPassword[0];
                }

            }


            if(data.success != null)
            {
                notify({
                    type: "success", //alert | success | error | warning | info
                    title: 'Password Changed',
                    autoHide: true, //true | false
                    delay: 2500, //number ms
                    position: {
                        x: "right",
                        y: "top"
                    },
                    icon: '<img src="{{ URL::asset('assets/images/correct.png')}}" />',
                    message: data.success,
                });
                $('input').val('');
                setTimeout(function () {
                    $('#changePasswordModal').modal('hide');
                }, 200);

                setTimeout(function () {
                    location.reload();
                }, 1000);
            }
        });

    }
    //Change Password End









    //Hide Validation errors after closing the modal without refreshing
    $('.modal').on('hidden.bs.modal', function () {


        $("#newPasswordError").html('');
        $("#confirmPasswordError").html('');


        $('input').val(''); //Clear input values of input fields

    });







</script>
@include('includes/footer_end')