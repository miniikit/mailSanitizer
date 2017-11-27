<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Service\FileService;
use App\Service\StringService;

class FileAccessController extends Controller
{
    protected $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }


    public function open(){

        $name = 'mail';
        $fileExsists =  $this->fileService->exists($name);

        if($fileExsists){
            $contents = $this->fileService->open($name);
        } else {
            dd("File Not Found.");
        }

        $StringService = new StringService();
        // タイトルの取得
        $title = $StringService->findTitle($contents);
        return $title;

    }

    public function move(){
        // Storage::move('old/file1.jpg', 'new/file1.jpg');
    }

    public function write(){
        Storage::disk('local')->put('file.txt','hello');

    }

}
