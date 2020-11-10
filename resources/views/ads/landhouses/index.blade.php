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
                            {!! Form::open(['method' => 'GET', 'url' => '/ads/landhouses', 'class' => '', 'role' => 'search']) !!}
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            <h4>Tổng doanh thu: {{ number_format($sum_price, 2) }}</h4>
                            {!! Form::close() !!}
                            <table id="table_customers" class="" style="width: 100%">
                                <hr>
                                <thead>
                                    <tr>
                                        {{-- <th><i class="fa fa-id-card"></i> ID</th> --}}
                                        <th><i class="fa fa-code"></i> Code</th>
                                        <th><i class="fa fa-id-card"></i> Ads ID</th>
                                        <th><i class="fa fa-tags"></i> Ads Cate Type</th>
                                        <th> Ads Name</th>
                                        <th> Count Display</th>
                                        <th> Distance Display</th>
                                        <th> Price</th>
                                        <th><i class="fa fa-id-card"></i> User ID</th>
                                        <th><i class="fa fa-id-card"></i> Post ID</th>
                                        <th><i class="fa fa-bookmark"></i> Status</th>
                                        <th><i class="fa fa-filter"></i> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $data)
                                        <tr>
                                            {{-- <td>{{ $data->id }}</td> --}}
                                            <td>{{ $data->code }}</td>
                                            <td>{{ $data->ads_id }}</td>
                                            <td>{{ $data->ads_cate_type }}</td>
                                            <td>{{ $data->ads_name }}</td>
                                            <td>{{ $data->count_display }}</td>
                                            <td>{{ $data->distance_display }}</td>
                                            <td>{{ $data->price }}</td>
                                            <td>{{ $data->user_id }}</td>
                                            <td>
                                                <a href="{{ url('/landhouses/post/' . $data->post_id) }}">{{ $data->post_id }}</a>
                                            </td>
                                            <td id="status-{{ $data->id }}">
                                                @if ($data->status == 1)
                                                    <span class="label label-status label-success label-mini">On</span>
                                                @else
                                                    <span class="label label-status label-warning label-mini">Off</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button style="margin-right: 5px;" data-original-title="Chi tiết" class="btn btn-primary btn-xs tooltips"><i class="fa fa-pencil"></i></button>
                                                <button id="{{ $data->id }}" type_ser="2" ads_name="{{ $data->ads_name }}" post_id="{{ $data->post_id }}" user_id="{{ $data->user_id }}" data-original-title="Mở/Đóng" value="{{ $data->status }}" class="power_off btn btn-danger btn-xs tooltips"><i class="fa fa-power-off"></i></button>
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
    @include('handle_js.dataTables_Ads')
</body>

</html>