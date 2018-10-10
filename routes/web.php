<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/', function () {
    return view('welcome');
});



//Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware' => 'admin'], function (){
//    Route::get('/', 'DashboardController@index');
//    Route::resource('/categories', 'CategoriesController');
//    Route::resource('/tags', 'TagsController');
//    Route::resource('/users', 'UsersController');
//    Route::resource('/posts', 'PostsController');
//    Route::get('/comments', 'CommentsController@index');
//    Route::get('/comments/toggle/{id}', 'CommentsController@toggle');
//    Route::delete('/comments/{id}/destroy', 'CommentsController@destroy')->name('comments.destroy');
//    Route::resource('/subscribers', 'SubscribersController');
//});

//Route::get('locale/{locale?}', function ($locale){
//    Session::put('locale', $locale);
//    return redirect()->back();
//});

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function()
{
    Route::get('/', function () { return view('welcome');});
        Route::group([
            'prefix'    => 'admin',
            'namespace' => 'Admin'
        ], function (){
            Route::get('/', 'DashboardController@index')->name('admin');
            Route::resource('/video_collections', 'VideoCollectionsController');
            Route::resource('/image_categories', 'ImageCategoriesController');
            Route::resource('/images', 'ImagesController');
            Route::resource('/languages', 'LanguagesController');
            Route::resource('/countries', 'CountriesController');
            Route::resource('/id_documents', 'InfIdDocumentsController');
            Route::resource('/introduction_points', 'InfIntroductionPointsController');
            Route::resource('/introductions', 'InfIntroductionsController');
            Route::resource('/inf_plan_phases', 'InfPlanPhasesController');
            Route::resource('/inf_plan_phase_sections', 'InfPlanPhaseSectionsController');
            Route::resource('/inf_plan_phase_section_points', 'InfPlanPhaseSectionPointsController');
            Route::resource('/inf_video_groups', 'InfVideoGroupsController');
            Route::resource('/inf_video_group_sections', 'InfVideoGroupSectionsController');
            Route::resource('/inf_videos', 'InfVideosController');
        });
});
