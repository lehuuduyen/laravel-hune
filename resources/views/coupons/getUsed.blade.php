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
                <h3><i class="fa fa-angle-right"></i> Coupons</h3>
                <!-- row -->
                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            <div class="">
                                <div class="table-wrapper">
                                    <div class="table-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h2>Manage <b>Coupons</b></h2>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="#addCouponModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Coupon</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="table_customers" style="width: 100%" class="">
                                        <thead>
                                            <tr>
                                                {{-- <th><i class="fa fa-id-card"></i> ID</th> --}}
                                                <th><i class="fa fa-code"></i> Code</th>
                                                <th><i class="fa fa-th-list"></i> Title</th>
                                                <th><i class="fa fa-table"></i> Date Start</th>
                                                <th><i class="fa fa-table"></i> Date End</th>
                                                <th><i class="fa fa-link"></i> Used</th>
                                                <th>Point</th>
                                                <th>Amount</th>
                                                <th><i class="fa fa-tags"></i> Category</th>
                                                <th><i class="fa fa-image"></i> Image</th>
                                                <th><i class="fa fa-bookmark"></i> Status</th>
                                                <th><i class="fa fa-filter"></i> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($coupons as $data)
                                                <tr id="tr-{{ $data->id }}">
                                                    <td style="display: none;" id="coupon-id-{{ $data->id }}">{{ $data->id }}</td>
                                                    <td id="coupon-code-{{ $data->id }}">{{ $data->code }}</td>
                                                    <td id="coupon-title-{{ $data->id }}">{{ $data->title }}</td>
                                                    <td id="coupon-date-start-{{ $data->id }}">{{ $data->date_start }}</td>
                                                    <td id="coupon-date-end-{{ $data->id }}">{{ $data->date_end }}</td>
                                                    <td id="coupon-used-{{ $data->id }}">{{ $data->count_coupon }}</td>
                                                    <td id="coupon-point-{{ $data->id }}">{{ $data->point }}</td>
                                                    <td id="coupon-amount-{{ $data->id }}">{{ $data->amount }}</td>
                                                    <td id="coupon-cate-{{ $data->id }}">{{ $data->cate }}</td>
                                                    <td>
                                                        @if (!isset($data->image))
                                                            <img src="https://img.icons8.com/ios-filled/50/000000/user.png" alt="" style="border:0;" height="50" width="80">
                                                        @else
                                                            @if (strpos($data->image, 'http') !== false)
                                                                <img src="https://img.icons8.com/ios-filled/50/000000/user.png" alt="" style="border:0;" height="50" width="80">
                                                            @else
                                                                <img src="https://prdapp.hunegroup.com/fileupload/User/{{ $data->image }}"alt="" style="border:0;" height="50" width="80">
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td id="coupon-status-{{ $data->id }}">
                                                        <div style="display: inline">
                                                            @if ($data->status == 1)
                                                                <span class="label label-status label-success label-mini">On</span>
                                                            @else
                                                                <span class="label label-status label-warning label-mini">Off</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a value="{{ $data->id }}" href="#editCouponModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                        <a value="{{ $data->id }}" href="#deleteCouponModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Edit Modal HTML -->
                            <div id="addCouponModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ url('coupons') }}">
                                            <div class="modal-header">						
                                                <h4 class="modal-title">Add Coupon</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">					
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control add-coupon-title" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Date Create</label>
                                                    <input type="date" class="form-control add-coupon-date" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Date Start</label>
                                                    <input type="date" class="form-control add-coupon-date-start" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Date End</label>
                                                    <input type="date" class="form-control add-coupon-date-end" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Url</label>
                                                    <input type="text" class="form-control add-coupon-url" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Point</label>
                                                    <input type="text" class="form-control add-coupon-point" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea rows="4" class="form-control add-coupon-desc" cols="50"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control add-coupon-address" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Amount</label>
                                                    <input type="text" class="form-control add-coupon-amount" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Policy</label>
                                                    <textarea rows="4" class="form-control add-coupon-policy" cols="50"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Shop Name</label>
                                                    <input type="text" class="form-control add-coupon-shop-name" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" class="form-control add-coupon-phone" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control add-coupon-email" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <select class="add-coupon-cate">
                                                        @foreach ($cates as $data)
                                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>			
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="add-coupon-status">
                                                        <option value="1">Active</option>
                                                        <option value="0">Deactive</option>
                                                    </select>
                                                </div>	
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <input type="file" class="form-control add-coupon-image" id="add-fileUpload"  accept="image/*">
                                                </div>				
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                <input type="submit" class="btn btn-success add-coupon" value="Add">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Edit Modal HTML -->
                            <div id="editCouponModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ url('coupons') }}">
                                            <div class="modal-header">						
                                                <h4 class="modal-title">Edit Coupon</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">	
                                                <div class="form-group" style="display: none;">
                                                    <label>ID</label>
                                                    <input type="text" class="form-control old-coupon-id" >
                                                </div>				
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control old-coupon-title" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Date Create</label>
                                                    <input type="date" class="form-control old-coupon-date" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Date Start</label>
                                                    <input type="date" class="form-control old-coupon-date-start" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Date End</label>
                                                    <input type="date" class="form-control old-coupon-date-end" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Url</label>
                                                    <input type="text" class="form-control old-coupon-url" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Point</label>
                                                    <input type="text" class="form-control old-coupon-point" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea type="text" class="form-control old-coupon-desc" rows="4" cols="50"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control old-coupon-address" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Amount</label>
                                                    <input type="text" class="form-control old-coupon-amount" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Policy</label>
                                                    <textarea type="text" class="form-control old-coupon-policy" rows="4" cols="50"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Shop Name</label>
                                                    <input type="text" class="form-control old-coupon-shop-name" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" class="form-control old-coupon-phone" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control old-coupon-email" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <select class="old-coupon-cate">
                                                        @foreach ($cates as $data)
                                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>	
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="old-coupon-status">
                                                        <option value="1">Active</option>
                                                        <option value="0">Deactive</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <input type="file" class="form-control old-coupon-image" id="edit-fileUpload"  accept="image/*" value="">
                                                </div>			
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                <input type="submit" class="btn btn-info edit-coupon" value="Save">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Delete Modal HTML -->
                            <div id="deleteCouponModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ url('coupons') }}">
                                            <div class="modal-header">						
                                                <h4 class="modal-title">Delete Coupon</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">					
                                                <p>Are you sure you want to delete these Records?</p>
                                                <p class="text-warning"><small>This action cannot be undone.</small></p>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                <input set-id="" type="submit" class="btn btn-danger delete-coupon" value="Delete">
                                            </div>
                                        </form>
                                    </div>
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

    @include('handle_js.couponUsed')
</html>