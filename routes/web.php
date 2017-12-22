<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
Auth::routes();
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/', function(){
        return view('admin');
    });
    Route::post('upload', function(Request $request){
        $path = $request->file('uploadFile')->store('public/image');
        return Storage::url($path);
    });
    Route::resource('merchant', 'MerchantController');
});

Route::get('/', function(){
    return response()->api('mark');
});
