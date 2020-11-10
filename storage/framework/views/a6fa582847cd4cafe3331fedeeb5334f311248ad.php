<div id="sidebar" class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
        <p class="centered">
            <a href="javascript:;"><img src="<?php echo e(url('Hune_Admin/img/admin_img.png')); ?>" class="img-circle" width="80"></a>
        </p>
        <h5 class="centered">Hune Admin</h5>
        <?php echo $__env->make('menus.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </ul>
    <!-- sidebar menu end-->
</div><?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/infor_admin/infor_admin.blade.php ENDPATH**/ ?>