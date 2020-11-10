<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminsController extends Controller
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
            $users = DB::connection('sqlsrvUser')->table('admins')
            ->select(['id', 'username', 'password', 'email', 'status', 'level', 'created_at'])
            ->where(function ($query) use ($keyword) {
                if (is_numeric($keyword)) {
                    $query->orwhere('id', 'LIKE', "%$keyword%")
                        ->orwhere('status', 'LIKE', '%'.$keyword.'%')
                        ->orwhere('level', 'LIKE', '%'.$keyword.'%');
                } else {
                    $query->orwhere('username', 'LIKE', '%'.$keyword.'%')
                        ->orwhere('email', 'LIKE', '%'.$keyword.'%');
                }
                
            })
            ->orderBy('created_at', 'desc')
            ->paginate(50);

            return view('admins.index', compact('users'));
        }

        $users = DB::connection('sqlsrvUser')->table('admins')
            ->select(['id', 'username', 'password', 'email', 'status', 'level', 'created_at'])
            ->orderBy('created_at', 'desc')
            ->paginate(50);

        return view('admins.index', compact('users'));
    }

    public function activeAdmin(Request $request) {
        $id = $request->get('id');
        $username = $request->get('username');
        $password = $request->get('password');
        $email = $request->get('email');
        $date = $request->get('date');
        $status = $request->get('status');
        $level = $request->get('level');
        $option = $request->get('option');

        // add new cate
        if ($option == 1) {
            $query = DB::connection('sqlsrvUser')
                ->insert('insert into admins (username, password, email, level, status, created_at) values (?, ?, ?, ?, ?, ?)', [$username, $password, $email, $level, $status, $date]);
            return $query;
        }

        // show old value cates
        if ($option == 2) {
            $query = DB::connection('sqlsrvUser')->table('admins')
                ->select(['id', 'username', 'password', 'email', 'level', 'status', 'created_at'])
                ->where('id', '=', $id)
                ->first();
            return response()->json($query);
        }

        // update cates
        if ($option == 3) {
            $query = DB::connection('sqlsrvUser')->table('admins')
                ->where('id', $id)
                ->update(['username' => $username, 'password' => $password, 'email' => $email, 'level' => $level, 'created_at' => $date, 'status' => $status]);
            
            return $query;
        }

        // delete cate
        if ($option == 4) {
            $query = DB::connection('sqlsrvUser')->table('admins')->where('id', '=', $id)->delete();

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
