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
                                                <a href="<?php echo e(url('/banner/create')); ?>" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Banner</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="table_customers" style="width: 100%" class="">
                                        <thead>
                                            <tr>
                                                <th><i class="fa fa-id-card"></i> ID</th>
                                                
                                                
                                                
                                                
                                                <th><i class="fa fa-link"></i> Url</th>
                                                
                                                
                                                
                                                <th><i class="fa fa-image"></i> Image</th>
                                                <th><i class="fa fa-bookmark"></i> Status</th>
                                                <th><i class="fa fa-filter"></i> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr id="tr-<?php echo e($data->id); ?>">
                                                    <td id="banner-id-<?php echo e($data->id); ?>">
                                                        <a href="<?php echo e(url('/banner'. '/' . $data->id)); ?>"><?php echo e($data->id); ?></a>
                                                    </td>
                                                    
                                                    
                                                    
                                                    
                                                    <td id="banner-url-<?php echo e($data->id); ?>"><?php echo e($data->url); ?></td>
                                                    
                                                    
                                                    
                                                    <td>
                                                        <?php if(!isset($data->photos)): ?>
                                                            <img src="https://img.icons8.com/ios-filled/50/000000/user.png" alt="" style="border:0;" height="50" width="80">
                                                        <?php else: ?>
                                                            <?php if(strpos($data->photos, 'http') !== false): ?>
                                                                <img src="https://img.icons8.com/ios-filled/50/000000/user.png" alt="" style="border:0;" height="50" width="80">
                                                            <?php else: ?>
                                                                <img src="https://prdapp.hunegroup.com/fileupload/Ads/<?php echo e($data->photos); ?>" alt="" style="border:0;" height="50" width="80">
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td id="banner-status-<?php echo e($data->id); ?>">
                                                        <div style="display: inline">
                                                            <?php if($data->status == 1): ?>
                                                                <span class="label label-status label-success label-mini">On</span>
                                                            <?php else: ?>
                                                                <span class="label label-status label-warning label-mini">Off</span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a value="<?php echo e($data->id); ?>" href="<?php echo e(url('/banner'. '/' . $data->id . '/edit')); ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                        <?php echo Form::open([
                                                            'method' => 'DELETE',
                                                            'url' => ['/banner', $data->id],
                                                            'style' => 'display:inline'
                                                        ]); ?>

                                                            <?php echo Form::button('
                                                                <i style="color: red;" class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>', array(
                                                                    'type' => 'submit',
                                                                    'class' => 'btn-delete',
                                                                    'style' => 'background: unset;border: unset;',
                                                                    'title' => 'Delete Banner',
                                                                    'onclick'=>'return confirm("Confirm delete?")'
                                                            )); ?>

                                                        <?php echo Form::close(); ?>

                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
</body>
    <?php echo $__env->make('include_lib.lib_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
</html><?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/ads/listBanner.blade.php ENDPATH**/ ?>