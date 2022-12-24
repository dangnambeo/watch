<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public function bill(){
        return $this->belongsTo(bill::class,'id');
    }
    public function product(){
        return $this->belongsTo(products::class,'id');
    }
}
