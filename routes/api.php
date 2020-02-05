<?php

use Illuminate\Http\Request;


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user')->middleware('can:isAdmin');

        Route::post('Course', 'Course\CourseController@CourseSave')->middleware('can:teacher');
        Route::post('Course/update/{Course}', 'Course\CourseController@CourseUpdate')->middleware('can:teacher');
        Route::delete('Course/{Course}', 'Course\CourseController@CourseDelete')->middleware('can:teacher');

        Route::post('/upload', 'VideoController@upload')->middleware('can:teacher');
        Route::get('test', 'Course\CourseController@test');
        Route::get('Video/list', 'VideoController@VideoList');
        Route::post('Video/list', 'VideoController@VideoSave')->middleware('can:teacher');
        Route::get('Video', 'VideoController@Video');
        Route::get('Video/{id}', 'VideoController@VideoByID');
        Route::post('Video', 'VideoController@VideoSave')->middleware('can:teacher');
        Route::put('Video/{Video}', 'VideoController@VideoUpdate')->middleware('can:teacher');
        Route::delete('Video/{Video}', 'VideoController@VideoDelete')->middleware('can:teacher');


        Route::get('Q', 'QController@Q');
        Route::get('Q/{id}', 'QController@QByID');
        Route::post('Q', 'QController@QSave');
        Route::put('Q/{Q}', 'QController@QUpdate')->middleware('can:teacher');
        Route::delete('Q/{Q}', 'QController@QDelete')->middleware('can:teacher');
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


        Route::get('Teacher', 'TeacherController@Teacher');
        Route::get('Teacher/{id}', 'TeacherController@TeacherByID');
        Route::post('Teacher', 'TeacherController@TeacherSave')->middleware('can:isAdmin');
        Route::put('Teacher/{Teacher}', 'TeacherController@TeacherUpdate')->middleware('can:isAdmin');
        Route::delete('Teacher/{Teacher}', 'TeacherController@TeacherDelete')->middleware('can:isAdmin');
        Route::get('Teacher/{Teacher}/Courses', 'TeacherController@show');


        Route::get('Category', 'CategoryController@Category');
        Route::get('Category/{id}', 'CategoryController@CategoryByID');
        Route::post('Category', 'CategoryController@CategorySave')->middleware('can:isAdmin');
        Route::put('Category/{Category}', 'CategoryController@CategoryUpdate')->middleware('can:isAdmin');
        Route::delete('Category/{Category}', 'CategoryController@CategoryDelete')->middleware('can:isAdmin');
        Route::get('Category/{Category}/Courses', 'CategoryController@show');

        Route::get('Cart', 'CardController@Card');
        Route::get('Cart/{id}', 'CardController@CardByID');
        Route::post('Cart', 'CardController@CardSave');
        Route::put('Cart/{Card}', 'CardController@CardUpdate');
        Route::delete('Cart/{Card}', 'CardController@CardDelete');
    });

});
Route::get('Course', 'Course\CourseController@Course');
Route::get('Course/{id}', 'Course\CourseController@CourseByID');
Route::get('Search', 'Course\CourseController@search');

Route::get('/course/show/{id}', 'Course\CourseController@show');




//Route::get('Card/{Card}/Courses', 'CardController@show');
