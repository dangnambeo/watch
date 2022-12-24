<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class custormer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id';
    public function bill(){
        return $this ->belongsTo(bill::class,'customer_id');
    }
}
