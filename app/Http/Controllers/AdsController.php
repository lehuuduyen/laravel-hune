<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');

        $list_cate = DB::connection('sqlsrvAds')->table('ads_cate')->get();
        $sum_price_trans = DB::connection('sqlsrvAds')->table('ads_transaction_transport')->where('status', '=', 1)->sum('price');
        $sum_price_land = DB::connection('sqlsrvAds')->table('ads_transaction_landhouse')->where('status', '=', 1)->sum('price');
        $sum_price_recr = DB::connection('sqlsrvAds')->table('ads_transaction_recruitment')->where('status', '=', 1)->sum('price');
        $sum_price_nail = DB::connection('sqlsrvAds')->table('ads_transaction_nail')->where('status', '=', 1)->sum('price');
        $sum_price = $sum_price_land + $sum_price_nail + $sum_price_recr + $sum_price_trans;
        
        // if (!empty($keyword)) {
        //     $posts = DB::connection('sqlsrvAds')->table('ads')
        //     ->select(['ads.id', 'ads.name', 'ads_cate.name as ads_cate_id', 'ads.count_display', 'ads.distance_display', 'ads.price', 'ads.date_created'])
        //     ->leftJoin('ads_cate', 'ads_cate.id', '=', 'ads.ads_cate_id')
        //     ->orWhere('ads.id', 'LIKE', "%$keyword%")
        //     ->orWhere('ads.name', 'LIKE', "%$keyword%")
        //     ->orWhere('ads.count_display', 'LIKE', "%$keyword%")
        //     ->orWhere('ads.distance_display', 'LIKE', "%$keyword%")
        //     ->orWhere('ads.price', 'LIKE', "%$keyword%")
        //     ->orderBy('ads.date_created', 'desc')
        //     ->paginate(50);

        //     return view('ads.index', compact('posts', 'list_cate', 'sum_price'));
        // }

        $posts = DB::connection('sqlsrvAds')->table('ads')
            ->select(['ads.id', 'ads.name', 'ads_cate.name as ads_cate_id', 'ads.count_display', 'ads.distance_display', 'ads.price', 'ads.date_created'])
            ->leftJoin('ads_cate', 'ads_cate.id', '=', 'ads.ads_cate_id')
            ->orderBy('ads.date_created', 'desc')
            ->get();

        return view('ads.index', compact('posts', 'list_cate', 'sum_price'));
    }

    // public function addBanner()
    // {
    //     return view('ads.addBanner');
    // }

    // public function createNewBanner(Request $request)
    // {
    //     if ($request->isMethod('post')) {
            
    //         $url = $request->get('banner-url');
    //         $image = $request->get('banner-image');
    //         $status = $request->get('banner-status');
    //         $lat = $request->get('banner-lat');
    //         $long = $request->get('banner-long');
    //         $date = $request->get('banner-date');

    //         $query = DB::connection('sqlsrvAds')
    //             ->insert('insert into ads_transaction_banner (url, photos, latitude, longitude, status, date_created) values (?, ?, ?, ?, ?, ?)', [$url, $image, $lat, $long, $status, $date]);

    //         return redirect()->action('AdsController@adsBanner');
    //     }
    //     return redirect('/ads/addBanner');
    // }

    // public function adsBanner() 
    // {
    //     $posts = DB::connection('sqlsrvAds')->table('ads_transaction_banner')
    //         // ->select(['ads.id', 'ads.name', 'ads_cate.name as ads_cate_id', 'ads.count_display', 'ads.distance_display', 'ads.price', 'ads.date_created'])
    //         // ->leftJoin('ads_cate', 'ads_cate.id', '=', 'ads.ads_cate_id')
    //         ->orderBy('ads_transaction_banner.date_created', 'desc')
    //         ->get();

    //     return view('ads.listBanner', compact('posts'));
    // }

    public function activeAds(Request $request) {
        $id = $request->get('id');
        $name = $request->get('name');
        $ads_cate_id = $request->get('ads_cate_id');
        $count_display = $request->get('count_display');
        $distance_display = $request->get('distance_display');
        $price = $request->get('price');
        $date = $request->get('date');
        $option = $request->get('option');

        // add new ads
        if ($option == 1) {
            $query = DB::connection('sqlsrvAds')
                ->insert('insert into ads (name, ads_cate_id, count_display, distance_display, price, date_created) values (?, ?, ?, ?, ?, ?)', [$name, $ads_cate_id, $count_display, $distance_display, $price, $date]);
            return $query;
        }

        // show old value ads
        if ($option == 2) {
            $query = DB::connection('sqlsrvAds')->table('ads')
                ->select(['id', 'name', 'ads_cate_id', 'count_display', 'distance_display', 'price', 'date_created'])
                ->where('id', '=', $id)
                ->first();
            return response()->json($query);
        }

        // update ads
        if ($option == 3) {
            $query = DB::connection('sqlsrvAds')->table('ads')
                ->where('id', $id)
                ->update(['name' => $name, 'ads_cate_id' => $ads_cate_id, 'count_display' => $count_display, 'distance_display' => $distance_display, 'price' => $price, 'date_created' => $date]);
            
            return $query;
        }

        // delete cate
        if ($option == 4) {
            $query = DB::connection('sqlsrvAds')->table('ads')->where('id', '=', $id)->delete();

            return $query;
        }

    }

    public function indexTrans(Request $request)
    {
        $keyword = $request->get('search');
        $sum_price = DB::connection('sqlsrvAds')->table('ads_transaction_transport')->where('status', '=', 1)->sum('price');

        if (!empty($keyword)) {
            $posts = DB::connection('sqlsrvAds')->table('ads_transaction_transport')
            ->select(['id', 'code', 'ads_id', 'ads_cate_type', 'ads_name', 'count_display', 'distance_display', 'price', 'user_id', 'post_id', 'status', 'date_created'])
            ->orWhere('id', 'LIKE', "%$keyword%")
            ->orWhere('code', 'LIKE', "%$keyword%")
            ->orWhere('ads_id', 'LIKE', "%$keyword%")
            ->orWhere('ads_cate_type', 'LIKE', "%$keyword%")
            ->orWhere('ads_name', 'LIKE', "%$keyword%")
            ->orWhere('count_display', 'LIKE', "%$keyword%")
            ->orWhere('distance_display', 'LIKE', "%$keyword%")
            ->orWhere('price', 'LIKE', "%$keyword%")
            ->orWhere('user_id', 'LIKE', "%$keyword%")
            ->orWhere('post_id', 'LIKE', "%$keyword%")
            ->orderBy('date_created', 'desc')
            ->paginate(50);

            return view('ads.transports.index', compact('posts', 'sum_price'));
        }

        $posts = DB::connection('sqlsrvAds')->table('ads_transaction_transport')
            ->select(['id', 'code', 'ads_id', 'ads_cate_type', 'ads_name', 'count_display', 'distance_display', 'price', 'user_id', 'post_id', 'status', 'date_created'])
            ->orderBy('date_created', 'desc')
            ->paginate(50);

        return view('ads.transports.index', compact('posts', 'sum_price'));
    }

    public function indexLands(Request $request)
    {
        $keyword = $request->get('search');
        $sum_price = DB::connection('sqlsrvAds')->table('ads_transaction_landhouse')->where('status', '=', 1)->sum('price');

        if (!empty($keyword)) {
            $posts = DB::connection('sqlsrvAds')->table('ads_transaction_landhouse')
            ->select(['id', 'code', 'ads_id', 'ads_cate_type', 'ads_name', 'count_display', 'distance_display', 'price', 'user_id', 'post_id', 'status', 'date_created'])
            ->orWhere('id', 'LIKE', "%$keyword%")
            ->orWhere('code', 'LIKE', "%$keyword%")
            ->orWhere('ads_id', 'LIKE', "%$keyword%")
            ->orWhere('ads_cate_type', 'LIKE', "%$keyword%")
            ->orWhere('ads_name', 'LIKE', "%$keyword%")
            ->orWhere('count_display', 'LIKE', "%$keyword%")
            ->orWhere('distance_display', 'LIKE', "%$keyword%")
            ->orWhere('price', 'LIKE', "%$keyword%")
            ->orWhere('user_id', 'LIKE', "%$keyword%")
            ->orWhere('post_id', 'LIKE', "%$keyword%")
            ->orderBy('date_created', 'desc')
            ->paginate(50);

            return view('ads.landhouses.index', compact('posts', 'sum_price'));
        }

        $posts = DB::connection('sqlsrvAds')->table('ads_transaction_landhouse')
            ->select(['id', 'code', 'ads_id', 'ads_cate_type', 'ads_name', 'count_display', 'distance_display', 'price', 'user_id', 'post_id', 'status', 'date_created'])
            ->orderBy('date_created', 'desc')
            ->paginate(50);

        return view('ads.landhouses.index', compact('posts', 'sum_price'));
    }

    public function indexRecuis(Request $request)
    {
        $keyword = $request->get('search');
        $sum_price = DB::connection('sqlsrvAds')->table('ads_transaction_recruitment')->where('status', '=', 1)->sum('price');

        if (!empty($keyword)) {
            $posts = DB::connection('sqlsrvAds')->table('ads_transaction_recruitment')
            ->select(['id', 'code', 'ads_id', 'ads_cate_type', 'ads_name', 'count_display', 'distance_display', 'price', 'user_id', 'post_id', 'status', 'date_created'])
            ->orWhere('id', 'LIKE', "%$keyword%")
            ->orWhere('code', 'LIKE', "%$keyword%")
            ->orWhere('ads_id', 'LIKE', "%$keyword%")
            ->orWhere('ads_cate_type', 'LIKE', "%$keyword%")
            ->orWhere('ads_name', 'LIKE', "%$keyword%")
            ->orWhere('count_display', 'LIKE', "%$keyword%")
            ->orWhere('distance_display', 'LIKE', "%$keyword%")
            ->orWhere('price', 'LIKE', "%$keyword%")
            ->orWhere('user_id', 'LIKE', "%$keyword%")
            ->orWhere('post_id', 'LIKE', "%$keyword%")
            ->orderBy('date_created', 'desc')
            ->paginate(50);

            return view('ads.recruitments.index', compact('posts', 'sum_price'));
        }

        $posts = DB::connection('sqlsrvAds')->table('ads_transaction_recruitment')
            ->select(['id', 'code', 'ads_id', 'ads_cate_type', 'ads_name', 'count_display', 'distance_display', 'price', 'user_id', 'post_id', 'status', 'date_created'])
            ->orderBy('date_created', 'desc')
            ->paginate(50);

        return view('ads.recruitments.index', compact('posts', 'sum_price'));
    }

    public function indexNails(Request $request)
    {
        $keyword = $request->get('search');
        $sum_price = DB::connection('sqlsrvAds')->table('ads_transaction_nail')->where('status', '=', 1)->sum('price');

        if (!empty($keyword)) {
            $posts = DB::connection('sqlsrvAds')->table('ads_transaction_nail')
            ->select(['id', 'code', 'ads_id', 'ads_cate_type', 'ads_name', 'count_display', 'distance_display', 'price', 'user_id', 'post_id', 'status', 'date_created'])
            ->orWhere('id', 'LIKE', "%$keyword%")
            ->orWhere('code', 'LIKE', "%$keyword%")
            ->orWhere('ads_id', 'LIKE', "%$keyword%")
            ->orWhere('ads_cate_type', 'LIKE', "%$keyword%")
            ->orWhere('ads_name', 'LIKE', "%$keyword%")
            ->orWhere('count_display', 'LIKE', "%$keyword%")
            ->orWhere('distance_display', 'LIKE', "%$keyword%")
            ->orWhere('price', 'LIKE', "%$keyword%")
            ->orWhere('user_id', 'LIKE', "%$keyword%")
            ->orWhere('post_id', 'LIKE', "%$keyword%")
            ->orderBy('date_created', 'desc')
            ->paginate(50);

            return view('ads.nails.index', compact('posts', 'sum_price'));
        }

        $posts = DB::connection('sqlsrvAds')->table('ads_transaction_nail')
            ->select(['id', 'code', 'ads_id', 'ads_cate_type', 'ads_name', 'count_display', 'distance_display', 'price', 'user_id', 'post_id', 'status', 'date_created'])
            ->orderBy('date_created', 'desc')
            ->paginate(50);

        return view('ads.nails.index', compact('posts', 'sum_price'));
    }

    public function indexTours(Request $request)
    {
        $keyword = $request->get('search');
        $sum_price = DB::connection('sqlsrvAds')->table('ads_transaction_tour')->where('status', '=', 1)->sum('price');

        if (!empty($keyword)) {
            $posts = DB::connection('sqlsrvAds')->table('ads_transaction_tour')
            ->select(['id', 'code', 'ads_id', 'ads_cate_type', 'ads_name', 'count_display', 'distance_display', 'price', 'user_id', 'post_id', 'status', 'date_created'])
            ->orWhere('id', 'LIKE', "%$keyword%")
            ->orWhere('code', 'LIKE', "%$keyword%")
            ->orWhere('ads_id', 'LIKE', "%$keyword%")
            ->orWhere('ads_cate_type', 'LIKE', "%$keyword%")
            ->orWhere('ads_name', 'LIKE', "%$keyword%")
            ->orWhere('count_display', 'LIKE', "%$keyword%")
            ->orWhere('distance_display', 'LIKE', "%$keyword%")
            ->orWhere('price', 'LIKE', "%$keyword%")
            ->orWhere('user_id', 'LIKE', "%$keyword%")
            ->orWhere('post_id', 'LIKE', "%$keyword%")
            ->orderBy('date_created', 'desc')
            ->paginate(50);

            return view('ads.tours.index', compact('posts', 'sum_price'));
        }

        $posts = DB::connection('sqlsrvAds')->table('ads_transaction_tour')
            ->select(['id', 'code', 'ads_id', 'ads_cate_type', 'ads_name', 'count_display', 'distance_display', 'price', 'user_id', 'post_id', 'status', 'date_created'])
            ->orderBy('date_created', 'desc')
            ->paginate(50);

        return view('ads.tours.index', compact('posts', 'sum_price'));
    }

    public function indexShops(Request $request)
    {
        $keyword = $request->get('search');
        $sum_price = DB::connection('sqlsrvAds')->table('ads_transaction_shop')->where('status', '=', 1)->sum('price');

        if (!empty($keyword)) {
            $posts = DB::connection('sqlsrvAds')->table('ads_transaction_shop')
            ->select(['id', 'code', 'ads_id', 'ads_cate_type', 'ads_name', 'count_display', 'distance_display', 'price', 'user_id', 'post_id', 'status', 'date_created'])
            ->orWhere('id', 'LIKE', "%$keyword%")
            ->orWhere('code', 'LIKE', "%$keyword%")
            ->orWhere('ads_id', 'LIKE', "%$keyword%")
            ->orWhere('ads_cate_type', 'LIKE', "%$keyword%")
            ->orWhere('ads_name', 'LIKE', "%$keyword%")
            ->orWhere('count_display', 'LIKE', "%$keyword%")
            ->orWhere('distance_display', 'LIKE', "%$keyword%")
            ->orWhere('price', 'LIKE', "%$keyword%")
            ->orWhere('user_id', 'LIKE', "%$keyword%")
            ->orWhere('post_id', 'LIKE', "%$keyword%")
            ->orderBy('date_created', 'desc')
            ->paginate(50);

            return view('ads.shops.index', compact('posts', 'sum_price'));
        }

        $posts = DB::connection('sqlsrvAds')->table('ads_transaction_shop')
            ->select(['id', 'code', 'ads_id', 'ads_cate_type', 'ads_name', 'count_display', 'distance_display', 'price', 'user_id', 'post_id', 'status', 'date_created'])
            ->orderBy('date_created', 'desc')
            ->paginate(50);

        return view('ads.shops.index', compact('posts', 'sum_price'));
    }

    public function updateStatus(Request $request)
    {
        $id = $request->get('id');
        $status = $request->get('status');
        $type = $request->get('type');
        $status = $status == 1 ? 0 : 1;

        if ($type == 1) {
            $changeStatus = DB::connection('sqlsrvAds')->table('ads_transaction_transport')
            ->where('id', $id)
            ->update(['status' => $status]);
        }
        if ($type == 2) {
            $changeStatus = DB::connection('sqlsrvAds')->table('ads_transaction_landhouse')
            ->where('id', $id)
            ->update(['status' => $status]);
        }
        if ($type == 3) {
            $changeStatus = DB::connection('sqlsrvAds')->table('ads_transaction_recruitment')
            ->where('id', $id)
            ->update(['status' => $status]);
        }
        if ($type == 4) {
            $changeStatus = DB::connection('sqlsrvAds')->table('ads_transaction_nail')
            ->where('id', $id)
            ->update(['status' => $status]);
        }

        return $changeStatus;
    }

    public function getRadius(Request $request) {
        $query = DB::connection('sqlsrvAds')->table('radius')
            ->select(['id', 'radius'])
            ->get();

        return view('ads.radius', compact('query'));
    }

    public function updateRadius(Request $request) {
        $radius = $request->get('radius');
        
        $query = DB::connection('sqlsrvAds')->table('radius')
            ->update(['radius' => $radius]);
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
     * @param  \App\Transport  $transport
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function edit(Transport $transport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transport $transport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transport $transport)
    {
        //
    }
}
