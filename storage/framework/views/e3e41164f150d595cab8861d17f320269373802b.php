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
                <h3><i class="fa fa-angle-right"></i> Campaign</h3>
                <!-- row -->
                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            <div class="">
                                <div class="table-wrapper">
                                    <div class="table-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h2>Manage <b>Campaign</b></h2>
                                            </div>
                                            <div class="col-sm-6">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <table id="table_customers" style="width: 100%" class="">
                                        <thead>
                                            <tr>
                                                <th><i class="fa fa-th-list"></i> Title</th>
                                                <th> Content</th>
                                                <th> Total</th>
                                                <th><i class="fa fa-bookmark"></i> Expire Date</th>
                                                <th><i class="fa fa-bookmark"></i> Status</th>
                                                <th><i class="fa fa-filter"></i> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $campaign; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr id="tr-<?php echo e($data->id); ?>">
                                                    <td style="display: none;" id="campaign-id-<?php echo e($data->id); ?>"><?php echo e($data->id); ?></td>
                                                    <td id="campaign-title-<?php echo e($data->id); ?>"><?php echo e($data->title); ?></td>
                                                    <td id="campaign-content-<?php echo e($data->id); ?>"><?php echo e($data->content); ?></td>
                                                    <td id="campaign-total-<?php echo e($data->id); ?>"><?php echo e($data->total); ?></td>
                                                    <td id="campaign-expire-date-<?php echo e($data->id); ?>"><?php echo e($data->expire_date); ?></td>
                                                    <td id="campaign-status-<?php echo e($data->id); ?>">
                                                        <div style="display: inline">
                                                            <?php if($data->status == 1): ?>
                                                                <span class="label label-status label-success label-mini">On</span>
                                                            <?php else: ?>
                                                                <span class="label label-status label-warning label-mini">Off</span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a value="<?php echo e($data->id); ?>" href="#editCampaignModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Edit Modal HTML -->
                            <div id="editCampaignModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="<?php echo e(url('campaign')); ?>">
                                            <div class="modal-header">						
                                                <h4 class="modal-title">Edit Campaign</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">	
                                                <div class="form-group" style="display: none;">
                                                    <label>ID</label>
                                                    <input type="text" class="form-control old-campaign-id" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control old-campaign-title" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Content</label>
                                                    <input type="text" class="form-control old-campaign-content" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Total</label>
                                                    <input type="text" class="form-control old-campaign-total" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Expire Date</label>
                                                    <input type="date" class="form-control old-campaign-expire-date" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="old-campaign-status">
                                                        <option value="1">Active</option>
                                                        <option value="0">Deactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                <input type="submit" class="btn btn-info edit-campaign" value="Save">
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
        <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
</body>
    <?php echo $__env->make('include_lib.lib_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('handle_js.campaign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</html><?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/tracking/campaign.blade.php ENDPATH**/ ?>