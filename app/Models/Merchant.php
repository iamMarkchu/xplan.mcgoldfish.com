<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function coupons()
    {
        return $this->hasMany('App\Models\Coupon');
    }
}
