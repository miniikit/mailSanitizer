<?php

namespace App\Service;

class StringService
{

    // ファイル検索
    public function find($file, $string)
    {

        $string_length = strlen($string);

        // $fileを検索し、開始文字列を$find_lengthに設定

        $find_length = strpos($file, $string);

        for ($i = $find_length; $i < $find_length + $string_length; $i++) {
            $strings[] = $file[$i];
        }

        return $strings;
    }

    public function sa($file, $string)
    {
        $a = strstr($file, $string);
        dd($a);
    }


    /**
     * メールの件名を取得する
     * 想定　；　MIME ver 1.0
     * @param   $file        検索対象ファイル
     * @return  string       文字列（メールの件名）を返却
     */
    public function findTitle($file)
    {

        // 件名以下を抜き出す
        $find_string = "Subject: ";
        $title_and_body = strstr($file, $find_string);


        // 件名のみに絞り込み
        $start_length = strlen($find_string);
        $end_length = strpos($title_and_body, "\n");
        $difference = $end_length - $start_length;  // 差分

        $result = mb_substr($title_and_body, $start_length, $difference);

        return $result;

        /*
        $string_for_body = "\n\n";  // HEADER以下を取得
        $body = strstr($file,$string_for_body);

        if(!$this->checkStringInContents($body,'Content-Type')) {    // 件名または本文用のContent-Typeが含まれているか確認
            dd("Mail Format Error!");
        }

        $string_for_title = "\n\n";
        $title = strstr($body,$string_for_title);
        dd($body,123);
        return $title;
        */
    }


    /**
     * 対象に、文字列が含まれているか確認。ファイルの他、配列も想定している。
     * @param   $contents     検索対象ファイル
     * @param   $string       検索文字列
     * @return  bool
     */
    public function checkStringInContents($contents, $string)
    {
        if (strpos($contents, $string)) {  // strposの返却値 : 最初にヒットした添え字
            return true;
        } else {
            return false;
        }
    }


    public function checkAttachedFileInContents($contents)
    {
        $checkString = "multipart/mixed";

        if(strpos($contents,$checkString)){

        }


        $blackLists = array("application", "image", "audio", "video", "model");
        $whiteLists = array("text", "message", "multipart");

        $checkFlg = true;

        for ($i = 0; $i < strlen($blackLists); $i++) {
            if (strpos($contents, $blackLists[$i])) {
                $checkFlg = false;
                break;
            }
        }

        dd($checkFlg);

        return $checkFlg;
    }

}
