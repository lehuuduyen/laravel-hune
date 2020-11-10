<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $keyword = $request->get('search');

        $prices = DB::connection('sqlsrvAds')->table('ads_transaction_promotion')
            ->select('ads_transaction_promotion.id', 'ads_transaction_promotion.post_id', 'ads.price')
            ->leftJoin('ads', 'ads.id', '=', 'ads_transaction_promotion.ads_id')
            ->get();

        if (!empty($keyword)) {
            $posts = DB::connection('sqlsrvPromotion')->table('post')
            ->select(['id', 'user_id', 'title', 'date_created', 'status', 'image'])
            ->where(function ($query) use ($keyword) {
                if (is_numeric($keyword)) {
                    $query->orwhere('id', 'LIKE', "%$keyword%");
                } else {
                    $query->orwhere('title', 'LIKE', '%'.$keyword.'%');
                }
                
            })
            ->orderBy('date_created', 'desc')
            ->paginate(50);

            return view('promotions.index', compact('posts', 'prices'));
        }

        $posts = DB::connection('sqlsrvPromotion')->table('post')
            ->select(['id', 'user_id', 'title', 'date_created', 'status', 'image'])
            ->orderBy('date_created', 'desc')
            ->paginate(50);

        return view('promotions.index', compact('posts', 'prices'));
    }

    public function updateStatus(Request $request)
    {
        $id = $request->get('id');
        $status = $request->get('status');
        $status = $status == 1 ? 0 : 1;
        $changeStatus = DB::connection('sqlsrvPromotion')->table('post')
            ->where('id', $id)
            ->update(['status' => $status]);

        return $changeStatus;
    }

    public function getCate(Request $request) {
        $cates = DB::connection('sqlsrvPromotion')->table('category')
            ->select(['id', 'name', 'date_created', 'active'])
            ->orderBy('date_created', 'desc')
            ->get();

        return view('promotions.CRUD.cate', compact('cates'));
    }

    public function activeCate(Request $request) {
        $id = $request->get('id');
        $name = $request->get('name');
        $date = $request->get('date');
        $status = $request->get('status');
        $option = $request->get('option');

        // add new cate
        if ($option == 1) {
            $query = DB::connection('sqlsrvPromotion')
                ->insert('insert into category (name, date_created, active) values (?, ?, ?)', [$name, $date, $status]);
            return $query;
        }

        // show old value cates
        if ($option == 2) {
            $query = DB::connection('sqlsrvPromotion')->table('category')
                ->select(['id', 'name', 'date_created', 'active'])
                ->where('id', '=', $id)
                ->first();
            return response()->json($query);
        }

        // update cates
        if ($option == 3) {
            $query = DB::connection('sqlsrvPromotion')->table('category')
                ->where('id', $id)
                ->update(['name' => $name, 'date_created' => $date, 'active' => $status]);
            
            return $query;
        }

        // delete cate
        if ($option == 4) {
            $query = DB::connection('sqlsrvPromotion')->table('category')->where('id', '=', $id)->delete();

            return $query;
        }

    }

    public function getPostReport(Request $request)
    {
        $keyword = $request->get('search');

        if (!empty($keyword)) {
            $posts = DB::connection('sqlsrvPromotion')->table('post_report')
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

            return view('promotions.postReport', compact('posts'));
        }

        $posts = DB::connection('sqlsrvPromotion')->table('post_report')
            ->select(['post_report.post_id', 'post.title as title', 'type_report.name as name', 'post_report.type_report_id'])
            ->leftJoin('post', 'post.id', '=', 'post_report.post_id')
            ->leftJoin('type_report', 'type_report.id', '=', 'post_report.type_report_id')
            ->where('post.status', '1')
            //->orderBy('post_report.id', 'desc')
            ->distinct()
            ->paginate(50);

        return view('promotions.postReport', compact('posts'));
    }

    public function getReport(Request $request) {
        $reports = DB::connection('sqlsrvPromotion')->table('type_report')
            ->select(['id', 'name', 'date_created', 'active'])
            ->orderBy('date_created', 'desc')
            ->paginate(50);

        return view('promotions.CRUD.report', compact('reports'));
    }

    public function activeReport(Request $request) {
        $id = $request->get('id');
        $name = $request->get('name');
        $date = $request->get('date');
        $status = $request->get('status');
        $option = $request->get('option');

        // add new report
        if ($option == 1) {
            $query = DB::connection('sqlsrvPromotion')
                ->insert('insert into type_report (name, date_created, active) values (?, ?, ?)', [$name, $date, $status]);
            return $query;
        }

        // show old value reports
        if ($option == 2) {
            $query = DB::connection('sqlsrvPromotion')->table('type_report')
                ->select(['id', 'name', 'date_created', 'active'])
                ->where('id', '=', $id)
                ->first();
            return response()->json($query);
        }

        // update reports
        if ($option == 3) {
            $query = DB::connection('sqlsrvPromotion')->table('type_report')
                ->where('id', $id)
                ->update(['name' => $name, 'date_created' => $date, 'active' => $status]);
            
            return $query;
        }

        // delete report
        if ($option == 4) {
            $query = DB::connection('sqlsrvPromotion')->table('type_report')->where('id', '=', $id)->delete();

            return $query;
        }

    }

    public function show($id)
    {
        $post = DB::connection('sqlsrvPromotion')
            ->table('post')
            ->where('id', $id)
            ->first();
        $photo = DB::connection('sqlsrvPromotion')
            ->table('photo')
            ->select('image')
            ->where('post_id', $id)
            ->first();
        $count_rp = DB::connection('sqlsrvPromotion')->table('post_report')
            ->select('type_report.name as name', DB::connection('sqlsrvPromotion')->table('type_report')->raw('COUNT(type_report.name) as number'))
            ->leftJoin('post', 'post.id', '=', 'post_report.post_id')
            ->leftJoin('type_report', 'type_report.id', '=', 'post_report.type_report_id')
            ->where('post_report.post_id', $id)
            ->groupBy('type_report.name')
            // ->orderBy('type_report.name as name', 'desc')
            ->get();
        // dd($count_rp);

        return view('promotions.detail', compact('post', 'photo', 'count_rp'));
    }

    public function showDetailReport(Request $request, $id)
    {
        $keyword = $request->get('search');

        if (!empty($keyword)) {
            $posts = DB::connection('sqlsrvPromotion')->table('post_report')
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

            return view('promotions.detailReport', compact('posts', 'id'));
        }

        $posts = DB::connection('sqlsrvPromotion')->table('post_report')
            ->select(['post_report.post_id', 'post.title as title', 'type_report.name as name', 'post_report.type_report_id'])
            ->leftJoin('post', 'post.id', '=', 'post_report.post_id')
            ->leftJoin('type_report', 'type_report.id', '=', 'post_report.type_report_id')
            ->where('post_report.type_report_id', $id)
            //->orderBy('post_report.id', 'desc')
            ->distinct()
            ->paginate(50);

        return view('promotions.detailReport', compact('posts', 'id'));
    }

    public function getType(Request $request) {
        $types = DB::connection('sqlsrvPromotion')->table('type')
            ->select(['id', 'name', 'date_created', 'active'])
            ->orderBy('date_created', 'desc')
            ->get();

        return view('promotions.CRUD.type', compact('types'));
    }

    public function activeType(Request $request) {
        $id = $request->get('id');
        $name = $request->get('name');
        $date = $request->get('date');
        $status = $request->get('status');
        $option = $request->get('option');

        // add new type
        if ($option == 1) {
            $query = DB::connection('sqlsrvPromotion')
                ->insert('insert into type (name, date_created, active) values (?, ?, ?)', [$name, $date, $status]);
            return $query;
        }

        // show old value type
        if ($option == 2) {
            $query = DB::connection('sqlsrvPromotion')->table('type')
                ->select(['id', 'name', 'date_created', 'active'])
                ->where('id', '=', $id)
                ->first();
            return response()->json($query);
        }

        // update type
        if ($option == 3) {
            $query = DB::connection('sqlsrvPromotion')->table('type')
                ->where('id', $id)
                ->update(['name' => $name, 'date_created' => $date, 'active' => $status]);
            
            return $query;
        }

        // delete type
        if ($option == 4) {
            $query = DB::connection('sqlsrvPromotion')->table('type')->where('id', '=', $id)->delete();
            return $query;
        }

    }

    public function getRadius(Request $request) {
        $query = DB::connection('sqlsrvPromotion')->table('radius')
            ->select(['id', 'radius'])
            ->get();

        return view('promotions.CRUD.radius', compact('query'));
    }

    public function updateRadius(Request $request) {
        $radius = $request->get('radius');
        
        $query = DB::connection('sqlsrvPromotion')->table('radius')
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
     * @param  \App\RealEstate  $realEstate
     * @return \Illuminate\Http\Response
     */

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