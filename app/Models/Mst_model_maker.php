<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mst_model_maker extends Model
{
    use HasFactory;

    protected $table = 'mst_model_maker';

    protected $primaryKey = 'model_maker_code';

    public function scopeMakerName($query, $category)
    {
        return $query->selectRaw(
            'mst_model_maker.model_maker_code, 
            IFNULL( SUM(v2.model_count),0) AS model_count,
            mst_model_maker.model_maker_hyouji'
        )->leftJoin('mst_model_v2 as v2', 'mst_model_maker.model_maker_code', '=', 'v2.model_maker_code')
            ->where($category["colmn"], 1)
            ->whereIn('v2.model_maker_code', tbl_category_maker::makerCode($category["code"], $category["type"]))
            ->groupBy('model_maker_code')
            ->orderBy('model_maker_select_view_no');
    }
}
