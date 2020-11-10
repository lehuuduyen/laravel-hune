<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListUsersForPost extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->get('id');
        $service = $request->get('service');

        $db = 'sqlsrvTransport';
        $navi = 'transports';
        $file_upload = 'Transport';

        switch($service) {
            case 6:
                $db = 'sqlsrvLandHouse';
                $navi = 'landhouses';
                $file_upload = 'Landhouse';
            break;
            case 7:
                $navi = 'recruitments';
                $file_upload = 'Recruitment';
                $db = 'sqlsrvRecruitment';
            break;
            case 8:
                $navi = 'nails';
                $file_upload = 'Nail';
                $db = 'sqlsrvNail';
            break;
            case 9:
                $navi = 'tours';
                $file_upload = 'Tour';
                $db = 'sqlsrvTour';
            break;
            case 10:
                $navi = 'shops';
                $file_upload = 'Shop';
                $db = 'sqlsrvShop';
            break;
        }

        // echo $db;

        // $table = 'post';

        // $keyword = $request->get('keyword');

        // if (!empty($keyword)) {
        //     $users = DB::connection('sqlsrvUser')->table('users')
        //     ->where(function ($query) use ($keyword) {
        //         if (is_numeric($keyword)) {
        //             $query->orwhere('users.id', 'LIKE', "%$keyword%")
        //                 ->orwhere('users.phone', 'LIKE', '%'.$keyword.'%');
        //         } else {
        //             $query->orwhere('users.full_name', 'LIKE', '%'.$keyword.'%');
        //         }
                
        //     })
        //     ->orderBy('users.created_at', 'desc')
        //     ->paginate(50);

        //     return view('users.index', compact('users'));
        // }
        $posts = DB::connection($db)->table('post')
            ->where('user_id', '=', $id)
            // ->select(['id', 'user_id', 'title', 'date_created', 'price', 'status', 'image'])
            ->orderBy('date_created', 'desc')
            // ->paginate(50);
            ->get();
        // $posts = DB::connection('sqlsrvUser')->table('users')
        //     ->orderBy('users.created_at', 'desc')
        //     ->get();
        // ->paginate(50);

        return view('users.showListPost', compact('posts', 'navi', 'file_upload'));
    }

    // public function updateStatus(Request $request)
    // {
    //     $id = $request->get('id');
    //     $status = $request->get('status');
        
    //     $status = $status == 1 ? 2 : 1;
    //     $changeStatus = DB::connection('sqlsrvUser')->table('users')
    //         ->where('id', $id)
    //         ->update(['status' => $status]);

    //     return $changeStatus;
    // }

    // public function activePoint(Request $request) {
    //     $user_id = $request->get('user_id');
    //     $point = $request->get('point');
    //     $option = $request->get('option');

    //     // add new point
    //     // if ($option == 1) {
    //     //     $query = DB::connection('sqlsrvUser')
    //     //         ->insert('insert into users_point (user_id, point) values (?, ?)', [$user_id, $point]);
    //     //     return $query;
    //     // }

    //     // show old value point
    //     if ($option == 2) {
    //         $query = DB::connection('sqlsrvUser')->table('users')
    //             ->select(['users.id', 'users.full_name', 'users_point.point as point'])
    //             ->leftJoin('users_point', 'users_point.user_id', '=', 'users.id')
    //             ->where('users.id', '=', $user_id)
    //             ->first();
    //         // dd($query);
    //         return response()->json($query);
    //     }

    //     // update or insert point
    //     if ($option == 3) {
    //         $get_point = DB::connection('sqlsrvUser')->table('users_point')
    //             ->where('user_id', $user_id)
    //             ->first();

    //         if ($get_point) {
    //             $new_point = $get_point->point + $point;
    //             // dd($new_point);

    //             $query = DB::connection('sqlsrvUser')->table('users_point')
    //                 ->where('user_id', $user_id)
    //                 ->update(['point' => $new_point]);

    //             return $query;
    //         }

    //         $query = DB::connection('sqlsrvUser')
    //             ->insert('insert into users_point (user_id, point) values (?, ?)', [$user_id, $point]);
            
    //         return $query;
            
    //     }

    //     // delete point
    //     if ($option == 4) {
    //         $query = DB::connection('sqlsrvUser')->table('users_point')->where('user_id', '=', $user_id)->delete();

    //         return $query;
    //     }

    // }

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
