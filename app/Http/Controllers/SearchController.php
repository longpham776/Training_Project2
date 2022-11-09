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

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->btype && !$request->ctype) {

            return abort(404, "Page not found");
        }

        if ($request->btype && $request->ctype) {

            return abort(404, "Page not found");
        }

        $motoCategory = '';

        $urlResetPage = '';

        if ($request->btype) {
            try {

                $urlResetPage = url()->current().'/?btype='.$request->btype;

                $motoCategory = MotoCategory::getMotoCategory($request->btype, 1);
            } catch (Exception) {

                return abort(404, "Page not found");
            }
        }

        if ($request->ctype) {
            try {

                $urlResetPage = url()->current().'/?ctype='.$request->ctype;

                $motoCategory = MotoCategory::getMotoCategory($request->ctype, 2);
            } catch (Exception) {

                return abort(404, "Page not found");
            }
        }

        $categoryEnum = $motoCategory;

        $totalModelBike = mst_model_v2::countModelSumBike($motoCategory["colmn"])->hasBikes();

        $params = $request->all();

        $motorBikes = mst_model_v2::column($motoCategory["colmn"])->hasBikes();

        $kanaHasBikes = clone $motorBikes;

        $kanaHasBikes = $kanaHasBikes->select("model_kana_prefix")->groupBy("model_kana_prefix")->pluck("model_kana_prefix")->toArray();

        $nameHasBikes = clone $motorBikes;

        $nameHasBikes = $nameHasBikes->select("model_name_prefix")->groupBy("model_name_prefix")->pluck("model_name_prefix")->toArray();

        $displaceHasBikes = clone $motorBikes;

        $displaceHasBikes = $displaceHasBikes->select("model_displacement")->groupBy("model_displacement")->pluck("model_displacement")->toArray();

        $makerHasBikes = clone $motorBikes;

        $makerHasBikes = $makerHasBikes->select("model_maker_code")->groupBy("model_maker_code")->pluck("model_maker_code")->toArray();

        if ($request->kana) {

            $kanaChar = MotoChar::getCodeByKey($request->kana);

            $motorBikes->kanaPrefix($kanaChar);

            $totalModelBike->kanaPrefix($kanaChar);
        }

        if ($request->name) {

            $nameChar = MotoChar::getCodeByKey($request->name);

            $motorBikes->namePrefix($nameChar);

            $totalModelBike->namePrefix($nameChar);
        }

        if ($request->displace) {

            $categoryEnum = MotoDisplacement::getMotoDisplacementByKey($request->displace);

            $totalModelBike->displacement($categoryEnum['from'], $categoryEnum['to']);

            $motorBikes->displacement($categoryEnum['from'], $categoryEnum['to']);
        }

        if ($request->maker) {

            $totalModelBike->maker($request->maker);

            $motorBikes->maker($request->maker);
        }

        $motoKana = array_slice(MotoChar::getAllKeysAndValues(), 0, 10);

        $motoKana = collect($motoKana)->map(function ($kana, $key) use ($params, $kanaHasBikes) {

            unset($params["name"]);

            $arrUrl = array(

                "kana" => $kana->key
            );

            $pathName = http_build_query(array_merge($params, $arrUrl));

            $kana->url = url()->current() . '/?' . $pathName;

            $kana->enable = "disabled";

            $kana->select = "";

            if (in_array($kana->code, $kanaHasBikes)) {

                $kana->enable = "enabled";
            }

            if (request("kana") && $params["kana"] == $kana->key) {

                $kana->select = "active";
            }

            return $kana;
        })->toArray();

        $motoName = array_slice(MotoChar::getAllKeysAndValues(), 10);

        $motoName = collect($motoName)->map(function ($name, $key) use ($params, $nameHasBikes) {

            unset($params["kana"]);

            $arrUrl = array(

                "name" => $name->key
            );

            $pathName = http_build_query(array_merge($params, $arrUrl));

            $name->url = url()->current() . '/?' . $pathName;

            $name->enable = "disabled";

            $name->select = "";

            if (in_array($name->code, $nameHasBikes)) {

                $name->enable = "enabled";
            }

            if (request("name") && $params["name"] == $name->key) {

                $name->select = "active";
            }

            return $name;
        })->toArray();

        $motoDisplacement = MotoDisplacement::getAllKeysAndValues();

        $motoDisplacement = collect($motoDisplacement)->map(function ($displace, $key) use ($params, $displaceHasBikes) {

            $arrUrl = array(

                "displace" => $displace->key
            );

            $pathName = http_build_query(array_merge($params, $arrUrl));

            $displace->url = url()->current() . '/?' . $pathName;

            $displace->enable = "disabled";

            $displace->select = "";

            if (in_array($displace->to, $displaceHasBikes)) {

                $displace->enable = "enabled";
            }

            if (request("displace") && $params["displace"] == $displace->key) {

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

            $maker->url = url()->current() . '/?' . $pathName;

            $maker->enable = "disabled";

            $maker->select = "";

            if (in_array($maker->model_maker_code, $makerHasBikes)) {

                $maker->enable = "enabled";
            }

            if (request("maker") && $params["maker"] == $maker->model_maker_code) {

                $maker->select = "active";
            }

            return $maker;
        });

        if ($request->ajax()) {

            $motorBikes = $motorBikes->paginate(40);

            return view('ajaxListMotorBikes', compact('motorBikes'));
        }

        $params = json_encode($params);

        $motorBikes = $motorBikes->paginate(40);

        $totalModelBike = $totalModelBike->first();

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
