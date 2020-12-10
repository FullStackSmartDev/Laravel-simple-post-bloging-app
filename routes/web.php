<?php

use Illuminate\Support\Facades\Route;

Route::get('/post', function () {
    return view('posts.index');
});
