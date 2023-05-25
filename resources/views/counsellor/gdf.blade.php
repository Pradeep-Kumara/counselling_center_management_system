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
                                    data-toggle="modal"  data-target="#addGdfModal" >
                                Add GDF</button>
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
                                    <th>GDF ID</th>
                                    <th>Client ID</th>
                                    <th>Client</th>
                                    <th>Main Problem</th>
                                    <th>View More</th>

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


<div class="modal fade" id="addGdfModal" tabindex="-1"
     role="dialog"
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Add
                    GDF</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
            </div>

            <div class="modal-body">

                    <div class="form-group">
                        <label for="pass">Client<span style="color: red">*</span></label>
                        <select class="form-control" name="client" id="client" required>
                            <option disabled value="" selected>Select Client</option>
                        </select>
                        <small class="text-danger" id="clientError"></small>
                    </div>


                <div class="form-group">
                    <label>Main Problem <span style="color:red">*</span> </label>
                    <input type="text" class="form-control" name="mainProblem"
                           id="mainProblem" required placeholder="Main Problem" />
                    <span class="text-danger" id="mainProblemError"></span>
                </div>

                <div class="form-group">
                    <label for="pass">Severity Level<span style="color: red">*</span></label>
                    <select class="form-control" name="severity_level" id="severity_level" required>
                        <option disabled value="" selected>Severity Level</option>
                        <option>Critical</option>
                        <option>High</option>
                        <option>Medium</option>
                        <option>Low</option>

                    </select>
                    <small class="text-danger" id="clientError"></small>
                </div>

                <div class="form-group">
                    <label>Appearance & Behavior<span style="color:red">*</span> </label>
                    <input type="text" class="form-control" name="appearanceBehavior"
                           id="appearanceBehavior" required placeholder="Appearance & Behavior" />
                    <span class="text-danger" id="appearanceBehaviorError"></span>
                </div>

                <div class="form-group">
                    <label>Previous Treatment<span style="color:red">*</span> </label>
                    <input type="text" class="form-control" name="previousTreatment"
                           id="previousTreatment" required placeholder="Previous Treatment" />
                    <span class="text-danger" id="previousTreatmentError"></span>
                </div>

                <div class="form-group">
                    <label>Social Life<span style="color:red">*</span> </label>
                    <input type="text" class="form-control" name="socialLife"
                           id="socialLife" required placeholder="Social Life" />
                    <span class="text-danger" id="socialLifeError"></span>
                </div>

                <div class="form-group">
                    <button type="button"  class="btn btn-primary float-right"
                            onclick="saveGdf()" >
                        Save GDF</button>
                </div>

            </div>

            </div>

        </div>
    </div>
</div>





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