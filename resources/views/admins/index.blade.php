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
                <h3><i class="fa fa-angle-right"></i> Admins</h3>
                <!-- row -->
                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            <div class="">
                                <div class="table-wrapper">
                                    <div class="table-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h2>Manage <b>Admins</b></h2>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="#addAdminModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Admin</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="table_customers" style="width: 100%" class="">
                                        <thead>
                                            <tr>
                                                <th><i class="fa fa-id-card"></i> ID</th>
                                                <th><i class="fa fa-user"></i> User Name</th>
                                                <th><i class="fa fa-key"></i> Password</th>
                                                <th><i class="fa fa-envelope"></i> Email</th>
                                                <th><i class="fa fa-user"></i> Level</th>
                                                <th><i class="fa fa-bookmark"></i> Status</th>
                                                <th><i class="fa fa-filter"></i> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $data)
                                                @if ($data->email != 'trancaocuong99@gmail.com' && $data->email != 'huyhuyad@gmail.com')
                                                    <tr id="tr-{{ $data->id }}">
                                                        <td id="admin-id-{{ $data->id }}">{{ $data->id }}</td>
                                                        <td id="admin-username-{{ $data->id }}">{{ $data->username }}</td>
                                                        <td id="admin-password-{{ $data->id }}">{{ $data->password }}</td>
                                                        <td id="admin-email-{{ $data->id }}">{{ $data->email }}</td>
                                                        <td id="admin-level-{{ $data->id }}">
                                                            @switch($data->level)
                                                                @case(0)
                                                                    Supper Admin
                                                                    @break
                                                                @case(1)
                                                                    Manage User
                                                                    @break
                                                                @case(2)
                                                                    Manage Ads
                                                                    @break
                                                                @case(3)
                                                                    Manage Transport
                                                                    @break
                                                                @case(4)
                                                                    Manage Chat
                                                                    @break
                                                                @case(5)
                                                                    Manage Notification
                                                                    @break
                                                                @case(6)
                                                                    Manage LandHouse
                                                                    @break
                                                                @case(7)
                                                                    Manage Recruitment
                                                                    @break
                                                                @case(8)
                                                                    Manage Nail
                                                                    @break
                                                                @case(9)
                                                                    Manage Tour
                                                                    @break
                                                                @case(10)
                                                                    Manage Shop
                                                                    @break  
                                                                @case(11)
                                                                    Manage Coupon
                                                                    @break  
                                                                @default
                                                            @endswitch
                                                        </td>
                                                        <td id="admin-status-{{ $data->id }}">
                                                            <div style="display: inline">
                                                                @if ($data->status == 1)
                                                                    <span class="label label-status label-success label-mini">On</span>
                                                                @else
                                                                    <span class="label label-status label-warning label-mini">Off</span>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a value="{{ $data->id }}" href="#editAdminModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                            <a value="{{ $data->id }}" href="#deleteAdminModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Add Modal HTML -->
                            <div id="addAdminModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form>
                                            <div class="modal-header">						
                                                <h4 class="modal-title">Add Admin</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">					
                                                <div class="form-group">
                                                    <label>User Name</label>
                                                    <input type="text" class="form-control add-admin-username" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="text" class="form-control add-admin-password" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control add-admin-email" >
                                                </div>
                                                {{-- <div class="form-group">
                                                    <input type="button" onclick="appendLevel()" class="btn btn-success" value="Add Level">
                                                </div> --}}
                                                <div class="form-group" id="append-level" value="0">
                                                    <label>Level</label>
                                                    <select class="add-admin-level">
                                                        <option value="1">Manage User</option>
                                                        <option value="2">Manage Ads</option>
                                                        <option value="3">Manage Transport</option>
                                                        <option value="4">Manage Chat</option>
                                                        <option value="5">Manage Notification</option>
                                                        <option value="6">Manage LandHouse</option>
                                                        <option value="7">Manage Recruitment</option>
                                                        <option value="8">Manage Nail</option>
                                                        <option value="9">Manage Tour</option>
                                                        <option value="10">Manage Shop</option>
                                                        <option value="11">Manage Coupon</option>
                                                    </select>
                                                </div>	
                                                <div class="form-group">
                                                    <label>Date Create</label>
                                                    <input type="date" class="form-control add-admin-date" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="add-admin-status">
                                                        <option value="1">Active</option>
                                                        <option value="0">Deactive</option>
                                                    </select>
                                                </div>		
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                <input type="submit" class="btn btn-success add-admin" value="Add">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Edit Modal HTML -->
                            <div id="editAdminModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form>
                                            <div class="modal-header">						
                                                <h4 class="modal-title">Edit Admin</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">	
                                                <div class="form-group" style="display: none;">
                                                    <label>ID</label>
                                                    <input type="text" class="form-control old-admin-id" >
                                                </div>				
                                                <div class="form-group">
                                                    <label>User Name</label>
                                                    <input type="text" class="form-control old-admin-username" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="text" class="form-control old-admin-password" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control old-admin-email" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Level</label>
                                                    <select class="old-admin-level">
                                                        <option value="1">Manage User</option>
                                                        <option value="2">Manage Ads</option>
                                                        <option value="3">Manage Transport</option>
                                                        <option value="4">Manage Chat</option>
                                                        <option value="5">Manage Notification</option>
                                                        <option value="6">Manage LandHouse</option>
                                                        <option value="7">Manage Recruitment</option>
                                                        <option value="8">Manage Nail</option>
                                                        <option value="9">Manage Tour</option>
                                                        <option value="10">Manage Shop</option>
                                                        <option value="11">Manage Coupon</option>

                                                    </select>
                                                </div>	
                                                <div class="form-group">
                                                    <label>Date Update</label>
                                                    <input type="date" class="form-control old-admin-date" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="old-admin-status">
                                                        <option value="1">Active</option>
                                                        <option value="0">Deactive</option>
                                                    </select>
                                                </div>					
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                <input type="submit" class="btn btn-info edit-admin" value="Save">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Delete Modal HTML -->
                            <div id="deleteAdminModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form>
                                            <div class="modal-header">						
                                                <h4 class="modal-title">Delete Admin</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">					
                                                <p>Are you sure you want to delete these Records?</p>
                                                <p class="text-warning"><small>This action cannot be undone.</small></p>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                <input set-id="" type="submit" class="btn btn-danger delete-admin" value="Delete">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=""> {!! $users->appends(['search' => Request::get('search')])->render() !!} </div>
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

    @include('handle_js.admin')
    <script>
        function appendLevel() {
            var label = '<label>Level</label>';
            var select = '<select class="add-admin-level">';
            var txt1 = '<option value="1">Manage User</option>';
            var txt2 = '<option value="2">Manage Ads</option>';
            var txt3 = '<option value="3">Manage Transport</option>';
            var txt4 = '<option value="4">Manage Chat</option>';
            var txt5 = '<option value="5">Manage Notification</option>';
            var txt6 = '<option value="6">Manage LandHouse</option>';
            var txt7 = '<option value="7">Manage Recruitment</option>';
            var txt8 = '<option value="8">Manage Nail</option>';
            var txt9 = '<option value="9">Manage Tour</option>';
            var txt10 = '<option value="10">Manage Shop</option>';
            var close_select = '</select>';
            $("#append-level").append(label, select, txt1, txt2, txt3, txt4, txt5, txt6, txt7, txt8, txt9, txt10, close_select);   // Append new elements
        }
    </script>
</html>