<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMerchantRequest;
use App\Http\Requests\UpdateMerchantRequest;
use App\Models\Merchant;
use Auth;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Merchant $merchant
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Merchant $merchant)
    {
        $merchants = $merchant->paginate($request->limit);
        return response()->api($merchants);
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
     * @param  \App\Http\Requests\StoreMerchantRequest  $request
     * @param \App\Models\Merchant $merchant
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMerchantRequest $request, Merchant $merchant)
    {
        $merchant = $this->fillFromRequest($merchant, $request);
        $merchant->save();
        return response()->api('create merchant success');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Merchant $merchant
     * @return \Illuminate\Http\Response
     */
    public function show(Merchant $merchant)
    {
        return response()->api($merchant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMerchantRequest  $request
     * @param  \App\Models\Merchant $merchant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMerchantRequest $request, Merchant $merchant)
    {
        $merchant = $this->fillFromRequest($merchant, $request);
        $merchant->save();
        return response()->api('update merchant success');
    }

    /**
     * Fill Data From request to Merchant
     *
     * @param \App\Models\Merchant $merchant
     * @param \Illuminate\Http\Request $request
     * @return \App\Models\Merchant $merchant
     */
    public function fillFromRequest(Merchant $merchant, Request $request)
    {
        $merchant->name = $request->name;
        $merchant->country = $request->country;
        $merchant->image_url = empty($request->image_url)? '': $request->image_url;
        $merchant->has_aff = $request->has_aff;
        if($request->isMethod('post'))  // create 方法设置默认状态
        {
            $merchant->status = 'active';
        }
        $merchant->dst_url = $request->dst_url;
        $merchant->url_name = $request->url_name;
        $merchant->facebook_url = empty($request->facebook_url)? '': $request->facebook_url;
        $merchant->important_order = $request->important_order;
        $merchant->description = empty($request->description)? '': $request->description;
        $merchant->user_id = Auth::id();
        return $merchant;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
