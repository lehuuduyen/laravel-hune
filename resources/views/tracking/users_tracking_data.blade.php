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
                <h3><i class="fa fa-angle-right"></i> Users Tracking Data</h3>
                <!-- row -->
                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            {!! Form::open(['method' => 'GET', 'url' => '/tracking', 'class' => '', 'role' => 'search']) !!}
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
                                                <h2>Manage <b>Users Tracking Data</b></h2>
                                            </div>
                                            <div class="col-sm-6">
                                            </div>
                                        </div>
                                    </div>
                                    <table id="table_customers" style="width: 100%" class="">
                                        <thead>
                                            <tr>
                                                <th style="
                                                width: 300px;
                                                overflow: auto;
                                                white-space: nowrap;
                                                text-overflow: ellipsis;
                                                display: none;
                                                height: 61px;
                                            "> Data</th>
                                                <th> User ID</th>
                                                <th> Ref ID</th>
                                                <th> Post ID</th>
                                                {{-- <th> Udid</th> --}}
                                                <th> Saction</th>
                                                <th> Date Created</th>
                                                <th> Service</th>
                                                <th> Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users_tracking_data as $data)
                                                <tr id="tr-{{ $data->id }}">
                                                    <td style="display: none;" id="tracking-id-{{ $data->id }}">{{ $data->id }}</td>
                                                    <td style="
                                                    width: 300px;
                                                    overflow: auto;
                                                    white-space: nowrap;
                                                    text-overflow: ellipsis;
                                                    display: none;
                                                    height: 60px;
                                                " id="tracking-title-{{ $data->id }}">{{ $data->data }}</td>
                                                    <td id="tracking-content-{{ $data->id }}">{{ $data->user_id }}</td>
                                                    <td id="tracking-total-{{ $data->id }}">{{ $data->ref_id }}</td>
                                                    <td id="tracking-expire-date-{{ $data->id }}">{{ $data->postid }}</td>
                                                    {{-- <td id="tracking-expire-date-{{ $data->id }}">{{ $data->udid }}</td> --}}
                                                    <td id="tracking-expire-date-{{ $data->id }}">{{ $data->saction }}</td>
                                                    <td id="tracking-expire-date-{{ $data->id }}">{{ $data->date_created }}</td>
                                                    <td id="tracking-expire-date-{{ $data->id }}">
                                                        {{-- {{ $data->servicecode }} --}}
                                                        @switch($data->servicecode)
                                                            @case('100')
                                                                User
                                                                @break
                                                            @case('200')
                                                                Ads
                                                                @break
                                                            @case('300')
                                                                Transport
                                                                @break
                                                            @case('400')
                                                                Chat
                                                                @break
                                                            @case('500')
                                                                Notification
                                                                @break
                                                            @case('600')
                                                                LandHouse
                                                                @break
                                                            @case('700')
                                                                Recruitment
                                                                @break
                                                            @case('800')
                                                                Nail
                                                                @break
                                                            @case('900')
                                                                Tour
                                                                @break
                                                            @case('1000')
                                                                Shop
                                                                @break
                                                            @case('1001')
                                                                Promotion
                                                                @break
                                                            @case('1002')
                                                                MiniGame
                                                                @break
                                                            @default
                                                                
                                                        @endswitch
                                                    </td>
                                                    <td id="tracking-status-{{ $data->id }}">
                                                        <div style="display: inline">
                                                            @if ($data->status == 1)
                                                                <span class="label label-status label-success label-mini">On</span>
                                                            @else
                                                                <span class="label label-status label-warning label-mini">Off</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /content-panel -->
                        <div class="custom-pagination"> {!! $users_tracking_data->appends(['search' => Request::get('search')])->render() !!} </div>
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
</html>