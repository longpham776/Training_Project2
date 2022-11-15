<?php

namespace App\Http\Controllers;

use App\Models\mst_model_v2;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Solarium\Client;

class SolrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $adapter = new \Solarium\Core\Client\Adapter\Curl();

        // $eventDispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();

        // $options = ['endpoint' => [
        //     'localhost' => [
        //         'host' => 'localhost',
        //         'port' => 8983,
        //         'path' => '/',
        //         'core' => 'mst_model_v2',
        //     ]
        // ]];

        // $client = new Client($adapter, $eventDispatcher, $options);

        // // $query = $client->createSelect();

        // // $query->setQuery('model_code:(1 or 2)');

        // // $resultSet = $client->execute($query);

        // // dd($resultSet);

        // $update = $client->createUpdate();

        // $doc = $update->createDocument();

        // $arrDoc = [];

        // $arrTag = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

        // mst_model_v2::chunk(1000, function ($modelV2) use ($doc, $arrTag, $arrDoc, $update, $client) {

        //     foreach ($modelV2 as $model) {

        //         $tempDoc = clone $doc;

        //         $tempDoc->model_code = $model->model_code;

        //         $tempDoc->model_maker_code = $model->model_maker_code;

        //         $tempDoc->model_name = $model->model_name;

        //         $tempDoc->model_displacement = $model->model_displacement;

        //         $tempDoc->model_image_url = $model->model_image_url;

        //         $tempDoc->model_name_prefix = $model->model_name_prefix;

        //         $tempDoc->model_kana_prefix = $model->model_kana_prefix;

        //         $tempDoc->model_count = $model->model_count;

        //         $tempDoc->model_kakaku_min = $model->model_kakaku_min;

        //         $tempDoc->model_kakaku_max = $model->model_kakaku_max;

        //         $tempDoc->tag = Arr::random($arrTag, 10);

        //         array_push($arrDoc, $tempDoc);
        //     }

        //     $update->addDocuments($arrDoc);

        //     $update->addCommit();

        //     $result = $client->update($update);
        // });
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
