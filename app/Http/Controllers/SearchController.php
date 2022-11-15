<?php

namespace App\Http\Controllers;

use App\Enum\MotoCategory;
use App\Enum\MotoChar;
use App\Enum\MotoDisplacement;
use App\Models\Mst_model_maker;
use App\Models\mst_model_v2;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use Faker\Generator as Faker;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();

        if ((!isset($params['btype']) && !isset($params['ctype'])) || (isset($params['btype']) && isset($params['ctype']))) {
            return abort(404, "Page not found");
        }

        $motoCategory = '';

        $urlResetPage = '';

        if (isset($params['btype'])) {
            try {
                $urlResetPage = url()->current() . '/?btype=' . $params['btype'];

                $motoCategory = MotoCategory::getMotoCategory($params['btype'], 1);
            } catch (Exception $e) {
                return abort(404, "Page not found");
            }
        }

        if (isset($params['ctype'])) {
            try {
                $urlResetPage = url()->current() . '/?ctype=' . $params['ctype'];

                $motoCategory = MotoCategory::getMotoCategory($params['ctype'], 2);
            } catch (Exception) {
                return abort(404, "Page not found");
            }
        }

        $categoryEnum = $motoCategory;

        $motorBikes = mst_model_v2::column($motoCategory["colmn"])->hasBikes();

        $totalModelBike = '';

        $kanaHasBikes = clone $motorBikes;
        $kanaHasBikes = $kanaHasBikes->select("model_kana_prefix")->groupBy("model_kana_prefix")->pluck("model_kana_prefix")->toArray();

        $nameHasBikes = clone $motorBikes;
        $nameHasBikes = $nameHasBikes->select("model_name_prefix")->groupBy("model_name_prefix")->pluck("model_name_prefix")->toArray();

        $displaceHasBikes = clone $motorBikes;
        $displaceHasBikes = $displaceHasBikes->select("model_displacement")->groupBy("model_displacement")->pluck("model_displacement")->toArray();

        $makerHasBikes = clone $motorBikes;
        $makerHasBikes = $makerHasBikes->select("model_maker_code")->groupBy("model_maker_code")->pluck("model_maker_code")->toArray();

        if (isset($params['kana'])) {
            $kanaChar = MotoChar::getCodeByKey($params["kana"]);
            $motorBikes->kanaPrefix($kanaChar);
        } else if (isset($params['name'])) {
            $nameChar = MotoChar::getCodeByKey($params["name"]);
            $motorBikes->namePrefix($nameChar);
        }

        if (isset($params["displace"])) {
            $categoryEnum = MotoDisplacement::getMotoDisplacementByKey($params["displace"]);
            $motorBikes->displacement($categoryEnum['from'], $categoryEnum['to']);
        }

        if (isset($params["maker"])) {
            $motorBikes->maker($params["maker"]);
        }

        $motoKana = array_slice(MotoChar::getAllKeysAndValues(), 0, 10);
        $motoKana = collect($motoKana)->map(function ($kana, $key) use ($params, $kanaHasBikes) {

            unset($params["name"]);

            $arrUrl = array(
                "kana" => $kana->key
            );

            $pathName = http_build_query(array_merge($params, $arrUrl));

            $kana->url    = url()->current() . '/?' . $pathName;
            $kana->enable = "disabled";
            $kana->select = "";

            if (in_array($kana->code, $kanaHasBikes)) {
                $kana->enable = "enabled";
            }

            if (isset($params['kana']) && $params["kana"] == $kana->key) {
                $kana->select = "active";
            }

            return $kana;
        })->toArray();

        $motoName = array_slice(MotoChar::getAllKeysAndValues(), 10);
        $motoName = collect($motoName)->map(function ($name, $key) use ($params, $nameHasBikes) {

            $name->enable = "disabled";
            $name->select = "";

            if (in_array($name->code, $nameHasBikes)) {
                $name->enable = "enabled";
            }

            if (!isset($params["kana"]) && isset($params["name"]) && $params["name"] == $name->key) {
                $name->select = "active";
            }

            unset($params["kana"]);

            $arrUrl = array(
                "name" => $name->key
            );

            $pathName = http_build_query(array_merge($params, $arrUrl));

            $name->url = url()->current() . '/?' . $pathName;

            return $name;
        })->toArray();

        $motoDisplacement = MotoDisplacement::getAllKeysAndValues();
        $motoDisplacement = collect($motoDisplacement)->map(function ($displace, $key) use ($params, $displaceHasBikes) {

            $arrUrl = array(
                "displace" => $displace->key
            );

            $pathName = http_build_query(array_merge($params, $arrUrl));

            $displace->url    = url()->current() . '/?' . $pathName;
            $displace->select = "";

            $displaceCheck = collect($displaceHasBikes)->search(function ($item, $key) use ($displace) {
                return $item >= $displace->from && $item <= $displace->to;
            });

            $displace->enable = $displaceCheck === false ? "disabled" : "enabled";

            if (isset($params["displace"]) && $params["displace"] == $displace->key) {
                $displace->select = "active";
            }

            return $displace;
        })->toArray();

        $makerName = Mst_model_maker::makerName($motoCategory)->get();
        $makerName = $makerName->map(function ($maker, $key) use ($params, $makerHasBikes) {

            $arrUrl = array(
                "maker" => $maker->model_maker_code
            );

            $pathName = http_build_query(array_merge($params, $arrUrl));

            $maker->url    = url()->current() . '/?' . $pathName;
            $maker->enable = "disabled";
            $maker->select = "";

            if (in_array($maker->model_maker_code, $makerHasBikes)) {
                $maker->enable = "enabled";
            }

            if (isset($params["maker"]) && $params["maker"] == $maker->model_maker_code) {
                $maker->select = "active";
            }

            return $maker;
        });

        if ($request->ajax()) {
            $motorBikes = $motorBikes->paginate(40);
            
            return response()->json([
                'html' => view('ajaxListMotorBikes', compact('motorBikes'))->render(),
                'moto' => $motorBikes
            ]);
        }

        $params = json_encode($params);

        $totalModelBike = (clone $motorBikes)->countModelSumBike()->first();

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
            'motoCategory',
            'urlResetPage'
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
