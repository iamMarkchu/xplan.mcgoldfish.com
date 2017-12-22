<?php
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['auth:api']], function(){
    Route::get('/user', function(Request $request){
        return $request->user();
    });
    Route::post('/user/logout', function(){
        echo 'logout success';
    });
});

Route::group(['namespace' => 'Admin', 'middleware' => ['auth:api']], function(){
    Route::resources([
        'merchant' => 'MerchantController',
        'coupon' => 'CouponController',
    ]);
    Route::post('upload', function(Request $request){
        $path = $request->file('uploadFile')->store('public/image');
        return Storage::url($path);
    });
    Route::delete('upload', function(Request $request){
        echo $request->uploadFile;
    });
});
