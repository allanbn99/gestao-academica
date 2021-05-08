<?php

/*-----------------------------------------------------------
|   Rotas do painel
-----------------------------------------------------------*/

Route::group([
    'middleware' => [],
    'prefix' => 'painel'
], function(){
    Route::get('/', function(){ return view('painel.home'); })->name('panel.home');
    Route::get('/cronograma', function(){ return view('painel.cronograma-aulas'); });
});
Route::get('/login', function(){ return view('painel.login'); })->name('panel.login');
