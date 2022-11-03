<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_category_maker extends Model
{
    use HasFactory;

    protected $table = 'tbl_category_maker';

    public function scopeMakerCode($query, $categoryCode, $categoryType){
        return $query->select('maker_code')
        ->where('category_code', $categoryCode)
        ->where('category_type', $categoryType);
    }
}
