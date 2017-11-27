<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrawlController extends Controller
{
    public function check(){
        fam_monitor_collection();
    }
}
