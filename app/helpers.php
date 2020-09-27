<?php


use Illuminate\Support\Facades\File;

function makeFolder(){
    $userId = Auth::user()->id;
    $path = 'users/' . $userId;

    if(!is_dir($path)) {
        File::makeDirectory('users/' . $userId);
        File::makeDirectory('users/' . $userId . '/images');
        File::makeDirectory('users/' . $userId . '/images/items');
        File::makeDirectory('users/' . $userId . '/images/accessory');
        File::makeDirectory('users/' . $userId . '/profile');
    }
}
