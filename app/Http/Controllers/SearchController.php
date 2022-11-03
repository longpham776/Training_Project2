<?php

namespace App\Http\Controllers;

use App\Enum\MotoCategory;
use App\Enum\MotoChar;
use App\Enum\MotoDisplacement;
use App\Models\Mst_model_maker;
use App\Models\mst_model_v2;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $models = mst_model_v2::get();

        $motoKana = array_slice(MotoChar::getAllKeysAndValues(), 0, 10);

        $motoName = array_slice(MotoChar::getAllKeysAndValues(), 10);

        $motoDisplacement = MotoDisplacement::getAllKeysAndValues();

        $motorBikes = mst_model_v2::hasBikes();

        $makerName = '';

        $categoryEnum = '';

        $totalModelBike = 0;

        $params = '';

        if ($request->no && $request->type) {

            $categoryEnum = MotoCategory::getMotoCategory($request->no, $request->type);

            $totalModelBike = mst_model_v2::countModelSumBike($categoryEnum['colmn'])->first();

            $motorBikes->kanaNamePrefix($categoryEnum['colmn']);

            $makerName = Mst_model_maker::makerName($categoryEnum['colmn'])->get();
        }

        if ($request->key) {

            $categoryEnum = MotoDisplacement::getMotoDisplacementByKey($request->key);

            $totalModelBike = mst_model_v2::countModelSumBikeByKey($categoryEnum['from'], $categoryEnum['to'])->first();

            $motorBikes->displacement($categoryEnum['from'], $categoryEnum['to']);
        }

        if ($request->ajax()) {

            $motorBikes = $motorBikes->paginate(40);

            return view('ajaxListMotorBikes', compact('motorBikes'));
        }

        $params = $request->all();

        $params = json_encode($params);

        $motorBikes = $motorBikes->paginate(40);

        return view('search-page', compact(
            'params',
            'motoKana',
            'motoName',
            'motoDisplacement',
            'makerName',
            'categoryEnum',
            'totalModelBike',
            'motorBikes',
        ));
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
}
