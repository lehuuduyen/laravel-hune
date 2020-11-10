<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request) {
        $cates = DB::connection('sqlsrvUser')->table('category')
            ->where('active', '=', 1)
            ->orderBy('date_created', 'desc')
            ->get();

        $coupons = DB::connection('sqlsrvUser')->table('coupon')
            ->select(['coupon.id as id', 'coupon.image as image', 'coupon.code as code', 'coupon.title as title', 'coupon.date_start as date_start', 'coupon.date_end as date_end', 'coupon.point as point', 'coupon.amount as amount', 'category.name as cate', 'coupon.date_created as date_created', 'coupon.status as status', 'coupon.url as url'])
            ->leftJoin('category', 'category.id', '=', 'coupon.cate_id')
            ->orderBy('coupon.date_created', 'desc')
            ->get();

        return view('coupons.index', compact('coupons', 'cates'));
    }

    public function getUsed(Request $request) {
        $cates = DB::connection('sqlsrvUser')->table('category')
            ->where('active', '=', 1)
            ->orderBy('date_created', 'desc')
            ->get();

        $coupons = DB::connection('sqlsrvUser')->table('users_transaction_coupon')
            ->select(DB::connection('sqlsrvUser')->raw('count(users_transaction_coupon.coupon_id) as count_coupon, coupon.id as id, coupon.image as image, coupon.code as code, coupon.title as title, coupon.date_start as date_start, coupon.date_end as date_end, coupon.point as point, coupon.amount as amount, category.name as cate, coupon.date_created as date_created, coupon.status as status'))
            ->join('coupon', 'coupon.id', '=', 'users_transaction_coupon.coupon_id')
            ->join('category', 'category.id', '=', 'coupon.cate_id')
            ->orderBy('coupon.date_created', 'desc')
            ->distinct()
            ->groupBy('coupon.id', 'coupon.image', 'coupon.code', 'coupon.title', 'coupon.date_start', 'coupon.date_end', 'coupon.point', 'coupon.amount', 'category.name', 'coupon.date_created', 'coupon.status')
            ->get();

        return view('coupons.getUsed', compact('coupons', 'cates'));
    }

    public function getRadius(Request $request) {
        $query = DB::connection('sqlsrvAds')->table('radius')
            ->select(['id', 'radius'])
            ->get();

        return view('transports.CRUD.radius', compact('query'));
    }

    public function updateRadius(Request $request) {
        $radius = $request->get('radius');
        
        $query = DB::connection('sqlsrvAds')->table('radius')
            ->update(['radius' => $radius]);
    }

    public function activeCoupon(Request $request) {
        $id = $request->get('id');
        $image = $request->get('image');
        $title = $request->get('title');
        $desc = $request->get('desc');
        $address = $request->get('address');
        $policy = $request->get('policy');
        $shopname = $request->get('shopname');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $date_start = $request->get('date_start');
        $date_end = $request->get('date_end');
        $point = $request->get('point');
        $amount = $request->get('amount');
        $cate = $request->get('cate');
        $date_created = $request->get('date_created');
        $url = $request->get('url');
        $status = $request->get('status');
        $option = $request->get('option');

        $seed = str_split('abcdefghijklmnopqrstuvwxyz'
            .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            .'0123456789'); // and any other characters
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $code = '';
        foreach (array_rand($seed, 6) as $k) $code .= $seed[$k];

        // add new coupon
        if ($option == 1) {
            $query = DB::connection('sqlsrvUser')
                ->insert('insert into coupon (title, image, date_start, date_end, point, status, date_created, url, description, address, amount, cate_id, policy, shopname, phone, email, code) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$title, $image, $date_start, $date_end, $point, $status, $date_created, $url, $desc, $address, $amount, $cate, $policy, $shopname, $phone, $email, $code]);
            return $query;
        }

        // show old value coupon
        if ($option == 2) {
            $query = DB::connection('sqlsrvUser')->table('coupon')
                ->select(['id' ,'title', 'image', 'date_start', 'date_end', 'point', 'status', 'date_created', 'url', 'description', 'address', 'amount', 'cate_id', 'policy', 'shopname', 'phone', 'email'])
                ->where('id', '=', $id)
                ->first();
            return response()->json($query);
        }

        // update coupon
        if ($option == 3) {
            $query = DB::connection('sqlsrvUser')->table('coupon')
                ->where('id', $id)
                ->update(['title' => $title, 'image' => $image, 'date_start' => $date_start, 'date_end' => $date_end, 'point' => $point, 'status' => $status, 'date_created' => $date_created, 'url' => $url, 'description' => $desc, 'address' => $address, 'amount' => $amount, 'cate_id' => $cate, 'policy' => $policy, 'shopname' => $shopname, 'phone' => $phone, 'email' => $email]);
            
            return $query;
        }

        // delete coupon
        if ($option == 4) {
            $query = DB::connection('sqlsrvUser')->table('coupon')->where('id', '=', $id)->delete();

            return $query;
        }

    }

    public function getCate(Request $request) {
        $cates = DB::connection('sqlsrvUser')->table('category')
            ->select(['id', 'name', 'date_created', 'active'])
            ->orderBy('date_created', 'desc')
            ->paginate(50);

        return view('coupons.cate', compact('cates'));
    }

    public function activeCate(Request $request) {
        $id = $request->get('id');
        $name = $request->get('name');
        $date = $request->get('date');
        $status = $request->get('status');
        $option = $request->get('option');

        // add new cate
        if ($option == 1) {
            $query = DB::connection('sqlsrvUser')
                ->insert('insert into category (name, date_created, active) values (?, ?, ?)', [$name, $date, $status]);
            return $query;
        }

        // show old value cate
        if ($option == 2) {
            $query = DB::connection('sqlsrvUser')->table('category')
                ->select(['id', 'name', 'date_created', 'active'])
                ->where('id', '=', $id)
                ->first();
            return response()->json($query);
        }

        // update cate
        if ($option == 3) {
            $query = DB::connection('sqlsrvUser')->table('category')
                ->where('id', $id)
                ->update(['name' => $name, 'date_created' => $date, 'active' => $status]);
            
            return $query;
        }

        // delete cate
        if ($option == 4) {
            $query = DB::connection('sqlsrvUser')->table('category')->where('id', '=', $id)->delete();

            return $query;
        }

    }

    public function getPoint(Request $request) {
        $points = DB::connection('sqlsrvUser')->table('users_config_point')
            ->select(['id', 'num_day', 'point', 'from_logic', 'date_created', 'active'])
            ->orderBy('date_created', 'desc')
            ->paginate(50);

        return view('coupons.point', compact('points'));
    }

    public function activePoint(Request $request) {
        $id = $request->get('id');
        $num_day = $request->get('num_day');
        $point = $request->get('point');
        $from_logic = $request->get('from_logic');
        $date = $request->get('date');
        $status = $request->get('status');
        $option = $request->get('option');

        // add new cate
        if ($option == 1) {
            $query = DB::connection('sqlsrvUser')
                ->insert('insert into users_config_point (num_day, point, from_logic, date_created, active) values (?, ?, ?, ?, ?)', [$num_day, $point, $from_logic, $date, $status]);
            return $query;
        }

        // show old value cate
        if ($option == 2) {
            $query = DB::connection('sqlsrvUser')->table('users_config_point')
                ->select(['id', 'num_day', 'point', 'from_logic', 'date_created', 'active'])
                ->where('id', '=', $id)
                ->first();
            return response()->json($query);
        }

        // update cate
        if ($option == 3) {
            $query = DB::connection('sqlsrvUser')->table('users_config_point')
                ->where('id', $id)
                ->update(['num_day' => $num_day, 'point' => $point, 'from_logic' => $from_logic, 'date_created' => $date, 'active' => $status]);
            
            return $query;
        }

        // delete cate
        if ($option == 4) {
            $query = DB::connection('sqlsrvUser')->table('users_config_point')->where('id', '=', $id)->delete();

            return $query;
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RealEstate  $realEstate
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = DB::connection('sqlsrvUser')
            ->table('coupon')
            ->where('id', $id)
            ->first();
        // $photo = DB::connection('sqlsrvUser')
        //     ->table('photo')
        //     ->select('image')
        //     ->where('post_id', $id)
        //     ->first();
        return view('coupons.detail', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RealEstate  $realEstate
     * @return \Illuminate\Http\Response
     */
    public function edit(RealEstate $realEstate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RealEstate  $realEstate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RealEstate $realEstate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RealEstate  $realEstate
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealEstate $realEstate)
    {
        //
    }
}
