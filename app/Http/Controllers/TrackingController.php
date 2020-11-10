<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function indexCampaign(Request $request) {
        $campaign = DB::connection('sqlsrvTracking')->table('campaign')
            ->orderBy('campaign.expire_date', 'desc')
            ->get();

        return view('tracking.campaign', compact('campaign'));
    }

    public function updateCampaign(Request $request) {
        $id = $request->get('id');
        $content = $request->get('content');
        $title = $request->get('title');
        $total = $request->get('total');
        $expire_date = $request->get('expire_date');
        $status = $request->get('status');
        $option = $request->get('option');

        // show old value campaign
        if ($option == 2) {
            $query = DB::connection('sqlsrvTracking')->table('campaign')
                ->where('id', '=', $id)
                ->first();
            return response()->json($query);
        }

        // update campaign
        if ($option == 3) {
            $query = DB::connection('sqlsrvTracking')->table('campaign')
                ->where('id', $id)
                ->update(['title' => $title, 'content' => $content, 'total' => $total, 'expire_date' => $expire_date, 'status' => $status]);
            
            return $query;
        }

    }

    public function indexUsersTrackingData(Request $request) {
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $users_tracking_data = DB::connection('sqlsrvTracking')->table('users_tracking_data')
                                                 ->where(function($query) use ($keyword) {
                if (is_numeric($keyword)) {
                    $query->where('users_tracking_data.user_id', 'LIKE', "%$keyword%");
                }
                
            })
            ->orderBy('users_tracking_data.date_created', 'desc')
            ->paginate(20);

            return view('tracking.users_tracking_data', compact('users_tracking_data'));
        }
        $users_tracking_data = DB::connection('sqlsrvTracking')->table('users_tracking_data')
            ->orderBy('users_tracking_data.date_created', 'desc')
            ->paginate(20);

        return view('tracking.users_tracking_data', compact('users_tracking_data'));
    }

    public function indexUsersPlay(Request $request) {
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $users_play = DB::connection('sqlsrvTracking')->table('users_play')
                                                 ->where(function($query) use ($keyword) {
                if (is_numeric($keyword)) {
                    $query->orwhere('users_play.user_id', 'LIKE', "%$keyword%")
                          ->orwhere('users_play.saction', 'LIKE', "%$keyword%");
                }
                
            })
            ->orderBy('users_play.date_created', 'desc')
            ->paginate(20);

            return view('tracking.users_play', compact('users_play'));
        }
        $users_play = DB::connection('sqlsrvTracking')->table('users_play')
            ->orderBy('users_play.date_created', 'desc')
            ->paginate(20);

        return view('tracking.users_play', compact('users_play'));
    }

    public function updateUsersPlay(Request $request) {
        $id = $request->get('id');
        $total = $request->get('total');
        $status = $request->get('status');
        $expire_date = $request->get('expire_date');
        $option = $request->get('option');

        // show old value users_play
        if ($option == 2) {
            $query = DB::connection('sqlsrvTracking')->table('users_play')
                ->where('id', '=', $id)
                ->first();
            return response()->json($query);
        }

        // update users_play
        if ($option == 3) {
            $query = DB::connection('sqlsrvTracking')->table('users_play')
                ->where('id', $id)
                ->update(['total' => $total, 'status' => $status, 'expire_date' => $expire_date]);
            
            return $query;
        }

        // view any point
        if ($option == 4) {
            $query = DB::connection('sqlsrvTracking')->table('users_play')
                ->where('users_play.user_id', '=', $id)
                ->sum('users_play.total');
            return response()->json($query);
        }

        // view sum point
        if ($option == 5) {
            $query = DB::connection('sqlsrvTracking')->table('users_play')
                ->sum('users_play.total');
            return response()->json($query);
        }

    }

    public function approvedPost(Request $request)
    {
        $postid = $request->get('postid');
        $user_id = $request->get('user_id');
        $saction = 'post';

        $query = DB::connection('sqlsrvTracking')->select("EXEC users_tracking_data_add_approved_post $user_id, $postid");

        return response()->json($query);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
    }
}
