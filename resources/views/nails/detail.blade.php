<!DOCTYPE html>
<html lang="en">

<head>
    @include('include_lib.lib_css')
    @include('include_lib.css_for_detail')
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
            <section class="wrapper" style="margin-top: 0; padding-top: 60px;">
                <!-- row -->
                <div class="row mt">
                    <h3 style="margin: 0; padding-left: 30px;">Thông tin bài đăng</h3>
                    <div class="col-md-12">
                        <div class="container-fliud">
                            <div class="wrapper row" style="margin-top: 40px;">
                                <div class="preview col-md-6">
                                    @if (!$photo->image)
                                        <div class="preview-pic tab-content">
                                            <div class="tab-pane active" id="pic-1"><img src="http://placekitten.com/388/388" style="height: 100%; width: 100%; object-fit: contain;"/></div>
                                            <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/388/388" style="height: 100%; width: 100%; object-fit: contain;"/></div>
                                            <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/388/388" style="height: 100%; width: 100%; object-fit: contain;"/></div>
                                            <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/388/388" style="height: 100%; width: 100%; object-fit: contain;"/></div>
                                            <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/388/388" style="height: 100%; width: 100%; object-fit: contain;"/></div>
                                        </div>
                                        <ul class="preview-thumbnail nav nav-tabs">
                                            <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="http://placekitten.com/66/66" style="height: 100%; width: 100%; object-fit: contain;"/></a></li>
                                            <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/66/66" style="height: 100%; width: 100%; object-fit: contain;"/></a></li>
                                            <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/66/66" style="height: 100%; width: 100%; object-fit: contain;"/></a></li>
                                            <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/66/66" style="height: 100%; width: 100%; object-fit: contain;"/></a></li>
                                            <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/66/66" style="height: 100%; width: 100%; object-fit: contain;"/></a></li>
                                        </ul>
                                    @else
                                        @php
                                            $array_photo = explode(',', $photo->image);
                                        @endphp
                                        <div class="preview-pic tab-content">
                                            @for ($i = 0; $i < count($array_photo); $i++)
                                                @if ($i == 0)
                                                    <div class="tab-pane active" id="pic-{{ $i }}"><img style="height: 100%; width: 100%; object-fit: contain;" src="https://prdapp.hunegroup.com/fileupload/Nail/{{ $array_photo[$i] }}" /></div>
                                                @else
                                                    <div class="tab-pane" id="pic-{{ $i }}"><img style="height: 100%; width: 100%; object-fit: contain;" src="https://prdapp.hunegroup.com/fileupload/Nail/{{ $array_photo[$i] }}" /></div>
                                                @endif
                                            @endfor
                                        </div>
                                        <ul class="preview-thumbnail nav nav-tabs">
                                            @for ($i = 0; $i < count($array_photo); $i++)
                                                @if ($i == 0)
                                                    <li class="active"><a data-target="#pic-{{ $i }}" data-toggle="tab"><img style="height: 100%; width: 100%; object-fit: contain;" src="https://prdapp.hunegroup.com/fileupload/Nail/{{ $array_photo[$i] }}" /></a></li>
                                                @else
                                                    <li><a data-target="#pic-{{ $i }}" data-toggle="tab"><img style="height: 100%; width: 100%; object-fit: contain;" src="https://prdapp.hunegroup.com/fileupload/Nail/{{ $array_photo[$i] }}" /></a></li>
                                                @endif
                                            @endfor
                                        </ul>
                                    @endif
                                </div>
                                <div class="details col-md-6">
                                    <h3 class="product-title">{{ $post->title }}</h3>
                                    <p class="product-description">{{ $post->description }}</p>
                                    <h4 class="price">Giá hiện tại: <span>{{ $post->price }}</span></h4>
                                    <p class="vote">Tình Trạng: <strong>{{ $post->current_status_info }}</strong></p>
                                    <h5 class="sizes">Địa Chỉ:
                                        <span class="size" data-toggle="tooltip" title="small">{{ $post->address }}</span>
                                    </h5>
                                    <h5 class="sizes">User_ID:
                                        <a href="{{ url('show-list-post?id='.$post->user_id.'&service=8') }}">
                                            <span class="size" data-toggle="tooltip" title="small">{{ $post->user_id }}</span>
                                        </a>
                                    </h5>
                                    @if (isset($count_rp) && count($count_rp) > 0)
                                        <h5 class="sizes">Bài đăng này đã bị Report:
                                            @foreach ($count_rp as $data)
                                                <h6 style="margin: 0 0 5px 5px; font-size: 13px">{{ $data->name }}: {{ $data->number }} Lần</h6>
                                            @endforeach
                                            {{-- <a href="{{ url('show-list-post?id='.$post->user_id.'&service=3') }}">
                                                <span class="size" data-toggle="tooltip" title="small">{{ $post->user_id }}</span>
                                            </a> --}}
                                        </h5>
                                        <p id="status-{{ $post->id }}">Set On/Off: 
                                            @if ($post->status == 1)
                                                <button post_id="{{ $post->id }}" post_status="{{ $post->status }}" style="width: 50px; height: 20px; margin-left: 5px;" class="label label-status label-success label-mini power_off">On</button>
                                            @else
                                                <button post_id="{{ $post->id }}" post_status="{{ $post->status }}" style="width: 50px; height: 20px; margin-left: 5px;" class="label label-status label-warning label-mini power_off">Off</button>
                                            @endif
                                        </p>
                                        
                                            {{-- <a button href="{{ url('/nails/status?id='.$post->id.'&status='.$post->status) }}">Set On/Off Bài đăng</a> --}}
                                    @endif
                                    {{-- <h5 class="sizes">Hãng xe:
                                        <span class="size" data-toggle="tooltip" title="small">{{ $post->vendor }}</span>
                                    </h5>
                                    <h5 class="sizes">Dòng xe:
                                        <span class="size" data-toggle="tooltip" title="small">{{ $post->model }}</span>
                                    </h5> --}}
                                </div>
                            </div>
                        </div>
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
<script>
    function set_on_off(id, status) {
        $.ajax({
            url: "<?php echo url('') ?>/nails/status",
            data: {
                'id': id,
                'status': status
            },
            success: function(data) {
                status = status == 1 ? 2 : 1;
                console.log(status);
                var old_status = $('#status-'+id+' button').html();
                if (old_status == 'On') {
                    var changeStatus = '<button post_id="'+id+'" post_status="'+status+'" style="width: 50px; height: 20px; margin-left: 5px;" class="label label-status label-warning label-mini power_off">Off</button>';
                } else {
                    var changeStatus = '<button post_id="'+id+'" post_status="'+status+'" style="width: 50px; height: 20px; margin-left: 5px;" class="label label-status label-success label-mini power_off">On</button>';
                }
                $('#status-'+id).html(changeStatus);
            },
            error: function(error) {
            }
        });
    }
    $('button.power_off').click(function() {
        var id = $(this).attr('post_id');
        var status = $(this).attr('post_status');
        set_on_off(id, status);
    });
</script>
</html>
