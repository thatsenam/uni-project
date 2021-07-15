<?php

use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\AssetCategoriesController;
use App\Http\Controllers\BillsController;
use App\Http\Controllers\BuySmsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\IVAsController;
use App\Http\Controllers\MedicinesController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\SmsContactsController;
use App\Http\Controllers\SMSModelsController;
use App\Http\Controllers\SmsTemplatesController;
use App\Http\Controllers\SpecializesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TestsController;
use Illuminate\Support\Facades\Route;


Route::get('/', 'PagesController@index');


Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/test', 'PagesController@test');
Route::get('/jquerymask', 'PagesController@jQueryMask');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

// php artisan resource-file:create Specialize --fields=id,name --force
// php artisan create:resources Specialize --force --with-migration --layout-name=layout.default


Route::group(['prefix' => 'specializes'], function () {

    Route::get('/', [SpecializesController::class, 'index'])->name('specializes.specialize.index');
    Route::get('/create', [SpecializesController::class, 'create'])->name('specializes.specialize.create');
    Route::get('/show/{specialize}', [SpecializesController::class, 'show'])->name('specializes.specialize.show')->where('id', '[0-9]+');
    Route::get('/{specialize}/edit', [SpecializesController::class, 'edit'])->name('specializes.specialize.edit')->where('id', '[0-9]+');
    Route::post('/', [SpecializesController::class, 'store'])->name('specializes.specialize.store');
    Route::put('specialize/{specialize}', [SpecializesController::class, 'update'])->name('specializes.specialize.update')->where('id', '[0-9]+');
    Route::delete('/specialize/{specialize}', [SpecializesController::class, 'destroy'])->name('specializes.specialize.destroy')->where('id', '[0-9]+');

});

Route::group([
    'prefix' => 'doctors',
], function () {

    Route::get('/', [DoctorsController::class, 'index'])->name('doctors.doctor.index');
    Route::get('/create', [DoctorsController::class, 'create'])->name('doctors.doctor.create');
    Route::get('/show/{doctor}', [DoctorsController::class, 'show'])->name('doctors.doctor.show')->where('id', '[0-9]+');
    Route::get('/{doctor}/edit', [DoctorsController::class, 'edit'])->name('doctors.doctor.edit')->where('id', '[0-9]+');
    Route::post('/', [DoctorsController::class, 'store'])->name('doctors.doctor.store');
    Route::put('doctor/{doctor}', [DoctorsController::class, 'update'])->name('doctors.doctor.update')->where('id', '[0-9]+');
    Route::delete('/doctor/{doctor}', [DoctorsController::class, 'destroy'])->name('doctors.doctor.destroy')->where('id', '[0-9]+');

});

// php artisan resource-file:create Patient --fields=id,name,age,gender,phone,address,photo --force
// php artisan create:resources Patient --force --with-migration --layout-name=layout.default

Route::group([
    'prefix' => 'patients',
], function () {
    Route::get('/', [PatientsController::class, 'index'])->name('patients.patient.index');
    Route::get('/create', [PatientsController::class, 'create'])->name('patients.patient.create');
    Route::get('/show/{patient}', [PatientsController::class, 'show'])->name('patients.patient.show')->where('id', '[0-9]+');
    Route::get('/{patient}/edit', [PatientsController::class, 'edit'])->name('patients.patient.edit')->where('id', '[0-9]+');
    Route::post('/', [PatientsController::class, 'store'])->name('patients.patient.store');
    Route::put('patient/{patient}', [PatientsController::class, 'update'])->name('patients.patient.update')->where('id', '[0-9]+');
    Route::delete('/patient/{patient}', [PatientsController::class, 'destroy'])->name('patients.patient.destroy')->where('id', '[0-9]+');

});


// php artisan resource-file:create Room --fields=id,name,room_type,bed_count,room_size,is_air_conditioned,description,charge --force
// php artisan create:resources Room --force --with-migration --layout-name=layout.default

Route::group([
    'prefix' => 'rooms',
], function () {

    Route::get('/', [RoomsController::class, 'index'])->name('rooms.room.index');
    Route::get('/create', [RoomsController::class, 'create'])->name('rooms.room.create');
    Route::get('/show/{room}', [RoomsController::class, 'show'])->name('rooms.room.show')->where('id', '[0-9]+');
    Route::get('/{room}/edit', [RoomsController::class, 'edit'])->name('rooms.room.edit')->where('id', '[0-9]+');
    Route::post('/', [RoomsController::class, 'store'])->name('rooms.room.store');
    Route::put('room/{room}', [RoomsController::class, 'update'])->name('rooms.room.update')->where('id', '[0-9]+');
    Route::delete('/room/{room}', [RoomsController::class, 'destroy'])->name('rooms.room.destroy')->where('id', '[0-9]+');

});

// php artisan resource-file:create Bill --fields=id,bill_no,room_id,patient_id,doctor_charge,room_charge,total_charge,doctor_id,bill_by,date,notes --force
// php artisan create:resources Bill --force --with-migration --layout-name=layout.default


Route::group([
    'prefix' => 'bills',
], function () {

    Route::get('/', [BillsController::class, 'index'])->name('bills.bill.index');
    Route::get('/create', [BillsController::class, 'create'])->name('bills.bill.create');
    Route::get('/show/{bill}', [BillsController::class, 'show'])->name('bills.bill.show')->where('id', '[0-9]+');
    Route::get('/{bill}/edit', [BillsController::class, 'edit'])->name('bills.bill.edit')->where('id', '[0-9]+');
    Route::post('/', [BillsController::class, 'store'])->name('bills.bill.store');
    Route::put('bill/{bill}', [BillsController::class, 'update'])->name('bills.bill.update')->where('id', '[0-9]+');
    Route::delete('/bill/{bill}', [BillsController::class, 'destroy'])->name('bills.bill.destroy')->where('id', '[0-9]+');

});


// php artisan resource-file:create Medicine --fields=id,name,price --force
// php artisan create:resources Medicine --force --with-migration --layout-name=layout.default

Route::group([
    'prefix' => 'medicines',
], function () {

    Route::get('/', [MedicinesController::class, 'index'])->name('medicines.medicine.index');
    Route::get('/create', [MedicinesController::class, 'create'])->name('medicines.medicine.create');
    Route::get('/show/{medicine}', [MedicinesController::class, 'show'])->name('medicines.medicine.show')->where('id', '[0-9]+');
    Route::get('/{medicine}/edit', [MedicinesController::class, 'edit'])->name('medicines.medicine.edit')->where('id', '[0-9]+');
    Route::post('/', [MedicinesController::class, 'store'])->name('medicines.medicine.store');
    Route::put('medicine/{medicine}', [MedicinesController::class, 'update'])->name('medicines.medicine.update')->where('id', '[0-9]+');
    Route::delete('/medicine/{medicine}', [MedicinesController::class, 'destroy'])->name('medicines.medicine.destroy')->where('id', '[0-9]+');

});

// php artisan resource-file:create Employee --fields=id,eid,name,phone,salary,address,gender,nid --force
// php artisan create:resources Employee --force --with-migration --layout-name=layout.default

Route::group([
    'prefix' => 'employees',
], function () {

    Route::get('/', [EmployeesController::class, 'index'])->name('employees.employee.index');
    Route::get('/create', [EmployeesController::class, 'create'])->name('employees.employee.create');
    Route::get('/show/{employee}', [EmployeesController::class, 'show'])->name('employees.employee.show')->where('id', '[0-9]+');
    Route::get('/{employee}/edit', [EmployeesController::class, 'edit'])->name('employees.employee.edit')->where('id', '[0-9]+');
    Route::post('/', [EmployeesController::class, 'store'])->name('employees.employee.store');
    Route::put('employee/{employee}', [EmployeesController::class, 'update'])->name('employees.employee.update')->where('id', '[0-9]+');
    Route::delete('/employee/{employee}', [EmployeesController::class, 'destroy'])->name('employees.employee.destroy')->where('id', '[0-9]+');

});


// php artisan resource-file:create Appointment --fields=id,doctor_id,patient_id,phone,appointment_date,charge,note --force
// php artisan create:resources Appointment --force --with-migration --layout-name=layout.default

Route::group([
    'prefix' => 'appointments',
], function () {

    Route::get('/', [AppointmentsController::class, 'index'])->name('appointments.appointment.index');
    Route::get('/create', [AppointmentsController::class, 'create'])->name('appointments.appointment.create');
    Route::get('/show/{appointment}', [AppointmentsController::class, 'show'])->name('appointments.appointment.show')->where('id', '[0-9]+');
    Route::get('/{appointment}/edit', [AppointmentsController::class, 'edit'])->name('appointments.appointment.edit')->where('id', '[0-9]+');
    Route::post('/', [AppointmentsController::class, 'store'])->name('appointments.appointment.store');
    Route::put('appointment/{appointment}', [AppointmentsController::class, 'update'])->name('appointments.appointment.update')->where('id', '[0-9]+');
    Route::delete('/appointment/{appointment}', [AppointmentsController::class, 'destroy'])->name('appointments.appointment.destroy')->where('id', '[0-9]+');

});

// php artisan resource-file:create Test --fields=id,test_name,patient_id,doctor_id,bill_id,test_date,test_charge,test_result --force
// php artisan create:resources Test --force --with-migration --layout-name=layout.default


Route::group([
    'prefix' => 'tests',
], function () {

    Route::get('/', [TestsController::class, 'index'])->name('tests.test.index');
    Route::get('/create', [TestsController::class, 'create'])->name('tests.test.create');
    Route::get('/show/{test}', [TestsController::class, 'show'])->name('tests.test.show')->where('id', '[0-9]+');
    Route::get('/{test}/edit', [TestsController::class, 'edit'])->name('tests.test.edit')->where('id', '[0-9]+');
    Route::post('/', [TestsController::class, 'store'])->name('tests.test.store');
    Route::put('test/{test}', [TestsController::class, 'update'])->name('tests.test.update')->where('id', '[0-9]+');
    Route::delete('/test/{test}', [TestsController::class, 'destroy'])->name('tests.test.destroy')->where('id', '[0-9]+');

});
