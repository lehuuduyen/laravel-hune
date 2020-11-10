<?php

namespace App\Http\Controllers;

use App\TransactionVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::connection('sqlsrvAds')->table('ads_transaction_video')
            ->orderBy('ads_transaction_video.date_created', 'desc')
            ->get();

        return view('ads.listVideo', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.addVideo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $servicecode = $request->get('video-servicecode');

        if ($request->isMethod('post') && $servicecode) {

            $code = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
            $video_name = $request->get('video-name');
            $description = $request->get('video-desc');
            $toEmail = $request->get('video-toEmail');
            $toName = $request->get('video-toName');
            $note = $request->get('video-note');
            $count_display = $request->get('video-count');
            $distance_display = $request->get('video-distance');
            $price = $request->get('video-price');
            $url = $request->get('video-url');
            $website = $request->get('video-website');
            $thumbnail = $request->get('video-image');
            $status = $request->get('video-status');
            $latitude = $request->get('video-lat');
            $longitude = $request->get('video-long');
            $date_created = $request->get('video-date');

            $query = DB::connection('sqlsrvAds')
                ->insert('insert into ads_transaction_video (code, video_name, servicecode, count_display, distance_display, price, url, status, date_created, latitude, longitude, description, website, thumbnail, ToEmail, ToName, sNote) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$code, $video_name, $servicecode, $count_display, $distance_display, $price, $url, $status, $date_created, $latitude, $longitude, $description, $website, $thumbnail, $toEmail, $toName, $note]);

            return redirect()->action('TransactionVideoController@index');
        }
        return redirect()->action('TransactionVideoController@create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = DB::connection('sqlsrvAds')->table('ads_transaction_video')
            ->where('id', '=', $id)
            ->first();
        return view('ads.editVideo', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = DB::connection('sqlsrvAds')->table('ads_transaction_video')
            ->where('id', '=', $id)
            ->first();
        return view('ads.editVideo', compact('post'));
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
        $servicecode = $request->get('video-servicecode');
        $video_name = $request->get('video-name');
        $description = $request->get('video-desc');
        $toEmail = $request->get('video-toEmail');
        $toName = $request->get('video-toName');
        $note = $request->get('video-note');
        $count_display = $request->get('video-count');
        $distance_display = $request->get('video-distance');
        $price = $request->get('video-price');
        $url = $request->get('video-url');
        $website = $request->get('video-website');
        $thumbnail = $request->get('video-image');
        $status = $request->get('video-status');
        $latitude = $request->get('video-lat');
        $longitude = $request->get('video-long');
        $date_created = $request->get('video-date');

        $query = DB::connection('sqlsrvAds')->table('ads_transaction_video')
            ->where('id', $id)
            ->update(['servicecode' => $servicecode, 'video_name' => $video_name, 'description' => $description, 'count_display' => $count_display, 'distance_display' => $distance_display,
                'price' => $price, 'url' => $url, 'website' => $website, 'thumbnail' => $thumbnail, 'status' => $status, 'latitude' => $latitude,
                'longitude' => $longitude, 'date_created' => $date_created, 'ToName' => $toName, 'ToEmail' => $toEmail, 'sNote' => $note]);

        return redirect()->action('TransactionVideoController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = DB::connection('sqlsrvAds')->table('ads_transaction_video')->where('id', '=', $id)->delete();
        return redirect()->action('TransactionVideoController@index');
    }

    public function user_tracking_point_video()
    {
        $posts = DB::connection('sqlsrvUser')->table('user_point_history as u')
            ->select('user_id', 'u1.full_name', 'u.status', DB::connection('sqlsrvUser')->table('user_point_history')->raw('SUM(u.point) as total'))
            ->join('users as u1', 'u.user_id', '=', 'u1.id')
            ->where(function($query) {
                $query->where('u.status', '=', 0)
                    ->orWhereNull('u.status');
            })
            ->where('u.trackid', '>', 0)
            ->groupBy('u.user_id', 'u1.full_name', 'u.status')
            ->orderBy('total', 'desc')
            ->paginate(30);
            // ->toSql();

            // var_dump($posts);

        return view('users.listPointVideo', compact('posts'));
    }

    public function updateStatus(Request $request)
    {
        $id = $request->get('id');
        $status = $request->get('status');
        $status = $status == 1 ? 0 : 1;
        $changeStatus = DB::connection('sqlsrvUser')->table('user_point_history')
            ->where('user_id', $id)
            ->where('from_logic', '=', 'watchvideo')
            ->update(['status' => $status]);

        return $changeStatus;
    }
}
