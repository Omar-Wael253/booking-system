<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\AcademicYearController;
Route::get('/', function () {
    return view('welcome');
});
// Create center routes :
Route::get('/centers/create' , [CenterController::class ,'create'])->name('centers.create');
Route::post('/centers' , [CenterController::class , 'store'])->name('centers.store');
Route::get('/centers/{center}' , [CenterController::class , 'show'])->name('centers.show');
Route::get('/centers' , [CenterController::class , 'index'])->name('centers.index');
Route::put('/centers/{center}' , [CenterController::class,'update'])->name('centers.update');
Route::get('/centers/{center}/edit', [CenterController::class, 'edit'])->name('centers.edit');
Route::delete('/centers/{center}' , [CenterController::class , 'destroy'])->name('centers.destroy');

// academic years route
Route::get('/academic-years/create' , [AcademicYearController::class ,'create'])->name('academic-year.create');
Route::post('/academic-years' ,[AcademicYearController::class , 'store'])->name('academic-year.store');
Route::get('/academic-years/{academicYear}/edit' , [AcademicYearController::class , 'edit'])->name('academic-year.edit');
Route::put('/academic-years/{academicYear}' , [AcademicYearController::class , 'update'])->name('academic-year.update');
Route::get('/academic-years', [AcademicYearController::class, 'index'])
    ->name('academic-year.index');
