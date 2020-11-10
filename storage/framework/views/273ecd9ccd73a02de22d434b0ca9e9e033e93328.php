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
                <h3><i class="fa fa-angle-right"></i> Tổng doanh thu toàn bộ dịch vụ: <?php echo e(number_format($sum_price, 2)); ?></h3>
                <!-- row -->
                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            <div class="">
                                <div class="table-wrapper">
                                    <div class="table-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h2>Manage <b>Ads</b></h2>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="#addAdsModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Ads</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="table_customers" style="width: 100%" class="">
                                        <thead>
                                            <tr>
                                                <th><i class="fa fa-id-card"></i> ID</th>
                                                <th> Name</th>
                                                <th><i class="fa fa-tags"></i> Ads Cate Type</th>
                                                <th> Count Display</th>
                                                <th> Distance Display</th>
                                                <th> Price</th>
                                                <th><i class="fa fa-filter"></i> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr id="tr-<?php echo e($data->id); ?>">
                                                    <td id="ads-id-<?php echo e($data->id); ?>"><?php echo e($data->id); ?></td>
                                                    <td id="ads-name-<?php echo e($data->id); ?>"><?php echo e($data->name); ?></td>
                                                    <td id="ads-cate-type-<?php echo e($data->id); ?>"><?php echo e($data->ads_cate_id); ?></td>
                                                    <td id="ads-count-display-<?php echo e($data->id); ?>"><?php echo e($data->count_display); ?></td>
                                                    <td id="ads-distance-display-<?php echo e($data->id); ?>"><?php echo e($data->distance_display); ?></td>
                                                    <td id="ads-price-<?php echo e($data->id); ?>"><?php echo e($data->price); ?></td>
                                                    <td>
                                                        <a value="<?php echo e($data->id); ?>" href="#editAdsModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                        <a value="<?php echo e($data->id); ?>" href="#deleteAdsModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Edit Modal HTML -->
                            <div id="addAdsModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form>
                                            <div class="modal-header">						
                                                <h4 class="modal-title">Add Ads</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">					
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control add-name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ads Cate Type</label>
                                                    <select class="add-cate-type">
                                                        <?php $__currentLoopData = $list_cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Count Display</label>
                                                    <input type="text" class="form-control add-count-display" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Distance Display</label>
                                                    <input type="text" class="form-control add-distance-display" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="text" class="form-control add-price" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Date Create</label>
                                                    <input type="date" class="form-control add-date" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                <input type="submit" class="btn btn-success add-ads" value="Add">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Edit Modal HTML -->
                            <div id="editAdsModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form>
                                            <div class="modal-header">						
                                                <h4 class="modal-title">Edit Ads</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">	
                                                <div class="form-group" style="display: none;">
                                                    <label>ID</label>
                                                    <input type="text" class="form-control old-id" required>
                                                </div>				
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control old-name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ads Cate Type</label>
                                                    <select class="old-cate-type">
                                                        <?php $__currentLoopData = $list_cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Count Display</label>
                                                    <input type="text" class="form-control old-count-display" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Distance Display</label>
                                                    <input type="text" class="form-control old-distance-display" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="text" class="form-control old-price" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Date Create</label>
                                                    <input type="datetime" class="form-control old-date" required>
                                                </div>			
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                <input type="submit" class="btn btn-info edit-ads" value="Save">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Delete Modal HTML -->
                            <div id="deleteAdsModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form>
                                            <div class="modal-header">						
                                                <h4 class="modal-title">Delete Ads</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">					
                                                <p>Are you sure you want to delete these Records?</p>
                                                <p class="text-warning"><small>This action cannot be undone.</small></p>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                <input set-id="" type="submit" class="btn btn-danger delete-ads" value="Delete">
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

    <?php echo $__env->make('handle_js.ads', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</html><?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/ads/index.blade.php ENDPATH**/ ?>