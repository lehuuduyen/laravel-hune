<!DOCTYPE html>
<html lang="en">

<head>
    @include('include_lib.lib_css')
    @include('include_lib.css_for_table')
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
                <h3><i class="fa fa-angle-right"></i> Danh sách bài đăng</h3>
                <!-- row -->
                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            {!! Form::open(['method' => 'GET', 'url' => '/transports', 'class' => '', 'role' => 'search']) !!}
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            {!! Form::close() !!}
                            <table id="table_customers" class="" style="width: 100%">
                                <hr>
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-id-card"></i> ID</th>
                                        <th><i class="fa fa-th-list"></i> Title</th>
                                        <th><i class="fa fa-table"></i> Date Created</th>
                                        <th><i class="fa fa-tags"></i> Price</th>
                                        <th><i class="fa fa-bookmark"></i> Status</th>
                                        <th><i class="fa fa-motorcycle"></i> Image</th>
                                        <th><i class="fa fa-filter"></i> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $data)
                                        <tr>
                                            <td>
                                                <a href="{{ url('/transports/post/' . $data->id) }}">{{ $data->id }}</a>
                                            </td>
                                            <td>
                                                {{ $data->title }}
                                            </td>
                                            <td>
                                                {{ $data->date_created }}
                                            </td>
                                            <td>
                                                {{ $data->price }}
                                            </td>
                                            <td id="status-{{ $data->id }}">
                                                @if ($data->status == 1)
                                                    <span class="label label-status label-success label-mini">On</span>
                                                @else
                                                    <span class="label label-status label-warning label-mini">Off</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if (!isset($data->image))
                                                    <img src="https://img.icons8.com/ios-filled/50/000000/user.png" alt="" style="border:0;" height="50" width="80">
                                                @else
                                                    <img src="https://prdapp.hunegroup.com/fileupload/Transport/{{ $data->image }}"alt="" style="border:0;" height="50" width="80">
                                                @endif
                                            </td>
                                            <td>
                                                <button style="margin-right: 5px;" data-original-title="Chi tiết" class="btn btn-primary btn-xs tooltips"><i class="fa fa-pencil"></i></button>
                                                <button id="{{ $data->id }}" user_id="{{ $data->user_id }}" title_post="{{ $data->title }}" data-original-title="Mở/Đóng" value="{{ $data->status }}" class="power_off btn btn-danger btn-xs tooltips"><i class="fa fa-power-off"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class=""> {!! $posts->appends(['search' => Request::get('search')])->render() !!} </div>
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
    @include('include_lib.lib_js')
    @include('handle_js.dataTables_Trans')
    @include('handle_js.approvedPost')
</body>

</html>