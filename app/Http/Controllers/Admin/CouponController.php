<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use Auth;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Coupon $coupon)
    {
        $coupons = $coupon->where('merchant_id', $request->merchant_id)->with('merchant')->paginate($request->limit);
        return response()->api($coupons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CouponRequest  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request, Coupon $coupon)
    {
        $data = array_merge($request->except(['merchant_name']), ['editor' => Auth::user()->name]);        
        $coupon->fill($data);
        $coupon->promo_code = empty($coupon->promo_code) ? '': $coupon->promo_code;
        $coupon->remark = empty($coupon->remark) ? '': $coupon->remark;
        $coupon->restrict = empty($coupon->restrict) ? '': $coupon->restrict;
        $coupon->save();
        return response()->api('create coupon success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        $coupon->merchant = $coupon->merchant;
        return response()->api($coupon);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CouponRequest  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(CouponRequest $request, Coupon $coupon)
    {
        $coupon->title = $request->title;
        $coupon->promo_type = $request->promo_type;
        $coupon->promo_code = empty($request->promo_code) ? '': $request->promo_code;
        $coupon->remark = empty($request->remark) ? '': $request->remark;
        $coupon->start_at = $request->start_at;
        $coupon->expire_at = $request->expire_at;
        $coupon->dst_url = $request->dst_url;
        $coupon->restrict = empty($request->restrict) ? '': $request->restrict;
        $coupon->editor = Auth::user()->name;
        $coupon->save();
        return response()->api('update coupon success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
}
