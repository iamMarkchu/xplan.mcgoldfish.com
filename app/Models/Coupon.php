<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $guarded = [];

    public function merchant()
    {
        return $this->belongsTo('App\Models\Merchant');
    }
}
