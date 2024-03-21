<?php

Route::group(['middleware' => ['web']], function() {

	Route::resource('ui', 'Admin\UI\Http\Controllers\UIController');

    Route::get('dev/form','Admin\UI\Http\Controllers\UIController@devForm');
    Route::get('dev/data-table','Admin\UI\Http\Controllers\UIController@devDataTable');

    Route::get('dev/data-table-ajax','Admin\UI\Http\Controllers\UIController@devDataTableAjax');
    Route::get('dev/data-table-data','Admin\UI\Http\Controllers\UIController@dataTableData');


});

Route::group(['middleware' => ['web', 'admin']], function() {
    Route::get('dev/sessions','Admin\UI\Http\Controllers\UIController@sessions');
    Route::get('/vue', function () {
        return view('ui::templates.limitless.vue-layout_5');
    });

});
