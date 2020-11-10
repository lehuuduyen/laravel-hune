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
                <h3><i class="fa fa-angle-right"></i> Danh sách bài đăng bị Report</h3>
                <!-- row -->
                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            {!! Form::open(['method' => 'GET', 'url' => '/landhouses/list-report', 'class' => '', 'role' => 'search']) !!}
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
                                        {{-- <th><i class="fa fa-id-card"></i> User ID</th> --}}
                                        <th><i class="fa fa-th-list"></i> Title</th>
                                        <th><i class="fa fa-th-list"></i> Type Report</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $data)
                                        <tr>
                                            {{-- <td>
                                                {{ $data->user_id }}
                                            </td> --}}
                                            <td>
                                                <a href="{{ url('/landhouses/post/' . $data->post_id) }}">{{ $data->title }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ url('/landhouses/list-report/' . $data->type_report_id) }}">{{ $data->name }}</a>
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
</body>

</html>