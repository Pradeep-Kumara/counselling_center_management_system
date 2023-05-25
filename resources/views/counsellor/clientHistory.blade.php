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

                            <div class="col-lg-5">
                                <div class="form-group">
                                    <select class="form-control" name="category" id="category" required>
                                        <option disabled value="" selected>Select Client</option>
                                        <option> </option>

                                    </select>
                                    <small class="text-danger" id="fNameError"></small>
                                </div>
                            </div>
                        </div>

                    </div>
                    <br/>
                    <div class="table-rep-plugin">
                        <div class="table-responsive b-0" data-pattern="priority-columns">
                            <table id="datatable"   class="table table-striped table-bordered"
                                   cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>Session ID</th>
                                    <th>Client ID</th>
                                    <th>Client</th>
                                    <th>Date</th>
                                    <th>View Session</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($categories))
                                    @if(count($categories)>0)
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{$category->category_name}}</td>


                                                @if($category->status == 1)

                                                    <td>
                                                        <p>
                                                            <input type="checkbox"
                                                                   onchange="adMethod('{{ $category->idcategory}}','category')"
                                                                   id="{{"c".$category->idcategory}}" checked
                                                                   switch="none"/>
                                                            <label for="{{"c".$category->idcategory}}"
                                                                   data-on-label="On"
                                                                   data-off-label="Off"></label>
                                                        </p>
                                                    </td>
                                                @else
                                                    <td>
                                                        <p>
                                                            <input type="checkbox"
                                                                   onchange="adMethod('{{ $category->idcategory}}','category')"
                                                                   id="{{"c".$category->idcategory}}"
                                                                   switch="none"/>
                                                            <label for="{{"c".$category->idcategory}}"
                                                                   data-on-label="On"
                                                                   data-off-label="Off"></label>
                                                        </p>
                                                    </td>
                                                @endif
                                                <td>

                                                    <p>
                                                        <button type="button"
                                                                class="btn btn-sm btn-warning  waves-effect waves-light"
                                                                data-toggle="modal"
                                                                data-id="{{ $category->idcategory}}"
                                                                data-name="{{ $category->category_name}}"
                                                                id="uCategoryID"
                                                                data-target="#updateCategoryModal"><i
                                                                    class="fa fa-edit"></i>
                                                        </button>

                                                        <button type="button"
                                                                class="btn btn-sm btn-danger  waves-effect waves-light"
                                                                onclick="deleteCategory({{ $category->idcategory}})">
                                                            <i class="fa fa-trash"></i>
                                                        </button>

                                                    </p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endif
                                </tbody>
                            </table>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> <!-- container -->

</div> <!-- Page content Wrapper -->

</div> <!-- content -->

<!-- Start Add User Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1"
     role="dialog"
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Add User</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
            </div>
            <div class="modal-body">

                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="pass">User Type<span style="color: red">*</span></label>
                            <select class="form-control" name="category" id="category" required>
                                <option disabled value="" selected> User Type</option>
                                <option> Employee </option>
                                <option> Counsellor </option>
                            </select>
                            <small class="text-danger" id="fNameError"></small>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="pass">Category<span style="color: red">*</span></label>
                            <select class="form-control" name="category" id="category" required>
                                <option>  </option>
                            </select>
                            <small class="text-danger" id="fNameError"></small>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="pass">First Name<span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="fName" autocomplete="off" name="fName" placeholder="First Name">
                            <small class="text-danger" id="fNameError"></small>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="pass">Last Name<span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="lName" autocomplete="off" name="lName" placeholder="Last Name">
                            <small class="text-danger" id="lNameError"></small>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="pass">Gender<span style="color: red">*</span></label>
                            <select class="form-control" name="category" id="category" required>
                                <option> Male </option>
                                <option> Female </option>
                            </select>
                            <small class="text-danger" id="fNameError"></small>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="pass">Address<span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="lName" autocomplete="off" name="lName" placeholder="Last Name">
                            <small class="text-danger" id="lNameError"></small>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="pass">Contact No<span style="color: red"> *</span></label>
                            <input type="number" class="form-control" id="contactNo" autocomplete="off" name="contactNo" placeholder="+(94) XX XXX XXXX">
                            <small class="text-danger" id="contactNoError"></small>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="username">User Name<span style="color: red">*</span></label>
                            <input type="email" class="form-control" id="username" name="username"
                                   placeholder="example@email.com">
                            <small class="text-danger">{{ $errors->first('username') }}</small>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="pass">Password<span style="color: red">*</span></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="pass">Confirm Password<span style="color: red">*</span></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Confirm Password">
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <button type="button"  class="btn btn-primary float-right"
                            onclick="saveCategory()" >
                        Save User</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Add User Modal -->





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





</script>
@include('includes/footer_end')