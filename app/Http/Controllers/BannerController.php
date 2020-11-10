<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = DB::connection('sqlsrvAds')->table('ads_transaction_banner')
            // ->select(['ads.id', 'ads.name', 'ads_cate.name as ads_cate_id', 'ads.count_display', 'ads.distance_display', 'ads.price', 'ads.date_created'])
            // ->leftJoin('ads_cate', 'ads_cate.id', '=', 'ads.ads_cate_id')
            ->orderBy('ads_transaction_banner.date_created', 'desc')
            ->get();

        return view('ads.listBanner', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ads.addBanner');
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
        if ($request->isMethod('post')) {
            
            $url = $request->get('banner-url');
            $image = $request->get('banner-image');
            $status = $request->get('banner-status');
            $lat = $request->get('banner-lat');
            $long = $request->get('banner-long');
            $date = $request->get('banner-date');

            $query = DB::connection('sqlsrvAds')
                ->insert('insert into ads_transaction_banner (url, photos, latitude, longitude, status, date_created) values (?, ?, ?, ?, ?, ?)', [$url, $image, $lat, $long, $status, $date]);

            return redirect()->action('BannerController@index');
        }
        return redirect()->action('BannerController@create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $post = DB::connection('sqlsrvAds')->table('ads_transaction_banner')->findOrFail($id);
        //
        $post = DB::connection('sqlsrvAds')->table('ads_transaction_banner')
            ->where('id', '=', $id)
            ->first();
        // var_dump($post);
        return view('ads.editBanner', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = DB::connection('sqlsrvAds')->table('ads_transaction_banner')
            ->where('id', '=', $id)
            ->first();
        // var_dump($post);
        return view('ads.editBanner', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $url = $request->get('banner-url');
        $image = $request->get('banner-image');
        $status = $request->get('banner-status');
        $lat = $request->get('banner-lat');
        $long = $request->get('banner-long');
        $date = $request->get('banner-date');

        $query = DB::connection('sqlsrvAds')->table('ads_transaction_banner')
            ->where('id', $id)
            ->update(['url' => $url, 'photos' => $image, 'date_created' => $date, 'latitude' => $lat, 'longitude' => $long, 'status' => $status]);

        return redirect()->action('BannerController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $query = DB::connection('sqlsrvAds')->table('ads_transaction_banner')->where('id', '=', $id)->delete();
        return redirect()->action('BannerController@index');

    }
}
