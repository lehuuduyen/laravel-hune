<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Hune">
    <meta name="author" content="Hune">
    <meta name="keyword" content="Hune">
    <title>Hune Admin</title>

    <!-- Favicons -->
    <link href="<?php echo e(url('Hune_Admin/img/favicon.png')); ?>" rel="icon">
	<link href="<?php echo e(url('Hune_Admin/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon"> 
	<?php echo $__env->make('include_lib.lib_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    <?php if( Session::has('success') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong><?php echo e(Session::get('success')); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if( Session::has('error') ): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <strong><?php echo e(Session::get('error')); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    <?php endif; ?>
    <!-- **********************************************************************************************************************************************************
         MAIN CONTENT
         *********************************************************************************************************************************************************** -->
    <div id="login-page">
        <div class="container">
            <form role="form" class="form-login" action="<?php echo e(url('transports')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <h2 class="form-login-heading">sign in now</h2>
                <div class="login-wrap">
                    <input class="form-control" disabled placeholder="User Name" name="username" type="text" value="" autofocus>
                    <br>
                    <input class="form-control" disabled placeholder="Mật khẩu" name="password" type="password" value="">
                    <label class="checkbox">
                        Remember me 
                        <input style="margin-left: 5px;" type="checkbox" value="remember-me">
                        <span class="pull-right">
                            <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
                        </span>
                    </label>
                    <button disabled class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                    <hr>
                    <div class="login-social-link centered">
                        <p>or you can sign in via your social network</p>
                        <button disabled class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
                        <button disabled class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
                        <a type="button" href="<?php echo e(url('auth/google')); ?>">
                            <button class="btn btn-google" type="button"><i class="fa fa-google"></i> Google</button>
                        </a>
                    </div>
                    <div class="registration">
                        Don't have an account yet?
                        <br/>
                        <a class="" href="javascript:;">
                            Create an account
                        </a>
                    </div>
                </div>
                <!-- Modal -->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Forgot Password ?</h4>
                            </div>
                            <div class="modal-body">
                                <p>Enter your e-mail address below to reset your password.</p>
                                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                <button class="btn btn-theme" type="button">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal -->
            </form>
        </div>
    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo e(url('Hune_Admin/lib/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(url('Hune_Admin/lib/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?php echo e(url('Hune_Admin/lib/jquery.backstretch.min.js')); ?>"></script>
    <script>
        $.backstretch("<?php echo e(url('Hune_Admin/img/login-bg.jpg')); ?>", {
            speed: 500
        });
    </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/auth/login.blade.php ENDPATH**/ ?>