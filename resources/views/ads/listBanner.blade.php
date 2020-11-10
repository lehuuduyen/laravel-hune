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
                <h3><i class="fa fa-angle-right"></i> Ads Banner</h3>
                <!-- row -->
                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            <div class="">
                                <div class="table-wrapper">
                                    <div class="table-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h2>Manage <b>Ads Banner</b></h2>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="{{ url('/banner/create') }}" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Banner</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="table_customers" style="width: 100%" class="">
                                        <thead>
                                            <tr>
                                                <th><i class="fa fa-id-card"></i> ID</th>
                                                {{-- <th><i class="fa fa-code"></i> Code</th> --}}
                                                {{-- <th><i class="fa fa-th-list"></i> Title</th> --}}
                                                {{-- <th><i class="fa fa-table"></i> Date Start</th> --}}
                                                {{-- <th><i class="fa fa-table"></i> Date End</th> --}}
                                                <th><i class="fa fa-link"></i> Url</th>
                                                {{-- <th>Point</th> --}}
                                                {{-- <th>Amount</th> --}}
                                                {{-- <th><i class="fa fa-tags"></i> Category</th> --}}
                                                <th><i class="fa fa-image"></i> Image</th>
                                                <th><i class="fa fa-bookmark"></i> Status</th>
                                                <th><i class="fa fa-filter"></i> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $data)
                                                <tr id="tr-{{ $data->id }}">
                                                    <td id="banner-id-{{ $data->id }}">
                                                        <a href="{{ url('/banner'. '/' . $data->id) }}">{{ $data->id }}</a>
                                                    </td>
                                                    {{-- <td id="banner-code-{{ $data->id }}">{{ $data->code }}</td> --}}
                                                    {{-- <td id="banner-title-{{ $data->id }}">{{ $data->title }}</td> --}}
                                                    {{-- <td id="banner-date-start-{{ $data->id }}">{{ $data->date_start }}</td> --}}
                                                    {{-- <td id="banner-date-end-{{ $data->id }}">{{ $data->date_end }}</td> --}}
                                                    <td id="banner-url-{{ $data->id }}">{{ $data->url }}</td>
                                                    {{-- <td id="banner-point-{{ $data->id }}">{{ $data->point }}</td> --}}
                                                    {{-- <td id="banner-amount-{{ $data->id }}">{{ $data->amount }}</td> --}}
                                                    {{-- <td id="banner-cate-{{ $data->id }}">{{ $data->cate }}</td> --}}
                                                    <td>
                                                        @if (!isset($data->photos))
                                                            <img src="https://img.icons8.com/ios-filled/50/000000/user.png" alt="" style="border:0;" height="50" width="80">
                                                        @else
                                                            @if (strpos($data->photos, 'http') !== false)
                                                                <img src="https://img.icons8.com/ios-filled/50/000000/user.png" alt="" style="border:0;" height="50" width="80">
                                                            @else
                                                                <img src="https://prdapp.hunegroup.com/fileupload/Ads/{{ $data->photos }}" alt="" style="border:0;" height="50" width="80">
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td id="banner-status-{{ $data->id }}">
                                                        <div style="display: inline">
                                                            @if ($data->status == 1)
                                                                <span class="label label-status label-success label-mini">On</span>
                                                            @else
                                                                <span class="label label-status label-warning label-mini">Off</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a value="{{ $data->id }}" href="{{ url('/banner'. '/' . $data->id . '/edit') }}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                        {!! Form::open([
                                                            'method' => 'DELETE',
                                                            'url' => ['/banner', $data->id],
                                                            'style' => 'display:inline'
                                                        ]) !!}
                                                            {!! Form::button('
                                                                <i style="color: red;" class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>', array(
                                                                    'type' => 'submit',
                                                                    'class' => 'btn-delete',
                                                                    'style' => 'background: unset;border: unset;',
                                                                    'title' => 'Delete Banner',
                                                                    'onclick'=>'return confirm("Confirm delete?")'
                                                            )) !!}
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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

    {{-- @include('handle_js.banner') --}}
</html>