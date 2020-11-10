<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('include_lib.lib_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('include_lib.css_for_detail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            <section class="wrapper" style="margin-top: 0; padding-top: 60px;">
                <!-- row -->
                <div class="row mt">
                    <h3 style="margin: 0; padding-left: 30px;">Thông tin bài đăng</h3>
                    <div class="col-md-12">
                        <div class="container-fliud">
                            <div class="wrapper row" style="margin-top: 40px;">
                                <div class="preview col-md-6">
                                    <?php if(!$photo->image): ?>
                                        <div class="preview-pic tab-content">
                                            <div class="tab-pane active" id="pic-1"><img src="http://placekitten.com/388/388" style="height: 100%; width: 100%; object-fit: contain;"/></div>
                                            <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/388/388" style="height: 100%; width: 100%; object-fit: contain;"/></div>
                                            <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/388/388" style="height: 100%; width: 100%; object-fit: contain;"/></div>
                                            <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/388/388" style="height: 100%; width: 100%; object-fit: contain;"/></div>
                                            <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/388/388" style="height: 100%; width: 100%; object-fit: contain;"/></div>
                                        </div>
                                        <ul class="preview-thumbnail nav nav-tabs">
                                            <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="http://placekitten.com/66/66" style="height: 100%; width: 100%; object-fit: contain;"/></a></li>
                                            <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/66/66" style="height: 100%; width: 100%; object-fit: contain;"/></a></li>
                                            <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/66/66" style="height: 100%; width: 100%; object-fit: contain;"/></a></li>
                                            <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/66/66" style="height: 100%; width: 100%; object-fit: contain;"/></a></li>
                                            <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/66/66" style="height: 100%; width: 100%; object-fit: contain;"/></a></li>
                                        </ul>
                                    <?php else: ?>
                                        <?php
                                            $array_photo = explode(',', $photo->image);
                                        ?>
                                        <div class="preview-pic tab-content">
                                            <?php for($i = 0; $i < count($array_photo); $i++): ?>
                                                <?php if($i == 0): ?>
                                                    <div class="tab-pane active" id="pic-<?php echo e($i); ?>"><img style="height: 100%; width: 100%; object-fit: contain;" src="https://prdapp.hunegroup.com/fileupload/Shop/<?php echo e($array_photo[$i]); ?>" /></div>
                                                <?php else: ?>
                                                    <div class="tab-pane" id="pic-<?php echo e($i); ?>"><img style="height: 100%; width: 100%; object-fit: contain;" src="https://prdapp.hunegroup.com/fileupload/Shop/<?php echo e($array_photo[$i]); ?>" /></div>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </div>
                                        <ul class="preview-thumbnail nav nav-tabs">
                                            <?php for($i = 0; $i < count($array_photo); $i++): ?>
                                                <?php if($i == 0): ?>
                                                    <li class="active"><a data-target="#pic-<?php echo e($i); ?>" data-toggle="tab"><img style="height: 100%; width: 100%; object-fit: contain;" src="https://prdapp.hunegroup.com/fileupload/Shop/<?php echo e($array_photo[$i]); ?>" /></a></li>
                                                <?php else: ?>
                                                    <li><a data-target="#pic-<?php echo e($i); ?>" data-toggle="tab"><img style="height: 100%; width: 100%; object-fit: contain;" src="https://prdapp.hunegroup.com/fileupload/Shop/<?php echo e($array_photo[$i]); ?>" /></a></li>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                                <div class="details col-md-6">
                                    <h3 class="product-title"><?php echo e($post->title); ?></h3>
                                    <p class="product-description"><?php echo e($post->description); ?></p>
                                    <h4 class="price">Giá hiện tại: <span><?php echo e($post->price); ?></span></h4>
                                    <p class="vote">Tình Trạng: <strong><?php echo e($post->current_status_info); ?></strong></p>
                                    <h5 class="sizes">Địa Chỉ:
                                        <span class="size" data-toggle="tooltip" title="small"><?php echo e($post->address); ?></span>
                                    </h5>
                                    <h5 class="sizes">User_ID:
                                        <a href="<?php echo e(url('show-list-post?id='.$post->user_id.'&service=10')); ?>">
                                            <span class="size" data-toggle="tooltip" title="small"><?php echo e($post->user_id); ?></span>
                                        </a>
                                    </h5>
                                    <?php if(isset($count_rp) && count($count_rp) > 0): ?>
                                        <h5 class="sizes">Bài đăng này đã bị Report:
                                            <?php $__currentLoopData = $count_rp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <h6 style="margin: 0 0 5px 5px; font-size: 13px"><?php echo e($data->name); ?>: <?php echo e($data->number); ?> Lần</h6>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                        </h5>
                                        <p id="status-<?php echo e($post->id); ?>">Set On/Off: 
                                            <?php if($post->status == 1): ?>
                                                <button post_id="<?php echo e($post->id); ?>" post_status="<?php echo e($post->status); ?>" style="width: 50px; height: 20px; margin-left: 5px;" class="label label-status label-success label-mini power_off">On</button>
                                            <?php else: ?>
                                                <button post_id="<?php echo e($post->id); ?>" post_status="<?php echo e($post->status); ?>" style="width: 50px; height: 20px; margin-left: 5px;" class="label label-status label-warning label-mini power_off">Off</button>
                                            <?php endif; ?>
                                        </p>
                                        
                                            
                                    <?php endif; ?>
                                    
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
        <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
    <?php echo $__env->make('include_lib.lib_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
<script>
    function set_on_off(id, status) {
        $.ajax({
            url: "<?php echo url('') ?>/shops/status",
            data: {
                'id': id,
                'status': status
            },
            success: function(data) {
                status = status == 1 ? 2 : 1;
                console.log(status);
                var old_status = $('#status-'+id+' button').html();
                if (old_status == 'On') {
                    var changeStatus = '<button post_id="'+id+'" post_status="'+status+'" style="width: 50px; height: 20px; margin-left: 5px;" class="label label-status label-warning label-mini power_off">Off</button>';
                } else {
                    var changeStatus = '<button post_id="'+id+'" post_status="'+status+'" style="width: 50px; height: 20px; margin-left: 5px;" class="label label-status label-success label-mini power_off">On</button>';
                }
                $('#status-'+id).html(changeStatus);
            },
            error: function(error) {
            }
        });
    }
    $('button.power_off').click(function() {
        var id = $(this).attr('post_id');
        var status = $(this).attr('post_status');
        set_on_off(id, status);
    });
</script>
</html>
<?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/shops/detail.blade.php ENDPATH**/ ?>