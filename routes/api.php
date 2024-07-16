<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function (Request $request) {
//     return 123;
// })->name('login');
// Route::get('/user', [AuthController::class, 'getUser']);
Route::controller(App\Http\Controllers\Api\AuthController::class)->group(function () {
    // Route::get('/user', 'getUser')->name('user');
    Route::post('/login', 'login')->name('login');
    // Route::get('/login', 'login')->name('login');
});
Route::middleware('auth:sanctum')->group(function () {
    Route::controller(App\Http\Controllers\Api\UserController::class)->group(function () {
        Route::get('/user', 'index')->name('api.user');
        Route::post('/user', 'store')->name('api.user.store');
        Route::put('/user/(user)', 'update')->name('api.user.update');
        Route::delete('/user(user)', 'destroy')->name('api.user.destroy');
    });
    Route::controller(App\Http\Controllers\Api\AuthController::class)->group(function () {
        Route::get('/getuserlogin', 'getUser')->name('api.auth.getuserlogin');
        Route::post('/logout', 'logout')->name('api.auth.logout');
        // Route::get('/login', 'login')->name('login');
    });
    Route::controller(App\Http\Controllers\Api\TeacherController::class)->group(function () {
        Route::get('/teacher', 'index')->name('api.teacher');
        Route::post('/teacher', 'store')->name('api.teacher.store');
        Route::put('/teacher/{teacher}', 'update')->name('api.teacher.update');
        Route::delete('/teacher/{teacher}', 'destroy')->name('teacher.destroy');
    });
    Route::controller(App\Http\Controllers\Api\StudentController::class)->group(function () {
        Route::get('/student', 'index')->name('api.student');
        Route::post('/student', 'store')->name('api.student.store');
        Route::put('/student/{student}', 'update')->name('api.student.update');
        Route::delete('/student/{student}', 'destroy')->name('api.student.destroy');
    });
    Route::controller(App\Http\Controllers\Api\ClassController::class)->group(function () {
        Route::get('/class', 'index')->name('class');
        Route::post('/class', 'store')->name('class.store');
        Route::put('/class', 'update')->name('class.update');
        Route::delete('/class/{class}', 'destroy')->name('class.destroy');
    });
    Route::controller(App\Http\Controllers\Api\CourseController::class)->group(function () {
        Route::get('/course', 'index')->name('course');
        Route::post('/course', 'store')->name('course.store');
        Route::put('/course', 'update')->name('course.update');
        Route::delete('/course/{course}', 'destroy')->name('course.destroy');
    });

    Route::controller(App\Http\Controllers\Api\SchoolTimetableController::class)->group(function () {
        Route::get('/school_timetable', 'index')->name('school_timetable');
        Route::post('/school_timetable', 'store')->name('school_timetable.store');
        Route::put('/school_timetable', 'update')->name('school_timetable.update');
        Route::delete('/school_timetable/{school_timetable}', 'destroy')->name('school_timetable.destroy');
    });
    // Route::middleware(['role:teacher|admin'])->group(function () {
    //     Route::controller(App\Http\Controllers\Api\TeacherController::class)->group(function () {
    //         Route::get('/teacher', 'index')->name('teacher.api.index');
    //     });
    // });
    // Route::middleware(['role:student|admin'])->group(function () {
    //     Route::controller(App\Http\Controllers\Api\StudentController::class)->group(function () {
    //         Route::get('/teacher', 'index')->name('teacher.api.index');
    //     });
    // });

});
Route::controller(App\Http\Controllers\Api\ClassGroupController::class)->group(function () {
    Route::get('/class_group', 'index')->name('api.class_group');
    Route::post('/class_group', 'store')->name('api.class_group.store');
    Route::put('/class_group', 'update')->name('api.class_group.update');
    Route::delete('/class_group/{class_group}', 'destroy')->name('api.class_group.destroy');
});
