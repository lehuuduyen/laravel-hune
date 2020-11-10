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
                                    @if (!$post->image)
                                        <div class="preview-pic tab-content">
                                            <div class="tab-pane active" id="pic-1"><img src="http://placekitten.com/388/388" style="height: 100%; width: 100%; object-fit: contain;"/></div>
                                            {{-- <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/388/388" style="height: 100%; width: 100%; object-fit: contain;"/></div>
                                            <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/388/388" style="height: 100%; width: 100%; object-fit: contain;"/></div>
                                            <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/388/388" style="height: 100%; width: 100%; object-fit: contain;"/></div>
                                            <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/388/388" style="height: 100%; width: 100%; object-fit: contain;"/></div> --}}
                                        </div>
                                        <ul class="preview-thumbnail nav nav-tabs">
                                            <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="http://placekitten.com/66/66" style="height: 100%; width: 100%; object-fit: contain;"/></a></li>
                                            {{-- <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/66/66" style="height: 100%; width: 100%; object-fit: contain;"/></a></li>
                                            <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/66/66" style="height: 100%; width: 100%; object-fit: contain;"/></a></li>
                                            <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/66/66" style="height: 100%; width: 100%; object-fit: contain;"/></a></li>
                                            <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/66/66" style="height: 100%; width: 100%; object-fit: contain;"/></a></li> --}}
                                        </ul>
                                    @else
                                        <div class="preview-pic tab-content">
                                            {{-- @for ($i = 0; $i < count($array_photo); $i++) --}}
                                                {{-- @if ($i == 0) --}}
                                                    <div class="tab-pane active" id="pic-1"><img style="height: 100%; width: 100%; object-fit: contain;" src="https://prdapp.hunegroup.com/fileupload/User/{{ $post->image }}" /></div>
                                                {{-- @else --}}
                                                    {{-- <div class="tab-pane" id="pic-{{ $i }}"><img style="height: 100%; width: 100%; object-fit: contain;" src="https://prdapp.hunegroup.com/fileupload/User/{{ $array_photo[$i] }}" /></div> --}}
                                                {{-- @endif --}}
                                            {{-- @endfor --}}
                                        </div>
                                        <ul class="preview-thumbnail nav nav-tabs">
                                            {{-- @for ($i = 0; $i < count($array_photo); $i++) --}}
                                                {{-- @if ($i == 0) --}}
                                                    <li class="active"><a data-target="#pic-1" data-toggle="tab"><img style="height: 100%; width: 100%; object-fit: contain;" src="https://prdapp.hunegroup.com/fileupload/User/{{ $post->image }}" /></a></li>
                                                {{-- @else --}}
                                                    {{-- <li><a data-target="#pic-{{ $i }}" data-toggle="tab"><img style="height: 100%; width: 100%; object-fit: contain;" src="https://prdapp.hunegroup.com/fileupload/User/{{ $array_photo[$i] }}" /></a></li> --}}
                                                {{-- @endif --}}
                                            {{-- @endfor --}}
                                        </ul>
                                    @endif
                                </div>
                                <div class="details col-md-6">
                                    <h3 class="product-title">{{ $post->title }}</h3>
                                    <p class="product-code"><strong>Code: </strong>{{ $post->code }}</p>
                                    <p class="product-date_start"><strong>Date Start: </strong>{{ $post->date_start }}</p>
                                    <p class="product-date_end"><strong>Date End: </strong>{{ $post->date_end }}</p>
                                    <p class="product-point"><strong>Point: </strong>{{ $post->point }}</p>
                                    <p class="product-date_created"><strong>Date Created: </strong>{{ $post->date_created }}</p>
                                    <p class="product-url"><strong>Url: </strong>{{ $post->url }}</p>
                                    <p class="product-description"><strong>Description: </strong>{{ $post->description }}</p>
                                    <p class="product-amount"><strong>Amount: </strong>{{ $post->amount }}</p>
                                    <p class="product-policy"><strong>Policy: </strong>{{ $post->policy }}</p>
                                    <p class="product-phone"><strong>Phone: </strong>{{ $post->phone }}</p>
                                    <p class="product-email"><strong>Email: </strong>{{ $post->email }}</p>
                                    <p class="product-shopname"><strong>Shop Name: </strong>{{ $post->shopname }}</p>
                                    <h5 class="sizes">Địa Chỉ:
                                        <span class="size" data-toggle="tooltip" title="small">{{ $post->address }}</span>
                                    </h5>
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

</html>
