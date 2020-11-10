<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransportsController extends Controller
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
            $posts = DB::connection('sqlsrvTransport')->table('post')
            ->select(['id', 'user_id', 'title', 'date_created', 'price', 'status', 'image'])
            ->where(function ($query) use ($keyword) {
                if (is_numeric($keyword)) {
                    $query->orwhere('id', 'LIKE', "%$keyword%");
                } else {
                    $query->orwhere('title', 'LIKE', '%'.$keyword.'%');
                }
                
            })
            ->orderBy('date_created', 'desc')
            ->paginate(50);

            return view('transports.index', compact('posts'));
        }

        $posts = DB::connection('sqlsrvTransport')->table('post')
            ->select(['id', 'user_id', 'title', 'date_created', 'price', 'status', 'image'])
            ->orderBy('date_created', 'desc')
            ->paginate(50);

        return view('transports.index', compact('posts'));
    }

    public function updateStatus(Request $request)
    {
        $id = $request->get('id');
        $status = $request->get('status');
        $status = $status == 1 ? 2 : 1;
        $changeStatus = DB::connection('sqlsrvTransport')->table('post')
            ->where('id', $id)
            ->update(['status' => $status]);

        return $changeStatus;
    }

    public function getPostReport(Request $request)
    {
        $keyword = $request->get('search');

        if (!empty($keyword)) {
            $posts = DB::connection('sqlsrvTransport')->table('post_report')
                ->select(['post_report.post_id', 'post.title as title', 'type_report.name as name', 'post_report.type_report_id'])
                ->leftJoin('post', 'post.id', '=', 'post_report.post_id')
                ->leftJoin('type_report', 'type_report.id', '=', 'post_report.type_report_id')
                ->where('post.status', '1')
                ->where(function ($query) use ($keyword) {
                    $query->orwhere('type_report.name', 'LIKE', '%'.$keyword.'%');
                    $query->orwhere('post.title', 'LIKE', '%'.$keyword.'%');
                })
                //->orderBy('post_report.id', 'desc')
                ->distinct()
                ->paginate(50);

            return view('transports.postReport', compact('posts'));
        }

        $posts = DB::connection('sqlsrvTransport')->table('post_report')
            ->select(['post_report.post_id', 'post.title as title', 'type_report.name as name', 'post_report.type_report_id'])
            ->leftJoin('post', 'post.id', '=', 'post_report.post_id')
            ->leftJoin('type_report', 'type_report.id', '=', 'post_report.type_report_id')
            ->where('post.status', '1')
            //->orderBy('post_report.id', 'desc')
            ->distinct()
            ->paginate(50);

        return view('transports.postReport', compact('posts'));
    }

    public function getReport(Request $request) {
        $reports = DB::connection('sqlsrvTransport')->table('type_report')
            ->select(['id', 'name', 'date_created', 'active'])
            ->orderBy('date_created', 'desc')
            ->paginate(50);

        return view('transports.CRUD.report', compact('reports'));
    }

    public function activeReport(Request $request) {
        $id = $request->get('id');
        $name = $request->get('name');
        $date = $request->get('date');
        $status = $request->get('status');
        $option = $request->get('option');

        // add new report
        if ($option == 1) {
            $query = DB::connection('sqlsrvTransport')
                ->insert('insert into type_report (name, date_created, active) values (?, ?, ?)', [$name, $date, $status]);
            return $query;
        }

        // show old value reports
        if ($option == 2) {
            $query = DB::connection('sqlsrvTransport')->table('type_report')
                ->select(['id', 'name', 'date_created', 'active'])
                ->where('id', '=', $id)
                ->first();
            return response()->json($query);
        }

        // update reports
        if ($option == 3) {
            $query = DB::connection('sqlsrvTransport')->table('type_report')
                ->where('id', $id)
                ->update(['name' => $name, 'date_created' => $date, 'active' => $status]);
            
            return $query;
        }

        // delete report
        if ($option == 4) {
            $query = DB::connection('sqlsrvTransport')->table('type_report')->where('id', '=', $id)->delete();

            return $query;
        }

    }

    public function show($id)
    {
        $post = DB::connection('sqlsrvTransport')
            ->table('post')
            ->where('id', $id)
            ->first();
        $photo = DB::connection('sqlsrvTransport')
            ->table('photo')
            ->select('image')
            ->where('post_id', $id)
            ->first();
        $count_rp = DB::connection('sqlsrvTransport')->table('post_report')
            ->select('type_report.name as name', DB::connection('sqlsrvTransport')->table('type_report')->raw('COUNT(type_report.name) as number'))
            ->leftJoin('post', 'post.id', '=', 'post_report.post_id')
            ->leftJoin('type_report', 'type_report.id', '=', 'post_report.type_report_id')
            ->where('post_report.post_id', $id)
            ->groupBy('type_report.name')
            // ->orderBy('type_report.name as name', 'desc')
            ->get();
        // dd($count_rp);

        return view('transports.detail', compact('post', 'photo', 'count_rp'));
    }

    public function showDetailReport(Request $request, $id)
    {
        $keyword = $request->get('search');

        if (!empty($keyword)) {
            $posts = DB::connection('sqlsrvTransport')->table('post_report')
                ->select(['post_report.post_id', 'post.title as title', 'type_report.name as name', 'post_report.type_report_id'])
                ->leftJoin('post', 'post.id', '=', 'post_report.post_id')
                ->leftJoin('type_report', 'type_report.id', '=', 'post_report.type_report_id')
                ->where('post_report.type_report_id', $id)
                ->where(function ($query) use ($keyword) {
                    $query->orwhere('type_report.name', 'LIKE', '%'.$keyword.'%');
                    $query->orwhere('post.title', 'LIKE', '%'.$keyword.'%');
                })
                //->orderBy('post_report.id', 'desc')
                ->distinct()
                ->paginate(50);

            return view('transports.detailReport', compact('posts', 'id'));
        }

        $posts = DB::connection('sqlsrvTransport')->table('post_report')
            ->select(['post_report.post_id', 'post.title as title', 'type_report.name as name', 'post_report.type_report_id'])
            ->leftJoin('post', 'post.id', '=', 'post_report.post_id')
            ->leftJoin('type_report', 'type_report.id', '=', 'post_report.type_report_id')
            ->where('post_report.type_report_id', $id)
            //->orderBy('post_report.id', 'desc')
            ->distinct()
            ->paginate(50);

        return view('transports.detailReport', compact('posts', 'id'));
    }

    public function getCate(Request $request) {
        $cates = DB::connection('sqlsrvTransport')->table('category')
            ->select(['id', 'name', 'date_created', 'active'])
            ->orderBy('date_created', 'desc')
            ->paginate(50);

        return view('transports.CRUD.cate', compact('cates'));
    }

    public function activeCate(Request $request) {
        $id = $request->get('id');
        $name = $request->get('name');
        $date = $request->get('date');
        $status = $request->get('status');
        $option = $request->get('option');

        // add new cate
        if ($option == 1) {
            $query = DB::connection('sqlsrvTransport')
                ->insert('insert into category (name, date_created, active) values (?, ?, ?)', [$name, $date, $status]);
            return $query;
        }

        // show old value cates
        if ($option == 2) {
            $query = DB::connection('sqlsrvTransport')->table('category')
                ->select(['id', 'name', 'date_created', 'active'])
                ->where('id', '=', $id)
                ->first();
            return response()->json($query);
        }

        // update cates
        if ($option == 3) {
            $query = DB::connection('sqlsrvTransport')->table('category')
                ->where('id', $id)
                ->update(['name' => $name, 'date_created' => $date, 'active' => $status]);
            
            return $query;
        }

        // delete cate
        if ($option == 4) {
            $query = DB::connection('sqlsrvTransport')->table('category')->where('id', '=', $id)->delete();

            return $query;
        }

    }

    public function getType(Request $request) {
        $types = DB::connection('sqlsrvTransport')->table('type')
            ->select(['id', 'name', 'date_created', 'active'])
            ->orderBy('date_created', 'desc')
            ->paginate(50);

        return view('transports.CRUD.type', compact('types'));
    }

    public function activeType(Request $request) {
        $id = $request->get('id');
        $name = $request->get('name');
        $date = $request->get('date');
        $status = $request->get('status');
        $option = $request->get('option');

        // add new type
        if ($option == 1) {
            $query = DB::connection('sqlsrvTransport')
                ->insert('insert into type (name, date_created, active) values (?, ?, ?)', [$name, $date, $status]);
            return $query;
        }

        // show old value type
        if ($option == 2) {
            $query = DB::connection('sqlsrvTransport')->table('type')
                ->select(['id', 'name', 'date_created', 'active'])
                ->where('id', '=', $id)
                ->first();
            return response()->json($query);
        }

        // update type
        if ($option == 3) {
            $query = DB::connection('sqlsrvTransport')->table('type')
                ->where('id', $id)
                ->update(['name' => $name, 'date_created' => $date, 'active' => $status]);
            
            return $query;
        }

        // delete type
        if ($option == 4) {
            $query = DB::connection('sqlsrvTransport')->table('type')->where('id', '=', $id)->delete();

            return $query;
        }

    }

    public function getVehicle(Request $request) {
        $parent_id = $request->get('parent_id');
        $parent_name = $request->get('parent_name');

        if (!isset($parent_id)) {
            $vehicles = DB::connection('sqlsrvTransport')->table('vehicles')
                ->select(['id', 'vehicles', 'date_created', 'active'])
                ->whereNull('parent_id')
                ->orderBy('date_created', 'desc')
                ->get();

            $data_drop_down = $request->get('data_drop_down');
            if ($data_drop_down == true) {
                return response()->json($vehicles);
            }
            return view('transports.CRUD.vehicle', compact('parent_id', 'parent_name', 'vehicles'));
        }

        $vehicles = DB::connection('sqlsrvTransport')->table('vehicles')
            ->select(['vehicles.id as id', 'vehicles.vehicles as vehicles', 'vehicles.type_vehicle as type_vehicle', 'vehicles.parent_id as parent_id', 'v.vehicles as parent_name', 'vehicles.date_created as date_created', 'vehicles.active as active'])
            ->leftJoin('vehicles as v', 'vehicles.parent_id', '=', 'v.id')
            ->where('vehicles.parent_id', '=', $parent_id)
            ->whereNotNull('vehicles.parent_id')
            ->orderBy('date_created', 'desc')
            ->get();

        return view('transports.CRUD.vehicle', compact('parent_id', 'parent_name', 'vehicles'));

    }

    public function activeVehicle(Request $request) {
        $id = $request->get('id');
        $vehicles = $request->get('name');
        $type_vehicle = $request->get('type_vehicle');
        $parent_id = $request->get('parent_id');
        $date = $request->get('date');
        $status = $request->get('status');
        $option = $request->get('option');

        // add new vendor
        if ($option == 1) {
            $query = DB::connection('sqlsrvTransport')
                ->insert('insert into vehicles (vehicles, date_created, active) values (?, ?, ?)', [$vehicles, $date, $status]);
            return $query;
        }

        // add new model
        if ($option == 2) {
            $query = DB::connection('sqlsrvTransport')
                ->insert('insert into vehicles (vehicles, type_vehicle, parent_id, date_created, active) values (?, ?, ?, ?, ?)', [$vehicles, $type_vehicle, $parent_id, $date, $status]);
            return $query;
        }

        // show old value vendor
        if ($option == 3) {
            $query = DB::connection('sqlsrvTransport')->table('vehicles')
                ->select(['id', 'vehicles', 'date_created', 'active'])
                ->where('id', '=', $id)
                ->first();
            return response()->json($query);
        }

        // show old value model
        if ($option == 4) {
            $query = DB::connection('sqlsrvTransport')->table('vehicles')
                ->select(['id', 'vehicles', 'type_vehicle', 'parent_id', 'date_created', 'active'])
                ->where('id', '=', $id)
                ->first();
            return response()->json($query);
        }

        // update vendor
        if ($option == 5) {
            $query = DB::connection('sqlsrvTransport')->table('vehicles')
                ->where('id', $id)
                ->update(['vehicles' => $vehicles, 'date_created' => $date, 'active' => $status]);
            
            return $query;
        }

        // update model
        if ($option == 6) {
            $query = DB::connection('sqlsrvTransport')->table('vehicles')
                ->where('id', $id)
                ->update(['vehicles' => $vehicles, 'type_vehicle' => $type_vehicle, 'parent_id' => $parent_id, 'date_created' => $date, 'active' => $status]);
            
            return $query;
        }

        // delete vendor
        if ($option == 7) {
            $query = DB::connection('sqlsrvTransport')->table('vehicles')->where('id', '=', $id)->delete();

            return $query;
        }

        // delete vendor
        if ($option == 8) {
            $query = DB::connection('sqlsrvTransport')->table('vehicles')->where('id', '=', $id)->delete();

            return $query;
        }

    }

    public function getRadius(Request $request) {
        $query = DB::connection('sqlsrvTransport')->table('radius')
            ->select(['id', 'radius'])
            ->get();

        return view('transports.CRUD.radius', compact('query'));
    }

    public function updateRadius(Request $request) {
        $radius = $request->get('radius');
        
        $query = DB::connection('sqlsrvTransport')->table('radius')
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
    public function edit()
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
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
