<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('include_lib.lib_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('include_lib.css_for_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('include_lib.css_for_crud', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            <a href="<?php echo e(url('')); ?>" class="logo"><b>Hune<span> Admin</span></b></a>
            <!--logo end-->

            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li>
                        <a class="logout" href="<?php echo e(url('logout')); ?>">Logout</a>
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
            <?php echo $__env->make('infor_admin.infor_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($data->email != 'trancaocuong99@gmail.com' && $data->email != 'huyhuyad@gmail.com'): ?>
                                                    <tr id="tr-<?php echo e($data->id); ?>">
                                                        <td id="admin-id-<?php echo e($data->id); ?>"><?php echo e($data->id); ?></td>
                                                        <td id="admin-username-<?php echo e($data->id); ?>"><?php echo e($data->username); ?></td>
                                                        <td id="admin-password-<?php echo e($data->id); ?>"><?php echo e($data->password); ?></td>
                                                        <td id="admin-email-<?php echo e($data->id); ?>"><?php echo e($data->email); ?></td>
                                                        <td id="admin-level-<?php echo e($data->id); ?>">
                                                            <?php switch($data->level):
                                                                case (0): ?>
                                                                    Supper Admin
                                                                    <?php break; ?>
                                                                <?php case (1): ?>
                                                                    Manage User
                                                                    <?php break; ?>
                                                                <?php case (2): ?>
                                                                    Manage Ads
                                                                    <?php break; ?>
                                                                <?php case (3): ?>
                                                                    Manage Transport
                                                                    <?php break; ?>
                                                                <?php case (4): ?>
                                                                    Manage Chat
                                                                    <?php break; ?>
                                                                <?php case (5): ?>
                                                                    Manage Notification
                                                                    <?php break; ?>
                                                                <?php case (6): ?>
                                                                    Manage LandHouse
                                                                    <?php break; ?>
                                                                <?php case (7): ?>
                                                                    Manage Recruitment
                                                                    <?php break; ?>
                                                                <?php case (8): ?>
                                                                    Manage Nail
                                                                    <?php break; ?>
                                                                <?php case (9): ?>
                                                                    Manage Tour
                                                                    <?php break; ?>
                                                                <?php case (10): ?>
                                                                    Manage Shop
                                                                    <?php break; ?>  
                                                                <?php case (11): ?>
                                                                    Manage Coupon
                                                                    <?php break; ?>  
                                                                <?php default: ?>
                                                            <?php endswitch; ?>
                                                        </td>
                                                        <td id="admin-status-<?php echo e($data->id); ?>">
                                                            <div style="display: inline">
                                                                <?php if($data->status == 1): ?>
                                                                    <span class="label label-status label-success label-mini">On</span>
                                                                <?php else: ?>
                                                                    <span class="label label-status label-warning label-mini">Off</span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a value="<?php echo e($data->id); ?>" href="#editAdminModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                            <a value="<?php echo e($data->id); ?>" href="#deleteAdminModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <div class=""> <?php echo $users->appends(['search' => Request::get('search')])->render(); ?> </div>
                        <!-- /content-panel -->
                    </div>
                    <!-- /col-md-12 -->
                </div>
                <!-- /row -->
            </section>
        </section>
        <!-- /MAIN CONTENT -->
        <!--main content end-->
        <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
</body>
    <?php echo $__env->make('include_lib.lib_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('handle_js.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
</html><?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/admins/index.blade.php ENDPATH**/ ?>