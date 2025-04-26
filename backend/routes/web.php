<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;

Route::get('/feedback', [FeedbackController::class, 'showForm']);
Route::post('/feedback', [FeedbackController::class, 'submitFeedback'])->name('feedback.submit');
Route::get('/', function () {
    return view('welcome'); // make sure welcome.blade.php exists in resources/views
});
