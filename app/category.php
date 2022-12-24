<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'id';
    public function products(){
        return $this->hasMany(products::class,'cate_id');
    }
}
