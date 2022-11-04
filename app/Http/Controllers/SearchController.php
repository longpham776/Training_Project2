<?php

namespace App\Http\Controllers;

use App\Enum\MotoCategory;
use App\Enum\MotoChar;
use App\Enum\MotoDisplacement;
use App\Models\Mst_model_maker;
use App\Models\mst_model_v2;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $makerName = Mst_model_maker::makerNameAll()->get();

        $categoryEnum = '';

        $totalModelBike = mst_model_v2::countModelSumBikeAll()->first();

        $params = '';

        $kana = 1;

        $name = 2;

        $motoKana = array_slice(MotoChar::getAllKeysAndValues(), 0, 10);

        $motoName = array_slice(MotoChar::getAllKeysAndValues(), 10);

        $motoDisplacement = MotoDisplacement::getAllKeysAndValues();

        $motorBikes = mst_model_v2::hasBikes();

        $motoCategory = array_slice(MotoCategory::getAllKeysAndValues(), 0, 28);

        $motoCategory = collect($motoCategory)->map(function ($category, $key) {

            $countModelCategory = mst_model_v2::countModelAllColumn($category->colmn)->first();

            if (!$countModelCategory->total_model) {

                $category->enabled = false;

                return $category;
            }

            $category->enabled = true;

            return $category;
        })->toArray();

        if ($request->no && $request->type) {

            $categoryEnum = MotoCategory::getMotoCategory($request->no, $request->type);

            $totalModelBike = mst_model_v2::countModelSumBike($categoryEnum['colmn'])->first();

            $motorBikes->kanaNamePrefix($categoryEnum['colmn']);

            $makerName = Mst_model_maker::makerName($categoryEnum['colmn'], $request->no, $request->type)->get();
        }

        if ($request->key) {

            $categoryEnum = MotoDisplacement::getMotoDisplacementByKey($request->key);

            $totalModelBike = mst_model_v2::countModelSumBikeByKey($categoryEnum['from'], $categoryEnum['to'])->first();

            $motorBikes->displacement($categoryEnum['from'], $categoryEnum['to']);
        }

        if ($request->maker) {

            $motorBikes->maker($request->maker);
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
            'motoCategory'
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
