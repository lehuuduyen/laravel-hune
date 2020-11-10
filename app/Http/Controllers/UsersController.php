<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');

        if (!empty($keyword)) {
            $users = DB::connection('sqlsrvUser')->table('users')
            // ->select(['users.id','users.id' 'users.full_name', 'users.phone', 'users.facebook_id', 'users.status', 'users.avatar', 'users.created_at'])
            // ->select(['users.id', 'users.full_name', 'users.phone', 'users_point.point as users_point', 'user_point_history.point as user_point_history', 'users.facebook_id', 'users.status', 'users.avatar', 'users.created_at'])
            // ->leftJoin('users_point', 'users_point.user_id', '=', 'users.id')
            // ->leftJoin('user_point_history', 'user_point_history.user_id', '=', 'users.id')
            ->where(function ($query) use ($keyword) {
                if (is_numeric($keyword)) {
                    $query->orwhere('users.id', 'LIKE', "%$keyword%")
                        ->orwhere('users.phone', 'LIKE', '%'.$keyword.'%');
                } else {
                    $query->orwhere('users.full_name', 'LIKE', '%'.$keyword.'%');
                }
                
            })
            ->orderBy('users.created_at', 'desc')
            ->paginate(50);

            return view('users.index', compact('users'));
        }

        $users = DB::connection('sqlsrvUser')->table('users')
        // ->select(['users.id', 'users.full_name', 'users.phone', 'users.facebook_id', 'users.status', 'users.avatar', 'users.created_at'])
        // ->select(['users.id', 'users.full_name', 'users.phone', 'users_point.point as users_point', 'user_point_history.point as user_point_history', 'users.facebook_id', 'users.status', 'users.avatar', 'users.created_at'])
        // ->leftJoin('users_point', 'users_point.user_id', '=', 'users.id')
        // ->leftJoin('user_point_history', 'user_point_history.user_id', '=', 'users.id')
        ->orderBy('users.created_at', 'desc')
        ->paginate(50);

        return view('users.index', compact('users'));
    }

    public function updateStatus(Request $request)
    {
        $id = $request->get('id');
        $status = $request->get('status');
        
        $status = $status == 1 ? 2 : 1;
        $changeStatus = DB::connection('sqlsrvUser')->table('users')
            ->where('id', $id)
            ->update(['status' => $status]);

        return $changeStatus;
    }

    public function activePoint(Request $request) {
        $user_id = $request->get('user_id');
        $point = $request->get('point');
        $option = $request->get('option');

        // add new point
        // if ($option == 1) {
        //     $query = DB::connection('sqlsrvUser')
        //         ->insert('insert into users_point (user_id, point) values (?, ?)', [$user_id, $point]);
        //     return $query;
        // }

        // show old value point
        if ($option == 2) {
            $users_transaction_coupon = DB::connection('sqlsrvUser')->table('users_transaction_coupon')
                ->where('user_id', '=', $user_id)
                ->sum('point');

            $user_point_history = DB::connection('sqlsrvUser')->table('user_point_history')
                ->where('user_id', '=', $user_id)
                ->sum('point');

            $query = DB::connection('sqlsrvUser')->table('users')
                ->select(['users.id', 'users.full_name', 'users_point.point as point'])
                ->leftJoin('users_point', 'users_point.user_id', '=', 'users.id')
                ->where('users.id', '=', $user_id)
                ->first();

            // var_dump($user_point_history);
            // var_dump($users_transaction_coupon);
            // var_dump($query);
            $query->point = ($user_point_history + $query->point) - $users_transaction_coupon;

            return response()->json($query);
        }

        // update or insert point
        if ($option == 3) {
            $get_point = DB::connection('sqlsrvUser')->table('users_point')
                ->where('user_id', $user_id)
                ->first();

            if ($get_point) {
                $new_point = $get_point->point + $point;
                // dd($new_point);

                $query = DB::connection('sqlsrvUser')->table('users_point')
                    ->where('user_id', $user_id)
                    ->update(['point' => $new_point]);

                return $query;
            }

            $query = DB::connection('sqlsrvUser')
                ->insert('insert into users_point (user_id, point) values (?, ?)', [$user_id, $point]);
            
            return $query;
            
        }

        // delete point
        if ($option == 4) {
            $query = DB::connection('sqlsrvUser')->table('users_point')->where('user_id', '=', $user_id)->delete();

            return $query;
        }

    }

    public function pushNoti(Request $request) {
        $query = DB::connection('pushNoti')->table('message_queue')
            ->orderBy('addeddate', 'desc')
            ->get();

        return view('users.pushNoti', compact('query'));
    }

    public function activePushNoti(Request $request) {
        $id = $request->get('id');
        $title = $request->get('title');
        $message = $request->get('message');
        $addeddate = $request->get('addeddate');
        $status = $request->get('status');
        $updateddate = $request->get('updateddate');
        $option = $request->get('option');

        // add new PushNoti
        if ($option == 1) {
            $query = DB::connection('pushNoti')
                ->insert('insert into message_queue (title, message, pushgroup, addeddate, status, updateddate) values (?, ?, ?, ?, ?, ?)', [$title, $message, 'all', $addeddate, 'New', $addeddate]);
            return $query;
        }

        // show old value PushNoti
        if ($option == 2) {
            $query = DB::connection('pushNoti')->table('message_queue')
                ->where('id', '=', $id)
                ->first();
            return response()->json($query);
        }

        // update PushNoti
        if ($option == 3) {
            $query = DB::connection('pushNoti')->table('message_queue')
                ->where('id', $id)
                ->update(['title' => $title, 'message' => $message, 'status' => $status, 'updateddate' => $updateddate]);
            
            return $query;
        }

        // delete PushNoti
        if ($option == 4) {
            $query = DB::connection('pushNoti')->table('message_queue')->where('id', '=', $id)->delete();

            return $query;
        }

    }

    public function listAppInformation(Request $request) {
        $query = DB::connection('sqlsrvUser')->table('app_information')
            ->get();

        return view('users.app_information', compact('query'));
    }

    public function actionAppInformation(Request $request) {
        $id = $request->get('id');
        $updateApp = $request->get('updateApp');
        $versionIOS = $request->get('versionIOS');
        $versionAndroid = $request->get('versionAndroid');
        $option = $request->get('option');

        // add new PushNoti
        if ($option == 1) {
            $query = DB::connection('sqlsrvUser')
                ->insert('insert into app_information (updateApp, versionIOS, versionAndroid) values (?, ?, ?)', [$updateApp, $versionIOS, $versionAndroid]);
            return $query;
        }

        // show old value PushNoti
        if ($option == 2) {
            $query = DB::connection('sqlsrvUser')->table('app_information')
                ->where('id', '=', $id)
                ->first();
            return response()->json($query);
        }

        // update PushNoti
        if ($option == 3) {
            $query = DB::connection('sqlsrvUser')->table('app_information')
                ->where('id', $id)
                ->update(['updateApp' => $updateApp, 'versionIOS' => $versionIOS, 'versionAndroid' => $versionAndroid]);
            
            return $query;
        }

        // delete PushNoti
        if ($option == 4) {
            $query = DB::connection('sqlsrvUser')->table('app_information')->where('id', '=', $id)->delete();

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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Request $request, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
