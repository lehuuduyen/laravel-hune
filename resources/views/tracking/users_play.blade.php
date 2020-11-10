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
        .custom-pagination {
            display: flex;
            position: relative;
            margin-top: 20px;
        }
        .custom-pagination ul li span {
            height: 32px;
            width: 32px;
        }
        .custom-pagination ul li a {
            height: 32px;
            width: 32px;
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
                <h3><i class="fa fa-angle-right"></i> Users Play</h3>
                <!-- row -->
                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            {!! Form::open(['method' => 'GET', 'url' => '/users-play', 'class' => '', 'role' => 'search']) !!}
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            {!! Form::close() !!}
                            <div class="">
                                <div class="table-wrapper">
                                    <div class="table-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h2>Manage <b>Users Play</b></h2>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-success view-sum-total-point" data-toggle="modal"><span>View Total Point</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="table_customers" style="width: 100%" class="">
                                        <thead>
                                            <tr>
                                                <th><i class="fa fa-th-list"></i> User ID</th>
                                                <th> Saction</th>
                                                <th> Total</th>
                                                <th><i class="fa fa-bookmark"></i> Date Created</th>
                                                <th><i class="fa fa-bookmark"></i> Expire Date</th>
                                                <th><i class="fa fa-bookmark"></i> Status</th>
                                                <th><i class="fa fa-filter"></i> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users_play as $data)
                                                <tr id="tr-{{ $data->id }}">
                                                    <td style="display: none;" id="users-play-id-{{ $data->id }}">{{ $data->id }}</td>
                                                    <td id="users-play-user-id-{{ $data->id }}">{{ $data->user_id }}</td>
                                                    <td id="users-play-saction-{{ $data->id }}">{{ $data->saction }}</td>
                                                    <td id="users-play-total-{{ $data->id }}">{{ $data->total }}</td>
                                                    <td id="users-play-expire-date-{{ $data->id }}">{{ $data->date_created }}</td>
                                                    <td id="users-play-expire-date-{{ $data->id }}">{{ $data->expire_date }}</td>
                                                    <td id="users-play-status-{{ $data->id }}">
                                                        <div style="display: inline">
                                                            @if ($data->status == 1)
                                                                <span class="label label-status label-success label-mini">On</span>
                                                            @else
                                                                <span class="label label-status label-warning label-mini">Off</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a value="{{ $data->id }}" href="#editUsersPlayModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                        <button value="{{ $data->user_id }}" class="view-sum-total">Sum Total</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Edit Modal HTML -->
                            <div id="editUsersPlayModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ url('users-play') }}">
                                            <div class="modal-header">						
                                                <h4 class="modal-title">Edit Users Play</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">	
                                                <div class="form-group" style="display: none;">
                                                    <label>ID</label>
                                                    <input type="text" class="form-control old-users-play-id" >
                                                </div>
                                                <div class="form-group" style="display: none;">
                                                    <label>User ID</label>
                                                    <input type="text" class="form-control old-users-play-user-id" >
                                                </div>
                                                <div class="form-group" style="display: none;">
                                                    <label>Saction</label>
                                                    <input type="text" class="form-control old-users-play-saction" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Total</label>
                                                    <input type="text" class="form-control old-users-play-total" >
                                                </div>
                                                <div class="form-group" style="display: none;">
                                                    <label>Date Created</label>
                                                    <input type="date" class="form-control old-users-play-date-created" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Expire Date</label>
                                                    <input type="date" class="form-control old-users-play-expire-date" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="old-users-play-status">
                                                        <option value="1">Active</option>
                                                        <option value="0">Deactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                <input type="submit" class="btn btn-info edit-users-play" value="Save">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /content-panel -->
                        <div class="custom-pagination"> {!! $users_play->appends(['search' => Request::get('search')])->render() !!} </div>
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
    @include('handle_js.users_play')
</html>