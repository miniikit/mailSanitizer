<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class FileAccessController extends Controller
{
    public function open(){
        // $path = "/Users/minion/laraProject/mailSanitizer";
        $path = 'img';

        var_dump(File::exsits($path));

/*
        if(File::exsits($path)){
            echo "a";
        } else {
            echo "no";
        }
*/
    }

}
