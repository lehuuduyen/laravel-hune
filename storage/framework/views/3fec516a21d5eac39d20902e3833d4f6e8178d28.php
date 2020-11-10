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
                <h3><i class="fa fa-angle-right"></i> Users Tracking Data</h3>
                <!-- row -->
                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            <?php echo Form::open(['method' => 'GET', 'url' => '/tracking', 'class' => '', 'role' => 'search']); ?>

                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search..." value="<?php echo e(request('search')); ?>">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            <?php echo Form::close(); ?>

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
                                                
                                                <th> Saction</th>
                                                <th> Date Created</th>
                                                <th> Service</th>
                                                <th> Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $users_tracking_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr id="tr-<?php echo e($data->id); ?>">
                                                    <td style="display: none;" id="tracking-id-<?php echo e($data->id); ?>"><?php echo e($data->id); ?></td>
                                                    <td style="
                                                    width: 300px;
                                                    overflow: auto;
                                                    white-space: nowrap;
                                                    text-overflow: ellipsis;
                                                    display: none;
                                                    height: 60px;
                                                " id="tracking-title-<?php echo e($data->id); ?>"><?php echo e($data->data); ?></td>
                                                    <td id="tracking-content-<?php echo e($data->id); ?>"><?php echo e($data->user_id); ?></td>
                                                    <td id="tracking-total-<?php echo e($data->id); ?>"><?php echo e($data->ref_id); ?></td>
                                                    <td id="tracking-expire-date-<?php echo e($data->id); ?>"><?php echo e($data->postid); ?></td>
                                                    
                                                    <td id="tracking-expire-date-<?php echo e($data->id); ?>"><?php echo e($data->saction); ?></td>
                                                    <td id="tracking-expire-date-<?php echo e($data->id); ?>"><?php echo e($data->date_created); ?></td>
                                                    <td id="tracking-expire-date-<?php echo e($data->id); ?>">
                                                        
                                                        <?php switch($data->servicecode):
                                                            case ('100'): ?>
                                                                User
                                                                <?php break; ?>
                                                            <?php case ('200'): ?>
                                                                Ads
                                                                <?php break; ?>
                                                            <?php case ('300'): ?>
                                                                Transport
                                                                <?php break; ?>
                                                            <?php case ('400'): ?>
                                                                Chat
                                                                <?php break; ?>
                                                            <?php case ('500'): ?>
                                                                Notification
                                                                <?php break; ?>
                                                            <?php case ('600'): ?>
                                                                LandHouse
                                                                <?php break; ?>
                                                            <?php case ('700'): ?>
                                                                Recruitment
                                                                <?php break; ?>
                                                            <?php case ('800'): ?>
                                                                Nail
                                                                <?php break; ?>
                                                            <?php case ('900'): ?>
                                                                Tour
                                                                <?php break; ?>
                                                            <?php case ('1000'): ?>
                                                                Shop
                                                                <?php break; ?>
                                                            <?php case ('1001'): ?>
                                                                Promotion
                                                                <?php break; ?>
                                                            <?php case ('1002'): ?>
                                                                MiniGame
                                                                <?php break; ?>
                                                            <?php default: ?>
                                                                
                                                        <?php endswitch; ?>
                                                    </td>
                                                    <td id="tracking-status-<?php echo e($data->id); ?>">
                                                        <div style="display: inline">
                                                            <?php if($data->status == 1): ?>
                                                                <span class="label label-status label-success label-mini">On</span>
                                                            <?php else: ?>
                                                                <span class="label label-status label-warning label-mini">Off</span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /content-panel -->
                        <div class="custom-pagination"> <?php echo $users_tracking_data->appends(['search' => Request::get('search')])->render(); ?> </div>
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
</html><?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/tracking/users_tracking_data.blade.php ENDPATH**/ ?>