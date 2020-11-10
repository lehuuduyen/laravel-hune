<li class="mt">
    <a href="">
        <img src="{{ url('/image/home.png') }}" alt="">
        <span>Dashboard</span>
    </a>
</li>
@if(Session::has('key_login')) 
    @if (Session::get('key_login')->level == 0)
        <li class="sub-menu">
            <a href="{{ url('admins') }}">
                <img src="{{ url('/image/admin.png') }}" alt="">
                <span>Admins</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('admins') }}">Danh sách Admins</a>
                </li>
            </ul>
        </li>
    @endif 
@endif 
@switch(Session::get('key_login')->level) 
    @case(0) 
        {{-- Users --}}
        <li class="sub-menu">
            <a href="{{ url('users') }}">
                <img src="{{ url('/image/user.png') }}" alt="">
                <span>Users</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('users') }}">Danh sách Users</a>
                </li>
                <li>
                    <a href="{{ url('users/noti') }}">Push notification all</a>
                </li>
                <li>
                    <a href="{{ url('users/point/video') }}">Point view video</a>
                </li>
            </ul>
        </li>
        {{-- Coupons --}}
        <li class="sub-menu">
            <a href="{{ url('coupons') }}">
                <img src="{{ url('/image/coupon.png') }}" alt="">
                <span>Coupons</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('coupons') }}">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="{{ url('coupons/used') }}">Coupons đã dùng</a>
                </li>
                <li>
                    <a href="{{ url('coupons/cate') }}">Danh mục</a>
                </li>
                <li>
                    <a href="{{ url('coupons/point') }}">Point</a>
                </li>
                <li>
                    <a href="{{ url('coupons/getRadius') }}">Bán kính</a>
                </li>
            </ul>
        </li>
        {{-- Tracking --}}
        <li class="sub-menu">
            <a href="{{ url('campaign') }}">
                <img src="{{ url('') }}" alt="">
                <span>Tracking</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('campaign') }}">List Campaign</a>
                </li>
                <li>
                    <a href="{{ url('tracking') }}">List Users Tracking Data</a>
                </li>
                <li>
                    <a href="{{ url('users-play') }}">Users Play</a>
                </li>
            </ul>
        </li>
        {{-- Ads --}}
        <li class="sub-menu">
            <a href="{{ url('ads') }}">
                <img src="{{ url('/image/digital-campaign.png') }}" alt="">
                <span>Ads</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('ads') }}">Manage Ads</a>
                </li>
                <li>
                    <a href="{{ url('banner') }}">Manage Banner</a>
                </li>
                <li>
                    <a href="{{ url('video') }}">Manage Video</a>
                </li>
                <li>
                    <a href="{{ url('ads/transports') }}">List Post Ads Transports</a>
                </li>
                <li>
                    <a href="{{ url('ads/landhouses') }}">List Post Ads Land House</a>
                </li>
                <li>
                    <a href="{{ url('ads/recruitments') }}">List Post Ads Recruiments</a>
                </li>
                <li>
                    <a href="{{ url('ads/nails') }}">List Post Ads Nails</a>
                </li>
                <li>
                    <a href="{{ url('ads/shops') }}">List Post Ads Shops</a>
                </li>
                <li>
                    <a href="{{ url('ads/tours') }}">List Post Ads Tours</a>
                </li>
                <li>
                    <a href="{{ url('ads/getRadius') }}">Bán kính</a>
                </li>
            </ul>
        </li>
        {{-- Transports --}}
        <li class="sub-menu">
            <a href="{{ url('transports') }}">
                <img src="{{ url('/image/car.png') }}" alt="">
                <span>Transports</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('transports') }}">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="{{ url('transports/list-report') }}">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="{{ url('transports/cate') }}">Danh mục</a>
                </li>
                <li>
                    <a href="{{ url('transports/type') }}">Loại hình</a>
                </li>
                <li>
                    <a href="{{ url('transports/vehicle') }}">Dòng xe & Hãng xe</a>
                </li>
                <li>
                    <a href="{{ url('transports/getRadius') }}">Bán kính</a>
                </li>
                <li>
                    <a href="{{ url('transports/report') }}">Report</a>
                </li>
            </ul>
        </li>
        {{-- Land House --}}
        <li class="sub-menu">
            <a href="{{ url('landhouses') }}">
                <img src="{{ url('/image/warehouse.png') }}" alt="">
                <span>Land House</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('landhouses') }}">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="{{ url('landhouses/list-report') }}">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="{{ url('landhouses/cate') }}">Danh mục</a>
                </li>
                <li>
                    <a href="{{ url('landhouses/type') }}">Loại hình</a>
                </li>
                <li>
                    <a href="{{ url('landhouses/getRadius') }}">Bán kính</a>
                </li>
                <li>
                    <a href="{{ url('landhouses/report') }}">Report</a>
                </li>
            </ul>
        </li>
        {{-- Recruiments --}}
        <li class="sub-menu">
            <a href="{{ url('recruiments') }}">
                <img src="{{ url('/image/research.png') }}" alt="">
                <span>Recruiments</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('recruitments') }}">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="{{ url('recruitments/list-report') }}">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="{{ url('recruitments/cate') }}">Danh mục</a>
                </li>
                <li>
                    <a href="{{ url('recruitments/type') }}">Loại hình</a>
                </li>
                <li>
                    <a href="{{ url('recruitments/getRadius') }}">Bán kính</a>
                </li>
                <li>
                    <a href="{{ url('recruitments/report') }}">Report</a>
                </li>
            </ul>
        </li>
        {{-- Nails --}}
        <li class="sub-menu">
            <a href="{{ url('nails') }}">
                <img src="{{ url('/image/nail.png') }}" alt="">
                <span>Nails</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('nails') }}">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="{{ url('nails/list-report') }}">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="{{ url('nails/cate') }}">Danh mục</a>
                </li>
                <li>
                    <a href="{{ url('nails/type') }}">Loại hình</a>
                </li>
                <li>
                    <a href="{{ url('nails/getRadius') }}">Bán kính</a>
                </li>
                <li>
                    <a href="{{ url('nails/report') }}">Report</a>
                </li>
            </ul>
        </li>
        {{-- Tours --}}
        <li class="sub-menu">
            <a href="{{ url('tours') }}">
                <img src="{{ url('/image/pins.png') }}" alt="">
                <span>Tours</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('tours') }}">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="{{ url('tours/list-report') }}">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="{{ url('tours/cate') }}">Danh mục</a>
                </li>
                <li>
                    <a href="{{ url('tours/type') }}">Loại hình</a>
                </li>
                <li>
                    <a href="{{ url('tours/getRadius') }}">Bán kính</a>
                </li>
                <li>
                    <a href="{{ url('tours/report') }}">Report</a>
                </li>
            </ul>
        </li>
        {{-- Shops --}}
        <li class="sub-menu">
            <a href="{{ url('shops') }}">
                <img src="{{ url('/image/shopping-cart.png') }}" alt="">
                <span>Shops</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('shops') }}">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="{{ url('shops/list-report') }}">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="{{ url('shops/cate') }}">Danh mục</a>
                </li>
                <li>
                    <a href="{{ url('shops/type') }}">Loại hình</a>
                </li>
                <li>
                    <a href="{{ url('shops/getRadius') }}">Bán kính</a>
                </li>
                <li>
                    <a href="{{ url('shops/report') }}">Report</a>
                </li>
            </ul>
        </li>
        {{-- Promotions --}}
        <li class="sub-menu">
            <a href="{{ url('promotions') }}">
                <img src="{{ url('/image/promotion.png') }}" alt="">
                <span>Promotions</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('promotions') }}">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="{{ url('promotions/list-report') }}">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="{{ url('promotions/cate') }}">Danh mục</a>
                </li>
                <li>
                    <a href="{{ url('promotions/type') }}">Loại hình</a>
                </li>
                <li>
                    <a href="{{ url('promotions/getRadius') }}">Bán kính</a>
                </li>
                <li>
                    <a href="{{ url('promotions/report') }}">Report</a>
                </li>
            </ul>
        </li>
        {{-- App Info --}}
        <li class="sub-menu">
            <a href="{{ url('app-info') }}">
                <img src="{{ url('') }}" alt="">
                <span>App Information</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('app-info') }}">App Information</a>
                </li>
            </ul>
        </li>
        @break 
{{-- ---------------------------------------------------------------------------------------- --}}
    @case(1)
    {{-- Users --}}
        <li class="sub-menu">
            <a href="{{ url('users') }}">
                <img src="{{ url('/image/user.png') }}" alt="">
                <span>Users</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('users') }}">Danh sách Users</a>
                </li>
                <li>
                    <a href="{{ url('users/noti') }}">Push notification all</a>
                </li>
                <li>
                    <a href="{{ url('users/point/video') }}">Point view video</a>
                </li>
            </ul>
        </li>
        @break 
    @case(2)
    {{-- Ads --}}
        <li class="sub-menu">
            <a href="{{ url('ads') }}">
                <img src="{{ url('/image/digital-campaign.png') }}" alt="">
                <span>Ads</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('ads') }}">Manage Ads</a>
                </li>
                <li>
                    <a href="{{ url('ads/transports') }}">List Post Ads Transports</a>
                </li>
                <li>
                    <a href="{{ url('ads/landhouses') }}">List Post Ads Land House</a>
                </li>
                <li>
                    <a href="{{ url('ads/recruitments') }}">List Post Ads Recruiments</a>
                </li>
                <li>
                    <a href="{{ url('ads/nails') }}">List Post Ads Nails</a>
                </li>
                <li>
                    <a href="{{ url('ads/shops') }}">List Post Ads Shops</a>
                </li>
                <li>
                    <a href="{{ url('ads/tours') }}">List Post Ads Tours</a>
                </li>
                <li>
                    <a href="{{ url('ads/getRadius') }}">Bán kính</a>
                </li>
            </ul>
        </li>
        @break 
    @case(3)
    {{-- Transports --}}
        <li class="sub-menu">
            <a href="{{ url('transports') }}">
                <img src="{{ url('/image/car.png') }}" alt="">
                <span>Transports</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('transports') }}">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="{{ url('transports/list-report') }}">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="{{ url('transports/cate') }}">Danh mục</a>
                </li>
                <li>
                    <a href="{{ url('transports/type') }}">Loại hình</a>
                </li>
                <li>
                    <a href="{{ url('transports/vehicle') }}">Dòng xe & Hãng xe</a>
                </li>
                <li>
                    <a href="{{ url('transports/getRadius') }}">Bán kính</a>
                </li>
                <li>
                    <a href="{{ url('transports/report') }}">Report</a>
                </li>
            </ul>
        </li>
        @break 
    @case(4) Manage Chat 
        @break 
    @case(5) Manage Notification 
        @break 
    @case(6)
    {{-- Land House --}}
        <li class="sub-menu">
            <a href="{{ url('landhouses') }}">
                <img src="{{ url('/image/warehouse.png') }}" alt="">
                <span>Land House</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('landhouses') }}">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="{{ url('landhouses/list-report') }}">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="{{ url('landhouses/cate') }}">Danh mục</a>
                </li>
                <li>
                    <a href="{{ url('landhouses/type') }}">Loại hình</a>
                </li>
                <li>
                    <a href="{{ url('landhouses/getRadius') }}">Bán kính</a>
                </li>
                <li>
                    <a href="{{ url('landhouses/report') }}">Report</a>
                </li>
            </ul>
        </li>
        @break 
    @case(7)
    {{-- Recruiments --}}
        <li class="sub-menu">
            <a href="{{ url('recruiments') }}">
                <img src="{{ url('/image/research.png') }}" alt="">
                <span>Recruiments</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('recruitments') }}">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="{{ url('recruitments/list-report') }}">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="{{ url('recruitments/cate') }}">Danh mục</a>
                </li>
                <li>
                    <a href="{{ url('recruitments/type') }}">Loại hình</a>
                </li>
                <li>
                    <a href="{{ url('recruitments/getRadius') }}">Bán kính</a>
                </li>
                <li>
                    <a href="{{ url('recruitments/report') }}">Report</a>
                </li>
            </ul>
        </li>
        @break 
    @case(8)
    {{-- Nails --}}
        <li class="sub-menu">
            <a href="{{ url('nails') }}">
                <img src="{{ url('/image/nail.png') }}" alt="">
                <span>Nails</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('nails') }}">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="{{ url('nails/list-report') }}">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="{{ url('nails/cate') }}">Danh mục</a>
                </li>
                <li>
                    <a href="{{ url('nails/type') }}">Loại hình</a>
                </li>
                <li>
                    <a href="{{ url('nails/getRadius') }}">Bán kính</a>
                </li>
                <li>
                    <a href="{{ url('nails/report') }}">Report</a>
                </li>
            </ul>
        </li>
        @break 
    @case(9)
    {{-- Tours --}}
        <li class="sub-menu">
            <a href="{{ url('tours') }}">
                <img src="{{ url('/image/pins.png') }}" alt="">
                <span>Tours</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('tours') }}">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="{{ url('tours/list-report') }}">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="{{ url('tours/cate') }}">Danh mục</a>
                </li>
                <li>
                    <a href="{{ url('tours/type') }}">Loại hình</a>
                </li>
                <li>
                    <a href="{{ url('tours/getRadius') }}">Bán kính</a>
                </li>
                <li>
                    <a href="{{ url('tours/report') }}">Report</a>
                </li>
            </ul>
        </li>
        @break 
    @case(10)
    {{-- Shops --}}
        <li class="sub-menu">
            <a href="{{ url('shops') }}">
                <i class="fa fa-store"></i>
                <span>Shops</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('shops') }}">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="{{ url('shops/list-report') }}">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="{{ url('shops/cate') }}">Danh mục</a>
                </li>
                <li>
                    <a href="{{ url('shops/type') }}">Loại hình</a>
                </li>
                <li>
                    <a href="{{ url('shops/getRadius') }}">Bán kính</a>
                </li>
                <li>
                    <a href="{{ url('shops/report') }}">Report</a>
                </li>
            </ul>
        </li>
        @break 
    @case(11)
    {{-- Coupons --}}
        <li class="sub-menu">
            <a href="{{ url('coupons') }}">
                <img src="{{ url('/image/coupon.png') }}" alt="">
                <span>Coupons</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('coupons') }}">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="{{ url('coupons/used') }}">Coupons đã dùng</a>
                </li>
                <li>
                    <a href="{{ url('coupons/cate') }}">Danh mục</a>
                </li>
                <li>
                    <a href="{{ url('coupons/point') }}">Point</a>
                </li>
                <li>
                    <a href="{{ url('coupons/getRadius') }}">Bán kính</a>
                </li>
            </ul>
        </li>
        @break 
    @case(12)
    {{-- Promotions --}}
        <li class="sub-menu">
            <a href="{{ url('promotions') }}">
                <img src="{{ url('/image/promotion.png') }}" alt="">
                <span>Promotions</span>
            </a>
            <ul class="sub">
                <li>
                    <a href="{{ url('promotions') }}">Danh sách bài đăng</a>
                </li>
                <li>
                    <a href="{{ url('promotions/list-report') }}">Danh sách bài đăng bị Report</a>
                </li>
                <li>
                    <a href="{{ url('promotions/cate') }}">Danh mục</a>
                </li>
                <li>
                    <a href="{{ url('promotions/type') }}">Loại hình</a>
                </li>
                <li>
                    <a href="{{ url('promotions/getRadius') }}">Bán kính</a>
                </li>
                <li>
                    <a href="{{ url('promotions/report') }}">Report</a>
                </li>
            </ul>
        </li>
        @break 
    @default 
@endswitch