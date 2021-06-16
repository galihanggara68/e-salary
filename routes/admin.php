<?php

Route::get('/', 'HomeController@index')->name('dashboard');

Route::get('/department/data', 'DataController@departments')->name('department.data');
Route::resource('/department', 'DepartmentController');

Route::get('/position/data', 'DataController@positions')->name('position.data');
Route::resource('position', 'PositionController');

Route::get('/group/data', 'DataController@groups')->name('group.data');
Route::resource('group', 'GroupController');

Route::get('/employee/data', 'DataController@employees')->name('employee.data');
Route::resource('employee', 'EmployeeController');

Route::get('/user/data', 'DataController@users')->name('user.data');
Route::resource('user', 'UserController');
Route::get('/useremployee', 'UserController@indexEmployee')->name('user.employee');

Route::get('/attendance/data', 'DataController@attendances')->name('attendance.data');
Route::resource('attendance', 'AttendanceController');

Route::get('/complain/data', 'DataController@complains')->name('complain.data');
Route::resource('complain', 'ComplainController');

Route::get('/salary/data', 'DataController@salaries')->name('salary.data');
Route::resource('salary', 'SalaryController');
Route::get('salary/print/{id}', 'SalaryController@print')->name("salary.print");
Route::get("/salary/create/next", "SalaryController@getEmployeeData")->name("salary.employee");

Route::get('/benefit/data', 'DataController@benefits')->name('benefit.data');
Route::resource('benefit', 'BenefitController');
Route::put("/benefit/updateajax/{id}", 'BenefitController@updateAjax');
Route::delete("/benefit/deleteajax/{id}", 'BenefitController@deleteAjax');
