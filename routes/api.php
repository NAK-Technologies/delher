<?php

use App\Http\Controllers\Api\AnswerController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\DemographicController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\QuestionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('/register', )

Route::group(['prefix' => 'v1'], function () {

    // Route::post('/register', [AuthController::class, 'store']);
    Route::post('/login', [AuthController::class, 'login']);


    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('/test', function (Request $request) {
            $response = [
                $request->user(),
            ];
            return response($response, 200);
        });
        // Route::get('/patients', [PatientController::class, 'index'])->middleware('abilities:view-patients');
        // Route::get('/patients/my', [PatientController::class, 'myPatients'])->middleware('abilities:view-patients');
        // Route::get('/patients/show/{patient}', [PatientController::class, 'patient'])->middleware('abilities:view-patients');
        // Route::post('/patients/create', [PatientController::class, 'store'])->middleware('abilities:create-patients');
        // Route::post('/patients/check-mr_no', [PatientController::class, 'checkMR'])->middleware('abilities:create-patients');
        Route::get('/patients', [PatientController::class, 'index']);
        Route::get('/patients/my', [PatientController::class, 'myPatients']);
        Route::get('/patients/show/{patient}', [PatientController::class, 'patient']);
        Route::post('/patients/create', [PatientController::class, 'store']);
        Route::post('/patients/check-mr_no', [PatientController::class, 'checkMR']);

        Route::get('/demographics', [DemographicController::class, 'index']);
        Route::post('/demographics/create', [DemographicController::class, 'store']);

        Route::post('/add-answers', [AnswerController::class, 'store']);

        Route::get('/question/{question}/options', [QuestionController::class, 'options']);

        Route::get('/questions', [QuestionController::class, 'index']);

        Route::get('/cities', [CityController::class, 'index']);

        Route::post('/logout', [AuthController::class, 'logout']);
    });
});
