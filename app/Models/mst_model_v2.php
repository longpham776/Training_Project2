<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mst_model_v2 extends Model
{
    use HasFactory;

    protected $table = 'mst_model_v2';

    protected $primaryKey = 'model_code';

    public function scopeColumn($query, $column_name)
    {
        return $query->where($column_name, 1);
    }

    public function scopeKanaPrefix($query, $kana)
    {
        return $query->where('model_kana_prefix', $kana);
    }

    public function scopeNamePrefix($query, $name)
    {
        return $query->where('model_name_prefix', $name);
    }

    public function scopeMaker($query, $maker)
    {
        return $query->where('model_maker_code', $maker);
    }

    public function scopeDisplacement($query, $from, $to)
    {
        return $query->where('model_displacement', '>=', $from)
            ->where('model_displacement', '<=', $to);
    }

    public function scopeHasBikes($query)
    {
        return $query->where('model_count', '>', 0);
    }

    public function scopeCountModelSumBike($query)
    {
        return $query->selectRaw('COUNT(model_code) as total_model, SUM(model_count) as total_bike');
    }
}
