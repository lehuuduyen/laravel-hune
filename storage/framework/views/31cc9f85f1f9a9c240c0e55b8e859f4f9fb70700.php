<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('include_lib.lib_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('include_lib.css_for_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                <h3><i class="fa fa-angle-right"></i> Danh sách bài đăng</h3>
                <!-- row -->
                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            <?php echo Form::open(['method' => 'GET', 'url' => '/ads/transports', 'class' => '', 'role' => 'search']); ?>

                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search..." value="<?php echo e(request('search')); ?>">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <h4>Tổng doanh thu: <?php echo e(number_format($sum_price, 2)); ?></h4>
                            <?php echo Form::close(); ?>

                            <table id="table_customers" class="" style="width: 100%">
                                <hr>
                                <thead>
                                    <tr>
                                        
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
                                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            
                                            <td><?php echo e($data->code); ?></td>
                                            <td><?php echo e($data->ads_id); ?></td>
                                            <td><?php echo e($data->ads_cate_type); ?></td>
                                            <td><?php echo e($data->ads_name); ?></td>
                                            <td><?php echo e($data->count_display); ?></td>
                                            <td><?php echo e($data->distance_display); ?></td>
                                            <td><?php echo e($data->price); ?></td>
                                            <td><?php echo e($data->user_id); ?></td>
                                            <td>
                                                <a href="<?php echo e(url('/transports/post/' . $data->post_id)); ?>"><?php echo e($data->post_id); ?></a>
                                            </td>
                                            <td id="status-<?php echo e($data->id); ?>">
                                                <?php if($data->status == 1): ?>
                                                    <span class="label label-status label-success label-mini">On</span>
                                                <?php else: ?>
                                                    <span class="label label-status label-warning label-mini">Off</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <button style="margin-right: 5px;" data-original-title="Chi tiết" class="btn btn-primary btn-xs tooltips"><i class="fa fa-pencil"></i></button>
                                                <button id="<?php echo e($data->id); ?>" type_ser="1" ads_name="<?php echo e($data->ads_name); ?>" post_id="<?php echo e($data->post_id); ?>" user_id="<?php echo e($data->user_id); ?>" data-original-title="Mở/Đóng" value="<?php echo e($data->status); ?>" class="power_off btn btn-danger btn-xs tooltips"><i class="fa fa-power-off"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class=""> <?php echo $posts->appends(['search' => Request::get('search')])->render(); ?> </div>
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
    <?php echo $__env->make('handle_js.dataTables_Ads', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/ads/transports/index.blade.php ENDPATH**/ ?>