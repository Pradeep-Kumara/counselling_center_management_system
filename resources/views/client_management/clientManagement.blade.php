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
                        <div class="col-lg-8">
                        </div>
                        <div class="col-lg-4">
                            <button type="button" class="btn btn-primary float-right"
                                    data-toggle="modal"  data-target="#addClientModal" >
                                Register Client</button>
                        </div>
                    </div>



            <br/>



                    <!--Data Table Start-->

                    <div class="table-rep-plugin">
                        <div class="table-responsive b-0" data-pattern="priority-columns">


                            <table id="datatable"   class="table table-striped table-bordered"
                                   cellspacing="0"
                                   width="100%">

                                <thead>
                                <tr>
                                    <th>USER ID</th>
                                    <th>NAME</th>
                                    <th>CONTACT NUMBER</th>
                                    <th>GENDER</th>
                                    <th>STATUS</th>
                                    <th>OPTIONS</th>
                                </tr>
                                </thead>

                                <tbody>

                                @if(isset($userClients))
                                    @if(count($userClients)>0)
                                        @foreach($userClients as $userClient)

                                            <tr>
                                                <td>REG-{{$userClient->idmaster_user}}</td>

                                                <td>{{$userClient->first_name}} {{$userClient->last_name}}</td>

                                                <td>{{$userClient->contact_number}}</td>

                                                <td>{{$userClient->gender}}</td>


                                                <!--Status Start-->
                                                @if($userClient->status == 1)
                                                    <td>
                                                        <p>
                                                            <input type="checkbox"
                                                                   onchange="adMethod('{{ $userClient->idmaster_user}}','master_user')"
                                                                   id="{{"c".$userClient->idmaster_user}}" checked
                                                                   switch="none"/>
                                                            <label for="{{"c".$userClient->idmaster_user}}"
                                                                   data-on-label="On"
                                                                   data-off-label="Off"></label>
                                                        </p>
                                                    </td>


                                                @else
                                                    <td>
                                                        <p>
                                                            <input type="checkbox"
                                                                   onchange="adMethod('{{ $userClient->idmaster_user}}','master_user')"
                                                                   id="{{"c".$userClient->idmaster_user}}"
                                                                   switch="none"/>
                                                            <label for="{{"c".$userClient->idmaster_user}}"
                                                                   data-on-label="On"
                                                                   data-off-label="Off"></label>
                                                        </p>
                                                    </td>

                                            @endif
                                            <!--Status End-->


                                                <!--Options Start-->
                                                <td>

                                                    <p>
                                                        <button type="button" title="View"
                                                                class="btn btn-sm btn-default  waves-effect waves-light"
                                                                data-toggle="modal"

                                                                data-fname="{{ $userClient->first_name }}"
                                                                data-lname="{{ $userClient->last_name }}"
                                                                data-contactno="{{ $userClient->contact_number }}"
                                                                data-gender="{{ $userClient->gender }}"
                                                                data-dob="{{ $userClient->dob }}"

                                                                id="viewClientID"
                                                                data-target="#viewClientModal">
                                                            <i class="fa fa-eye"></i>
                                                        </button>

                                                        <button type="button"
                                                                class="btn btn-sm btn-warning  waves-effect waves-light"
                                                                data-toggle="modal"

                                                                data-id="{{ $userClient->idmaster_user }}"
                                                                data-fname="{{ $userClient->first_name }}"
                                                                data-lname="{{ $userClient->last_name }}"
                                                                data-contactno="{{ $userClient->contact_number }}"
                                                                data-dob="{{ $userClient->dob }}"

                                                                id="updateClientID"
                                                                data-target="#updateClientModal"><i
                                                                    class="fa fa-edit"></i>
                                                        </button>

                                                    </p>

                                                </td>
                                                <!--Options End-->


                                            </tr>


                                        @endforeach
                                    @endif
                                @endif

                                </tbody>

                            </table>

                        </div>
                    </div>


                    <!--Data Table End-->





                </div>
            </div>
        </div>
    </div> <!-- container -->

</div> <!-- Page content Wrapper -->

</div> <!-- content -->





<!-- Add Client Modal Start-->
<div class="modal fade" id="addClientModal" tabindex="-1"
     role="dialog"
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title mt-0">Register Client</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <label>First Name<span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="fName"
                           name="fName" placeholder="First Name">
                    <small class="text-danger" id="fNameError"></small>
                </div>

                <div class="form-group">
                    <label> Last Name <span style="color: red">*</span> </label>
                    <input type="text" class="form-control" id="lName"
                           name="lName" placeholder="Last Name">
                    <small class="text-danger" id="lNameError"></small>
                </div>

                <div class="form-group">
                    <label>Contact No<span style="color: red"> *</span></label>
                    <input type="number" class="form-control" id="contactNo"
                           name="contactNo" placeholder="+(94) XX XXX XXXX">
                    <small class="text-danger" id="contactNoError"></small>
                </div>

                <div class="form-group">
                    <label>Gender<span style="color: red">*</span></label>
                    <select class="form-control" name="gender" id="gender" required>
                        <option> Male </option>
                        <option> Female </option>
                    </select>
                    <small class="text-danger" id="genderError"></small>
                </div>

                <div class="form-group">
                    <label>Date of Birth <span style="color: red">*</span></label>
                    <input type="date" class="form-control" id="dob"
                           name="dob" placeholder="Date of Birth">
                    <small class="text-danger" id="dobError"></small>
                </div>

                <div class="form-group">
                    <label>User Name<span style="color: red">*</span></label>
                    <input type="email" class="form-control" id="username"
                           name="username" placeholder="example@email.com">
                    <small class="text-danger" id="usernameError"></small>
                </div>

                <div class="form-group">
                    <label>Password<span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="password"
                           name="password" placeholder="Enter Password">
                    <small class="text-danger" id="passwordError"></small>
                </div>


                <div class="form-group">
                    <button type="button"  class="btn btn-primary float-right"
                            onclick="saveClient()" >
                        Save Client
                    </button>
                </div>

            </div>

        </div>

    </div>
</div>
<!-- Add Client Modal End-->







<!--View Client modal Start-->
<div class="modal fade" id="viewClientModal" tabindex="-1" role="dialog"
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title mt-0">Client Details</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
            </div>

            <div class="modal-body">

                <div class="form-group">

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">First Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="viewFname" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Last Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="viewLname" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Contact Number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="viewContactNo" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Gender</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="viewGender" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">DOB</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="viewDob" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-md btn-outline-primary waves-effect float-right" data-dismiss="modal" >Close</button>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

<!--View Client modal End-->







<!-- Update Client Modal Start-->
<div class="modal fade" id="updateClientModal" tabindex="-1"
     role="dialog"
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title mt-0">Update Client</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <label>First Name</label>


                    <input type="hidden" id="hiddenUserId" name="hiddenUserId">


                    <input type="text" class="form-control" name="updateFname"
                           id="updateFname" required placeholder="First Name"/>
                    <span class="text-danger" id="updateFnameError"></span>
                </div>


                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="updateLname"
                           id="updateLname" required placeholder="Last Name"/>
                    <span class="text-danger" id="updateLnameError"></span>
                </div>


                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="number" class="form-control" name="updateContactNo"
                           id="updateContactNo" required placeholder="Contact Number"/>
                    <span class="text-danger" id="updateContactNoError"></span>
                </div>


                <div class="form-group">
                    <label>DOB</label>
                    <input type="date" class="form-control" name="updateDob"
                           id="updateDob" required placeholder="DOB"/>
                    <span class="text-danger" id="updateDobError"></span>
                </div>



                <div class="form-group">
                    <button type="button"  class="btn btn-primary float-right"
                            onclick="updateClient()" >
                        Update User</button>
                </div>

            </div>

        </div>

    </div>
</div>
<!-- Update Client Modal End-->










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





    //Save Client Start
    function saveClient(){

        $("#fNameError").html('');
        $("#lNameError").html('');
        $("#contactNoError").html('');
        $("#genderError").html('');
        $("#dobError").html('');
        $("#usernameError").html('');
        $("#passwordError").html('');



        var fName = $("#fName").val();
        var lName = $("#lName").val();
        var gender = $("#gender").val();
        var dob = $("#dob").val();
        var contactNo = $("#contactNo").val();
        var username = $("#username").val();
        var password = $("#password").val();



        $.post('saveClientByAdmin',{

            fName:fName,
            lName:lName,
            gender:gender,
            dob:dob,
            contactNo:contactNo,
            username:username,
            password:password

        },function (data) {


            if (data.errors != null) {


                if(data.errors.fName) {
                    var p = document.getElementById('fNameError');
                    p.innerHTML = data.errors.fName[0];
                }

                if(data.errors.lName) {
                    var p = document.getElementById('lNameError');
                    p.innerHTML = data.errors.lName[0];
                }

                if(data.errors.contactNo) {
                    var p = document.getElementById('contactNoError');
                    p.innerHTML = data.errors.contactNo[0];
                }

                if(data.errors.gender) {
                    var p = document.getElementById('genderError');
                    p.innerHTML = data.errors.gender[0];
                }

                if(data.errors.dob) {
                    var p = document.getElementById('dobError');
                    p.innerHTML = data.errors.dob[0];
                }

                if(data.errors.username) {
                    var p = document.getElementById('usernameError');
                    p.innerHTML = data.errors.username[0];
                }

                if(data.errors.password) {
                    var p = document.getElementById('passwordError');
                    p.innerHTML = data.errors.password[0];
                }


            }



            if (data.success != null) {
                notify({
                    type: "success",
                    title: 'CLIENT SAVED',
                    autoHide: true,
                    delay: 2500,
                    position: {
                        x: "right",
                        y: "top"
                    },
                    icon: '<img src="{{ URL::asset('assets/images/correct.png')}}" />',

                    message: data.success,
                });
                $('input').val('');
                setTimeout(function () {
                    $('#addClientModal').modal('hide');
                }, 200);
                location.reload();
            }


        });

    }
    //Save Client End







    //View Client Details Start

    $(document).on('click', '#viewClientID', function () {

        var firstName = $(this).data("fname");
        var lastName = $(this).data("lname");
        var contactNo = $(this).data("contactno");
        var gender = $(this).data("gender");
        var dob = $(this).data("dob");



        $("#viewFname").val(firstName);
        $("#viewLname").val(lastName);
        $("#viewContactNo").val(contactNo);
        $("#viewGender").val(gender);
        $("#viewDob").val(dob);


    });

    //View Client Details End







    //Update Client Start
    $(document).on('click', '#updateClientID', function () {

        var userId = $(this).data("id");

        var firstName = $(this).data("fname");
        var lastName = $(this).data("lname");
        var contactNo = $(this).data("contactno");
        var dob = $(this).data("dob");



        $("#hiddenUserId").val(userId);

        $("#updateFname").val(firstName);
        $("#updateLname").val(lastName);
        $("#updateContactNo").val(contactNo);
        $("#updateDob").val(dob);

    });

    function updateClient() {


        $('#updateFnameError').html('');
        $("#updateLnameError").html('');
        $("#updateContactNoError").html('');
        $("#updateDobError").html('');







        var hiddenUserId=$("#hiddenUserId").val();

        var firstName=$("#updateFname").val();
        var lastName=$("#updateLname").val();
        var contactNo=$("#updateContactNo").val();
        var dob=$("#updateDob").val();

        $.post('updateClient',{

            hiddenUserId:hiddenUserId,

            firstName:firstName,
            lastName:lastName,
            contactNo:contactNo,
            dob:dob

        },function (data) {


            if (data.errors != null) {

                if(data.errors.firstName){
                    var p = document.getElementById('updateFnameError');
                    p.innerHTML = data.errors.firstName[0];
                }

                if(data.errors.lastName){
                    var p = document.getElementById('updateLnameError');
                    p.innerHTML = data.errors.lastName[0];
                }


                if(data.errors.contactNo){
                    var p = document.getElementById('updateContactNoError');
                    p.innerHTML = data.errors.contactNo[0];
                }


                if(data.errors.dob){
                    var p = document.getElementById('updateDobError');
                    p.innerHTML = data.errors.dob[0];
                }

            }



            if(data.success != null){
                notify({
                    type: "success", //alert | success | error | warning | info
                    title: 'CLIENT UPDATED',
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
                    $('#updateClientModal').modal('hide');
                }, 200);

                setTimeout(function () {
                    location.reload();
                }, 1000);


            }
        })
    }
    //Update Client End






    //Hide Validation errors after closing the modal without refreshing
    $('.modal').on('hidden.bs.modal', function () {


        $("#fNameError").html('');
        $("#lNameError").html('');
        $("#contactNoError").html('');
        $("#genderError").html('');
        $("#dobError").html('');
        $("#usernameError").html('');
        $("#passwordError").html('');




        $('#updateFnameError').html('');
        $("#updateLnameError").html('');
        $("#updateContactNoError").html('');
        $("#updateDobError").html('');



        $('input').val(''); //Clear input values of input fields

    });








</script>
@include('includes/footer_end')