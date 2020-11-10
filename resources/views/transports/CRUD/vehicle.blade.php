<!DOCTYPE html>
<html lang="en">

<head>
    @include('include_lib.lib_css')
    @include('include_lib.css_for_table')
    @include('include_lib.css_for_crud')
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        a.delete .material-icons {
            color: red;
        }
        a.edit .material-icons {
            color: #FFC107;
        }
    </style>
</head>

<body>
    <section id="container">
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Mở/Đóng Menus"></div>
            </div>
            <!--logo start-->
            <a href="{{ url('') }}" class="logo"><b>Hune<span> Admin</span></b></a>
            <!--logo end-->

            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li>
                        <a class="logout" href="{{ url('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </header>
        <!--header end-->
        <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        <aside>
            @include('infor_admin.infor_admin')
        </aside>
        <!--sidebar end-->
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> Vehicles</h3>
                <!-- row -->
                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            <div class="">
                                <div class="table-wrapper">
                                    <div class="table-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h2>Manage <b>Vehicles</b></h2>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="#addVehicleModal" class="btn btn-success btn-add" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Vehicle</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="table_customers" style="width: 100%" class="">
                                        <thead>
                                            <tr>
                                                <th><i class="fa fa-id-card"></i> ID</th>
                                                <th><i class="fa fa-th-list"></i> Vehicle</th>
                                                @if (isset($parent_id))
                                                    <th><i class="fa fa-th-list"></i> Type Vehicle</th>
                                                    <th><i class="fa fa-th-list"></i> Parent Vehicle</th>
                                                @endif
                                                <th><i class="fa fa-table"></i> Date Created</th>
                                                <th><i class="fa fa-bookmark"></i> Status</th>
                                                <th><i class="fa fa-filter"></i> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!isset($parent_id))
                                                @foreach ($vehicles as $data)
                                                    <tr>
                                                        <td>
                                                            <a href="{{ url('/transports/vehicle?parent_id=').$data->id.'&parent_name='.$data->vehicles }}">{{ $data->id }}</a>
                                                        </td>
                                                        <td><a href="{{ url('/transports/vehicle?parent_id=').$data->id.'&parent_name='.$data->vehicles }}">{{ $data->vehicles }}</a></td>
                                                        <td>{{ $data->date_created }}</td>
                                                        <td>
                                                            <div style="display: inline">
                                                                @if ($data->active == 1)
                                                                    <span class="label label-status label-success label-mini">On</span>
                                                                @else
                                                                    <span class="label label-status label-warning label-mini">Off</span>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a value="{{ $data->id }}" vehicle="1" href="#editVehicleModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                            <a value="{{ $data->id }}" vehicle="1" href="#deleteVehicleModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                @foreach ($vehicles as $data)
                                                    <tr id="tr-{{ $data->id }}">
                                                        <td>{{ $data->id }}</td>
                                                        <td>{{ $data->vehicles }}</td>
                                                        <td>{{ $data->type_vehicle }}</td>
                                                        <td>{{ $data->parent_name }}</td>
                                                        <td>{{ $data->date_created }}</td>
                                                        <td>
                                                            <div style="display: inline">
                                                                @if ($data->active == 1)
                                                                    <span class="label label-status label-success label-mini">On</span>
                                                                @else
                                                                    <span class="label label-status label-warning label-mini">Off</span>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a value="{{ $data->id }}" vehicle="0" href="#editVehicleModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                            <a value="{{ $data->id }}" vehicle="0" href="#deleteVehicleModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Edit Modal HTML -->
                            <div id="addVehicleModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form>
                                            <div class="modal-header">						
                                                <h4 class="modal-title">Add Vehicle</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control add-vehicle-name" required>
                                                </div>
                                                @if (isset($parent_id))
                                                    <div class="form-group">
                                                        <label>Type Vehicle</label>
                                                        <input type="text" class="form-control add-vehicle-type" required>
                                                    </div>
                                                    <div class="form-group add-parent-vehicle" value="{{ $parent_id }}">
                                                        <label>Parent Vehicle: {{ $parent_name }}</label>
                                                    </div>
                                                @endif
                                                <div class="form-group">
                                                    <label>Date Create</label>
                                                    <input type="date" class="form-control add-vehicle-date">
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="add-vehicle-status">
                                                        <option value="1">Active</option>
                                                        <option value="0">Deactive</option>
                                                    </select>
                                                </div>					
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default btn-cancel" data-dismiss="modal" value="Cancel">
                                                <input type="submit" class="btn btn-success add-vehicle" value="Add">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Edit Modal HTML -->
                            <div id="editVehicleModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form>
                                            <div class="modal-header">						
                                                <h4 class="modal-title">Edit Vehicle</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group" style="display: none;">
                                                    <label>ID</label>
                                                    <input type="text" class="form-control old-id" required>
                                                </div>				
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control old-name" required>
                                                </div>
                                                @if (isset($parent_id))
                                                    <div class="form-group">
                                                        <label>Type Vehicle</label>
                                                        <input  type="text" class="form-control old-vehicle-type" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Parent Vehicle</label>
                                                        <select class="old-parent-vehicle"></select>
                                                    </div>
                                                @endif
                                                <div class="form-group">
                                                    <label>Date Create</label>
                                                    <input type="datetime" class="form-control old-date">
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="old-status">
                                                        <option value="1">Active</option>
                                                        <option value="0">Deactive</option>
                                                    </select>
                                                </div>					
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default btn-cancel" data-dismiss="modal" value="Cancel">
                                                <input type="submit" class="btn btn-info edit-vehicle" value="Save">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Delete Modal HTML -->
                            <div id="deleteVehicleModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form>
                                            <div class="modal-header">						
                                                <h4 class="modal-title">Delete Vehicle</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">					
                                                <p>Are you sure you want to delete these Records?</p>
                                                <p class="text-warning"><small>This action cannot be undone.</small></p>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default btn-cancel" data-dismiss="modal" value="Cancel">
                                                <input set-id="" type="submit" class="btn btn-danger delete-vehicle" value="Delete">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class=""> {!! $vehicles->appends(['search' => Request::get('search')])->render() !!} </div> --}}
                        <!-- /content-panel -->
                    </div>
                    <!-- /col-md-12 -->
                </div>
                <!-- /row -->
            </section>
        </section>
        <!-- /MAIN CONTENT -->
        <!--main content end-->
        @include('footer')
    </section>
</body>
    @include('include_lib.lib_js')
    @include('handle_js.vehicle')
</html>