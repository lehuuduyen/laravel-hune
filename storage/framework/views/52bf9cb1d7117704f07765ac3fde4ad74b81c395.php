<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('include_lib.lib_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('include_lib.css_for_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        /* Modal styles */
        .modal .modal-dialog {
            max-width: 400px;
        }
        .modal .modal-header, .modal .modal-body, .modal .modal-footer {
            padding: 20px 30px;
        }
        .modal .modal-content {
            border-radius: 3px;
        }
        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }
        .modal .modal-title {
            display: inline-block;
        }
        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }
        .modal textarea.form-control {
            resize: vertical;
        }
        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }	
        .modal form label {
            font-weight: normal;
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
                <h3><i class="fa fa-angle-right"></i> Thông tin Users</h3>
                <!-- row -->
                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            <?php echo Form::open(['method' => 'GET', 'url' => '/users', 'class' => '', 'role' => 'search']); ?>

                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search..." value="<?php echo e(request('search')); ?>">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            <?php echo Form::close(); ?>

                            <table id="table_customers" class="" style="width: 100%">
                                <hr>
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-id-card"></i> ID</th>
                                        <th><i class="fa fa-user"></i> Full Name</th>
                                        <th><i class="fa fa-bullhorn"></i> Phone</th>
                                        <th>OS</th>
                                        <th><i class="fa fa-facebook-square"></i> Facebook ID</th>
                                        <th><i class="fa fa-bookmark"></i> Status</th>
                                        <th><i class="fa fa-user"></i> Avatar</th>
                                        <th><i class="fa fa-filter"></i> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo e(url('user/' . $data->id)); ?>"><?php echo e($data->id); ?></a>
                                            </td>
                                            <td>
                                                <?php echo e($data->full_name); ?>

                                            </td>
                                            <td>
                                                <?php echo e($data->phone); ?>

                                            </td>
                                            <td>
                                                <?php echo e($data->os); ?>

                                            </td>
                                            
                                                
                                                
                                                
                                            
                                            <td>
                                                <?php echo e($data->facebook_id); ?>

                                            </td>
                                            <td id="status-<?php echo e($data->id); ?>">
                                                <?php if($data->status == 1): ?>
                                                    <span class="label label-status label-success label-mini">On</span>
                                                <?php else: ?>
                                                    <span class="label label-status label-warning label-mini">Off</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if(!isset($data->avatar)): ?>
                                                    <img src="https://img.icons8.com/ios-filled/50/000000/user.png" alt="" style="border:0;" height="50" width="80">
                                                <?php else: ?>
                                                    <?php if(strpos($data->avatar, 'http') !== false): ?>
                                                        <img src="https://img.icons8.com/ios-filled/50/000000/user.png" alt="" style="border:0;" height="50" width="80">
                                                    <?php else: ?>
                                                        <img src="https://prdapp.hunegroup.com/fileupload/User/<?php echo e($data->avatar); ?>"alt="" style="border:0;" height="50" width="80">
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <button style="margin-right: 5px;" data-original-title="Chi tiết" class="btn btn-primary btn-xs tooltips"><i class="fa fa-pencil"></i></button>
                                                <button style="margin-right: 5px;" id="<?php echo e($data->id); ?>" data-original-title="Mở/Đóng" value="<?php echo e($data->status); ?>" class="power_off btn btn-danger btn-xs tooltips"><i class="fa fa-power-off"></i></button>
                                                <button href="#addPointModal" data-original-title="Add Point" value="<?php echo e($data->id); ?>" token="<?php echo e($data->token); ?>" user_name="<?php echo e($data->full_name); ?>" class="add_point btn btn-success btn-xs tooltips" data-toggle="modal"><i class="fa fa-user-plus"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Edit Modal HTML -->
                        <div id="addPointModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form>
                                        <div class="modal-header">						
                                            <h4 class="modal-title">Add Point</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">					
                                            <div class="form-group">
                                                <label>User ID</label>
                                                <input disabled type="text" class="form-control point_user_id" >
                                            </div>
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input disabled type="text" class="form-control point_full_name" >
                                            </div>
                                            <div class="form-group">
                                                <label>Point</label>
                                                <input disabled type="text" class="form-control point_current" >
                                            </div>	
                                            <div class="form-group">
                                                <label>Change Point</label>
                                                <input type="text" class="form-control point_add_point" >
                                            </div>				
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                            <input type="submit" class="btn btn-success submit-add-point" value="Add">
                                        </div>
                                    </form>
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
    <?php echo $__env->make('include_lib.lib_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('handle_js.dataTables_User', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/users/index.blade.php ENDPATH**/ ?>