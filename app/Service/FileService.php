<?php

namespace App\Service;

use Illuminate\Support\Facades\Storage;

class FileService
{

    /**
     * ファイル存在チェック
     * @param $name // ファイル名
     * @return bool
     */
    public function exists($name)
    {
        return Storage::disk('local')->exists($name);
    }

    /**
     * ファイルオープン
     * @param $name
     * @return mixed
     */
    public function open($name)
    {
        return Storage::disk('local')->get($name);
    }

    public function move()
    {

    }

    public function put()
    {
        Storage::disk('local')->put('file.txt','hello');
    }

    public function write()
    {

    }

}
