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
                <h3><i class="fa fa-angle-right"></i> Danh sách bài đăng bị Report</h3>
                <!-- row -->
                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            <?php echo Form::open(['method' => 'GET', 'url' => '/transports/list-report', 'class' => '', 'role' => 'search']); ?>

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
                                        
                                        <th><i class="fa fa-th-list"></i> Title</th>
                                        <th><i class="fa fa-th-list"></i> Type Report</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            
                                            <td>
                                                <a href="<?php echo e(url('/transports/post/' . $data->post_id)); ?>"><?php echo e($data->title); ?></a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(url('/transports/list-report/' . $data->type_report_id)); ?>"><?php echo e($data->name); ?></a>
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
</body>

</html><?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/transports/postReport.blade.php ENDPATH**/ ?>