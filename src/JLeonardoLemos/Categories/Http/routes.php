<?php

/*
|--------------------------------------------------------------------------
| Module Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for the module.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::pattern('categories', '\d+');

Route::group(['middleware' => 'permission'], function () {
    Route::group(['prefix' => 'admin'], function () {
        
        Route::get('categories/{page}'
            , ['uses' => 'CategoriesBackendController@index'
                , 'as' => 'admin.categories.pagination']);
        
        Route::post('categories/massDestroy'
            , ['uses' => 'CategoriesBackendController@massDestroy'
                , 'as' => 'admin.categories.massDestroy']);
        
        Route::get('categories/{groupSlug}'
            , ['uses' => 'CategoriesBackendController@index'
                , 'as' => 'admin.categories.index']);
        
        Route::get('categories/create/{groupSlug}'
            , ['uses' => 'CategoriesBackendController@create'
                , 'as' => 'admin.categories.create']);  
        
        Route::post('categories'
            , ['uses' => 'CategoriesBackendController@store'
                , 'as' => 'admin.categories.store']);  
        
        Route::get('categories/{categories}'
            , ['uses' => 'CategoriesBackendController@show'
                , 'as' => 'admin.categories.show']);  
        
        Route::get('categories/{categories}/edit'
            , ['uses' => 'CategoriesBackendController@edit'
                , 'as' => 'admin.categories.edit']);   
        
        Route::put('categories/{categories}'
            , ['uses' => 'CategoriesBackendController@update'
                , 'as' => 'admin.categories.update']);
        
        Route::delete('categories/{categories}'
            , ['uses' => 'CategoriesBackendController@destroy'
                , 'as' => 'admin.categories.destroy']);           
    });
});

/*

|        | GET|HEAD                       | admin/categories                                      | admin.categories.index              | App\Modules\Categories\Http\Controllers\CategoriesBackendController@index                 | permission |
|        | GET|HEAD                       | admin/categories/create                               | admin.categories.create             | App\Modules\Categories\Http\Controllers\CategoriesBackendController@create                | permission |
|        | POST                           | admin/categories                                      | admin.categories.store              | App\Modules\Categories\Http\Controllers\CategoriesBackendController@store                 | permission |
|        | GET|HEAD                       | admin/categories/{categories}                         | admin.categories.show               | App\Modules\Categories\Http\Controllers\CategoriesBackendController@show                  | permission |
|        | GET|HEAD                       | admin/categories/{categories}/edit                    | admin.categories.edit               | App\Modules\Categories\Http\Controllers\CategoriesBackendController@edit                  | permission |
|        | PUT                            | admin/categories/{categories}                         | admin.categories.update             | App\Modules\Categories\Http\Controllers\CategoriesBackendController@update                | permission |
|        | PATCH                          | admin/categories/{categories}                         |                                     | App\Modules\Categories\Http\Controllers\CategoriesBackendController@update                | permission |
|        | DELETE                         | admin/categories/{categories}                         | admin.categories.destroy            | App\Modules\Categories\Http\Controllers\CategoriesBackendController@destroy               | permission |

 * 
 *  */

