<li class="mt">
    <a href="">
        <img src="<?php echo e(url('/image/home.png')); ?>" alt="">
        <span>Dashboard</span>
    </a>
</li>
<?php if(Session::has('key_login')): ?> 
    <?php if(Session::get('key_login')->level == 0): ?>
        <li class="sub-menu">
            <a href="<?php echo e(url('admins')); ?>">
                <img src="<?php echo e(url('/image/admin.png')); ?>" alt="">
                <span>Admins</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('admins')); ?>">Danh sách Admins</a>
                </li>
            </ul>
        </li>
    <?php endif; ?> 
<?php endif; ?> 
<?php switch(Session::get('key_login')->level): 
    case (0): ?> 
        
        <li class="sub-menu">
            <a href="<?php echo e(url('users')); ?>">
                <img src="<?php echo e(url('/image/user.png')); ?>" alt="">
                <span>Users</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('users')); ?>">Danh sách Users</a>
                </li>
                <li>
                    <a href="<?php echo e(url('users/noti')); ?>">Push notification all</a>
                </li>
                <li>
                    <a href="<?php echo e(url('users/point/video')); ?>">Point view video</a>
                </li>
            </ul>
        </li>
        
        <li class="sub-menu">
            <a href="<?php echo e(url('coupons')); ?>">
                <img src="<?php echo e(url('/image/coupon.png')); ?>" alt="">
                <span>Coupons</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('coupons')); ?>">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="<?php echo e(url('coupons/used')); ?>">Coupons đã dùng</a>
                </li>
                <li>
                    <a href="<?php echo e(url('coupons/cate')); ?>">Danh mục</a>
                </li>
                <li>
                    <a href="<?php echo e(url('coupons/point')); ?>">Point</a>
                </li>
                <li>
                    <a href="<?php echo e(url('coupons/getRadius')); ?>">Bán kính</a>
                </li>
            </ul>
        </li>
        
        <li class="sub-menu">
            <a href="<?php echo e(url('campaign')); ?>">
                <img src="<?php echo e(url('')); ?>" alt="">
                <span>Tracking</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('campaign')); ?>">List Campaign</a>
                </li>
                <li>
                    <a href="<?php echo e(url('tracking')); ?>">List Users Tracking Data</a>
                </li>
                <li>
                    <a href="<?php echo e(url('users-play')); ?>">Users Play</a>
                </li>
            </ul>
        </li>
        
        <li class="sub-menu">
            <a href="<?php echo e(url('ads')); ?>">
                <img src="<?php echo e(url('/image/digital-campaign.png')); ?>" alt="">
                <span>Ads</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('ads')); ?>">Manage Ads</a>
                </li>
                <li>
                    <a href="<?php echo e(url('banner')); ?>">Manage Banner</a>
                </li>
                <li>
                    <a href="<?php echo e(url('video')); ?>">Manage Video</a>
                </li>
                <li>
                    <a href="<?php echo e(url('ads/transports')); ?>">List Post Ads Transports</a>
                </li>
                <li>
                    <a href="<?php echo e(url('ads/landhouses')); ?>">List Post Ads Land House</a>
                </li>
                <li>
                    <a href="<?php echo e(url('ads/recruitments')); ?>">List Post Ads Recruiments</a>
                </li>
                <li>
                    <a href="<?php echo e(url('ads/nails')); ?>">List Post Ads Nails</a>
                </li>
                <li>
                    <a href="<?php echo e(url('ads/shops')); ?>">List Post Ads Shops</a>
                </li>
                <li>
                    <a href="<?php echo e(url('ads/tours')); ?>">List Post Ads Tours</a>
                </li>
                <li>
                    <a href="<?php echo e(url('ads/getRadius')); ?>">Bán kính</a>
                </li>
            </ul>
        </li>
        
        <li class="sub-menu">
            <a href="<?php echo e(url('transports')); ?>">
                <img src="<?php echo e(url('/image/car.png')); ?>" alt="">
                <span>Transports</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('transports')); ?>">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="<?php echo e(url('transports/list-report')); ?>">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="<?php echo e(url('transports/cate')); ?>">Danh mục</a>
                </li>
                <li>
                    <a href="<?php echo e(url('transports/type')); ?>">Loại hình</a>
                </li>
                <li>
                    <a href="<?php echo e(url('transports/vehicle')); ?>">Dòng xe & Hãng xe</a>
                </li>
                <li>
                    <a href="<?php echo e(url('transports/getRadius')); ?>">Bán kính</a>
                </li>
                <li>
                    <a href="<?php echo e(url('transports/report')); ?>">Report</a>
                </li>
            </ul>
        </li>
        
        <li class="sub-menu">
            <a href="<?php echo e(url('landhouses')); ?>">
                <img src="<?php echo e(url('/image/warehouse.png')); ?>" alt="">
                <span>Land House</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('landhouses')); ?>">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="<?php echo e(url('landhouses/list-report')); ?>">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="<?php echo e(url('landhouses/cate')); ?>">Danh mục</a>
                </li>
                <li>
                    <a href="<?php echo e(url('landhouses/type')); ?>">Loại hình</a>
                </li>
                <li>
                    <a href="<?php echo e(url('landhouses/getRadius')); ?>">Bán kính</a>
                </li>
                <li>
                    <a href="<?php echo e(url('landhouses/report')); ?>">Report</a>
                </li>
            </ul>
        </li>
        
        <li class="sub-menu">
            <a href="<?php echo e(url('recruiments')); ?>">
                <img src="<?php echo e(url('/image/research.png')); ?>" alt="">
                <span>Recruiments</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('recruitments')); ?>">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="<?php echo e(url('recruitments/list-report')); ?>">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="<?php echo e(url('recruitments/cate')); ?>">Danh mục</a>
                </li>
                <li>
                    <a href="<?php echo e(url('recruitments/type')); ?>">Loại hình</a>
                </li>
                <li>
                    <a href="<?php echo e(url('recruitments/getRadius')); ?>">Bán kính</a>
                </li>
                <li>
                    <a href="<?php echo e(url('recruitments/report')); ?>">Report</a>
                </li>
            </ul>
        </li>
        
        <li class="sub-menu">
            <a href="<?php echo e(url('nails')); ?>">
                <img src="<?php echo e(url('/image/nail.png')); ?>" alt="">
                <span>Nails</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('nails')); ?>">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="<?php echo e(url('nails/list-report')); ?>">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="<?php echo e(url('nails/cate')); ?>">Danh mục</a>
                </li>
                <li>
                    <a href="<?php echo e(url('nails/type')); ?>">Loại hình</a>
                </li>
                <li>
                    <a href="<?php echo e(url('nails/getRadius')); ?>">Bán kính</a>
                </li>
                <li>
                    <a href="<?php echo e(url('nails/report')); ?>">Report</a>
                </li>
            </ul>
        </li>
        
        <li class="sub-menu">
            <a href="<?php echo e(url('tours')); ?>">
                <img src="<?php echo e(url('/image/pins.png')); ?>" alt="">
                <span>Tours</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('tours')); ?>">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="<?php echo e(url('tours/list-report')); ?>">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="<?php echo e(url('tours/cate')); ?>">Danh mục</a>
                </li>
                <li>
                    <a href="<?php echo e(url('tours/type')); ?>">Loại hình</a>
                </li>
                <li>
                    <a href="<?php echo e(url('tours/getRadius')); ?>">Bán kính</a>
                </li>
                <li>
                    <a href="<?php echo e(url('tours/report')); ?>">Report</a>
                </li>
            </ul>
        </li>
        
        <li class="sub-menu">
            <a href="<?php echo e(url('shops')); ?>">
                <img src="<?php echo e(url('/image/shopping-cart.png')); ?>" alt="">
                <span>Shops</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('shops')); ?>">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="<?php echo e(url('shops/list-report')); ?>">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="<?php echo e(url('shops/cate')); ?>">Danh mục</a>
                </li>
                <li>
                    <a href="<?php echo e(url('shops/type')); ?>">Loại hình</a>
                </li>
                <li>
                    <a href="<?php echo e(url('shops/getRadius')); ?>">Bán kính</a>
                </li>
                <li>
                    <a href="<?php echo e(url('shops/report')); ?>">Report</a>
                </li>
            </ul>
        </li>
        
        <li class="sub-menu">
            <a href="<?php echo e(url('promotions')); ?>">
                <img src="<?php echo e(url('/image/promotion.png')); ?>" alt="">
                <span>Promotions</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('promotions')); ?>">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="<?php echo e(url('promotions/list-report')); ?>">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="<?php echo e(url('promotions/cate')); ?>">Danh mục</a>
                </li>
                <li>
                    <a href="<?php echo e(url('promotions/type')); ?>">Loại hình</a>
                </li>
                <li>
                    <a href="<?php echo e(url('promotions/getRadius')); ?>">Bán kính</a>
                </li>
                <li>
                    <a href="<?php echo e(url('promotions/report')); ?>">Report</a>
                </li>
            </ul>
        </li>
        
        <li class="sub-menu">
            <a href="<?php echo e(url('app-info')); ?>">
                <img src="<?php echo e(url('')); ?>" alt="">
                <span>App Information</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('app-info')); ?>">App Information</a>
                </li>
            </ul>
        </li>
        <?php break; ?> 

    <?php case (1): ?>
    
        <li class="sub-menu">
            <a href="<?php echo e(url('users')); ?>">
                <img src="<?php echo e(url('/image/user.png')); ?>" alt="">
                <span>Users</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('users')); ?>">Danh sách Users</a>
                </li>
                <li>
                    <a href="<?php echo e(url('users/noti')); ?>">Push notification all</a>
                </li>
                <li>
                    <a href="<?php echo e(url('users/point/video')); ?>">Point view video</a>
                </li>
            </ul>
        </li>
        <?php break; ?> 
    <?php case (2): ?>
    
        <li class="sub-menu">
            <a href="<?php echo e(url('ads')); ?>">
                <img src="<?php echo e(url('/image/digital-campaign.png')); ?>" alt="">
                <span>Ads</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('ads')); ?>">Manage Ads</a>
                </li>
                <li>
                    <a href="<?php echo e(url('ads/transports')); ?>">List Post Ads Transports</a>
                </li>
                <li>
                    <a href="<?php echo e(url('ads/landhouses')); ?>">List Post Ads Land House</a>
                </li>
                <li>
                    <a href="<?php echo e(url('ads/recruitments')); ?>">List Post Ads Recruiments</a>
                </li>
                <li>
                    <a href="<?php echo e(url('ads/nails')); ?>">List Post Ads Nails</a>
                </li>
                <li>
                    <a href="<?php echo e(url('ads/shops')); ?>">List Post Ads Shops</a>
                </li>
                <li>
                    <a href="<?php echo e(url('ads/tours')); ?>">List Post Ads Tours</a>
                </li>
                <li>
                    <a href="<?php echo e(url('ads/getRadius')); ?>">Bán kính</a>
                </li>
            </ul>
        </li>
        <?php break; ?> 
    <?php case (3): ?>
    
        <li class="sub-menu">
            <a href="<?php echo e(url('transports')); ?>">
                <img src="<?php echo e(url('/image/car.png')); ?>" alt="">
                <span>Transports</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('transports')); ?>">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="<?php echo e(url('transports/list-report')); ?>">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="<?php echo e(url('transports/cate')); ?>">Danh mục</a>
                </li>
                <li>
                    <a href="<?php echo e(url('transports/type')); ?>">Loại hình</a>
                </li>
                <li>
                    <a href="<?php echo e(url('transports/vehicle')); ?>">Dòng xe & Hãng xe</a>
                </li>
                <li>
                    <a href="<?php echo e(url('transports/getRadius')); ?>">Bán kính</a>
                </li>
                <li>
                    <a href="<?php echo e(url('transports/report')); ?>">Report</a>
                </li>
            </ul>
        </li>
        <?php break; ?> 
    <?php case (4): ?> Manage Chat 
        <?php break; ?> 
    <?php case (5): ?> Manage Notification 
        <?php break; ?> 
    <?php case (6): ?>
    
        <li class="sub-menu">
            <a href="<?php echo e(url('landhouses')); ?>">
                <img src="<?php echo e(url('/image/warehouse.png')); ?>" alt="">
                <span>Land House</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('landhouses')); ?>">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="<?php echo e(url('landhouses/list-report')); ?>">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="<?php echo e(url('landhouses/cate')); ?>">Danh mục</a>
                </li>
                <li>
                    <a href="<?php echo e(url('landhouses/type')); ?>">Loại hình</a>
                </li>
                <li>
                    <a href="<?php echo e(url('landhouses/getRadius')); ?>">Bán kính</a>
                </li>
                <li>
                    <a href="<?php echo e(url('landhouses/report')); ?>">Report</a>
                </li>
            </ul>
        </li>
        <?php break; ?> 
    <?php case (7): ?>
    
        <li class="sub-menu">
            <a href="<?php echo e(url('recruiments')); ?>">
                <img src="<?php echo e(url('/image/research.png')); ?>" alt="">
                <span>Recruiments</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('recruitments')); ?>">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="<?php echo e(url('recruitments/list-report')); ?>">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="<?php echo e(url('recruitments/cate')); ?>">Danh mục</a>
                </li>
                <li>
                    <a href="<?php echo e(url('recruitments/type')); ?>">Loại hình</a>
                </li>
                <li>
                    <a href="<?php echo e(url('recruitments/getRadius')); ?>">Bán kính</a>
                </li>
                <li>
                    <a href="<?php echo e(url('recruitments/report')); ?>">Report</a>
                </li>
            </ul>
        </li>
        <?php break; ?> 
    <?php case (8): ?>
    
        <li class="sub-menu">
            <a href="<?php echo e(url('nails')); ?>">
                <img src="<?php echo e(url('/image/nail.png')); ?>" alt="">
                <span>Nails</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('nails')); ?>">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="<?php echo e(url('nails/list-report')); ?>">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="<?php echo e(url('nails/cate')); ?>">Danh mục</a>
                </li>
                <li>
                    <a href="<?php echo e(url('nails/type')); ?>">Loại hình</a>
                </li>
                <li>
                    <a href="<?php echo e(url('nails/getRadius')); ?>">Bán kính</a>
                </li>
                <li>
                    <a href="<?php echo e(url('nails/report')); ?>">Report</a>
                </li>
            </ul>
        </li>
        <?php break; ?> 
    <?php case (9): ?>
    
        <li class="sub-menu">
            <a href="<?php echo e(url('tours')); ?>">
                <img src="<?php echo e(url('/image/pins.png')); ?>" alt="">
                <span>Tours</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('tours')); ?>">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="<?php echo e(url('tours/list-report')); ?>">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="<?php echo e(url('tours/cate')); ?>">Danh mục</a>
                </li>
                <li>
                    <a href="<?php echo e(url('tours/type')); ?>">Loại hình</a>
                </li>
                <li>
                    <a href="<?php echo e(url('tours/getRadius')); ?>">Bán kính</a>
                </li>
                <li>
                    <a href="<?php echo e(url('tours/report')); ?>">Report</a>
                </li>
            </ul>
        </li>
        <?php break; ?> 
    <?php case (10): ?>
    
        <li class="sub-menu">
            <a href="<?php echo e(url('shops')); ?>">
                <i class="fa fa-store"></i>
                <span>Shops</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('shops')); ?>">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="<?php echo e(url('shops/list-report')); ?>">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="<?php echo e(url('shops/cate')); ?>">Danh mục</a>
                </li>
                <li>
                    <a href="<?php echo e(url('shops/type')); ?>">Loại hình</a>
                </li>
                <li>
                    <a href="<?php echo e(url('shops/getRadius')); ?>">Bán kính</a>
                </li>
                <li>
                    <a href="<?php echo e(url('shops/report')); ?>">Report</a>
                </li>
            </ul>
        </li>
        <?php break; ?> 
    <?php case (11): ?>
    
        <li class="sub-menu">
            <a href="<?php echo e(url('coupons')); ?>">
                <img src="<?php echo e(url('/image/coupon.png')); ?>" alt="">
                <span>Coupons</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('coupons')); ?>">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="<?php echo e(url('coupons/used')); ?>">Coupons đã dùng</a>
                </li>
                <li>
                    <a href="<?php echo e(url('coupons/cate')); ?>">Danh mục</a>
                </li>
                <li>
                    <a href="<?php echo e(url('coupons/point')); ?>">Point</a>
                </li>
                <li>
                    <a href="<?php echo e(url('coupons/getRadius')); ?>">Bán kính</a>
                </li>
            </ul>
        </li>
        <?php break; ?> 
    <?php case (12): ?>
    
        <li class="sub-menu">
            <a href="<?php echo e(url('promotions')); ?>">
                <img src="<?php echo e(url('/image/promotion.png')); ?>" alt="">
                <span>Promotions</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="<?php echo e(url('promotions')); ?>">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="<?php echo e(url('promotions/list-report')); ?>">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="<?php echo e(url('promotions/cate')); ?>">Danh mục</a>
                </li>
                <li>
                    <a href="<?php echo e(url('promotions/type')); ?>">Loại hình</a>
                </li>
                <li>
                    <a href="<?php echo e(url('promotions/getRadius')); ?>">Bán kính</a>
                </li>
                <li>
                    <a href="<?php echo e(url('promotions/report')); ?>">Report</a>
                </li>
            </ul>
        </li>
        <?php break; ?> 
    <?php default: ?> 
<?php endswitch; ?><?php /**PATH C:\xampp\htdocs\Hune_Admin\resources\views/menus/menu.blade.php ENDPATH**/ ?>