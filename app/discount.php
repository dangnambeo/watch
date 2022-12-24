<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class discount extends Model
{
    protected $table = 'discount';
    protected $primaryKey = 'id';
    protected function products(){
        return $this->hasOne(products::class,'id');
    }
}
