<?php

use Illuminate\Http\Request;


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::get('Course', 'Course\CourseController@Course');
Route::get('Course/{id}', 'Course\CourseController@CourseByID');
Route::post('Course', 'Course\CourseController@CourseSave');
Route::post('Course/update/{Course}', 'Course\CourseController@CourseUpdate');
Route::delete('Course/{Course}', 'Course\CourseController@CourseDelete');

Route::get('/course/show/{id}', 'Course\CourseController@show');
Route::post('/upload', 'VideoController@upload');

Route::get('test', 'Course\CourseController@test');
Route::get('Video/list', 'VideoController@VideoList');
Route::post('Video/list', 'VideoController@VideoSave');

Route::get('Video', 'VideoController@Video');
Route::get('Video/{id}', 'VideoController@VideoByID');
Route::post('Video', 'VideoController@VideoSave');
Route::put('Video/{Video}', 'VideoController@VideoUpdate');
Route::delete('Video/{Video}', 'VideoController@VideoDelete');


Route::get('Q', 'QController@Q');
Route::get('Q/{id}', 'QController@QByID');
Route::post('Q', 'QController@QSave');
Route::put('Q/{Q}', 'QController@QUpdate');
Route::delete('Q/{Q}', 'QController@QDelete');
Route::get('Q/{Q}/Questions', 'QController@show');

Route::get('Question', 'QuestionController@Question');
Route::get('Question/{id}', 'QuestionController@QuestionByID');
Route::post('Question', 'QuestionController@QuestionSave');
Route::put('Question/{Question}', 'QuestionController@QuestionUpdate');
Route::delete('Question/{Question}', 'QuestionController@QuestionDelete');
Route::get('Question/{Question}/Answers', 'QuestionController@show');


Route::get('Answer', 'AnswerController@Answer');
Route::get('Answer/{id}', 'AnswerController@AnswerByID');
Route::post('Answer', 'AnswerController@AnswerSave');
Route::put('Answer/{Answer}', 'AnswerController@AnswerUpdate');
Route::delete('Answer/{Answer}', 'AnswerController@AnswerDelete');

Route::get('User', 'UserController@User');
Route::get('User/{id}', 'UserController@UserByID');
Route::post('User', 'UserController@UserSave');
Route::put('User/{User}', 'UserController@UserUpdate');
Route::delete('User/{User}', 'UserController@UserDelete');
