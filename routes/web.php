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


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function()
{
        Route::post('/', 'Auth\AuthController@register');
        Route::group([
            'namespace' => 'Information'
        ], function (){
            Route::get('/', 'HomeController@index');
            Route::post('/subscribe', 'InfSubscribersController@subscribe')->name('subscribe');
            Route::get('/verify/{token}', 'InfSubscribersController@verify')->name('subscribe.verify');
            /* videos */
            Route::get('/information/video/{slug}', 'VideosController@index');
            /* pages */
            Route::get('/information/{slug}', 'PagesController@index');
        });

        Route::group([
            'prefix'    => 'admin',
            'namespace' => 'Admin'
        ], function (){
            Route::get('/', 'DashboardController@index')->name('admin');
            Route::resource('/video_collections', 'VideoCollectionsController');
            Route::resource('/image_categories', 'ImageCategoriesController');
            Route::resource('/images', 'ImagesController');
            Route::resource('/languages', 'LanguagesController');
            Route::get('/languages/toggle/{id}', 'LanguagesController@toggle');
            Route::resource('/countries', 'CountriesController');
            Route::resource('/id_documents', 'InfIdDocumentsController');
            Route::resource('/introduction_points', 'InfIntroductionPointsController');
            Route::resource('/introductions', 'InfIntroductionsController');
            Route::resource('/inf_plan_phases', 'InfPlanPhasesController');
            Route::resource('/inf_plan_phase_sections', 'InfPlanPhaseSectionsController');
            Route::resource('/inf_plan_phase_section_points', 'InfPlanPhaseSectionPointsController');
            Route::get('/inf_plan_phase_section_points/toggle/{id}', 'InfPlanPhaseSectionPointsController@toggle');
            Route::resource('/inf_video_groups', 'InfVideoGroupsController');
            Route::resource('/inf_video_group_sections', 'InfVideoGroupSectionsController');
            Route::resource('/inf_videos', 'InfVideosController');
            Route::resource('/inf_pages', 'InfPagesController');
//            Route::get('/inf_pages/translate/{id}', 'InfPagesController@translate')->name('translate');
            Route::resource('/inf_menus', 'MenusController');
            Route::get('/inf_menus/toggle/{id}', 'MenusController@toggle');
            Route::resource('/social_links', 'SocialLinkController');
            Route::get('/social_links/toggle/{id}', 'SocialLinkController@toggle');
            Route::resource('/subscribers', 'SubscribersController');
            Route::resource('/purposes', 'PurposesController');
            Route::resource('/desc_blocks', 'DescBlockController');
            Route::resource('/descriptions', 'DescriptionController');
            Route::resource('/what_to_do_points', 'WhatToDoPointsController');
            Route::resource('/const_sections', 'ConstSectionController');
            Route::resource('/const_articles', 'ConstArticleController');
            Route::resource('/faq_questions', 'FaqQuestionController');
            Route::resource('/faq_answers', 'FaqAnswerController');
        });
});
