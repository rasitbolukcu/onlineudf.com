<?php

namespace UDF;

class UDFZipper{

    public static function unzip($file, $outputPath){
        $zipper = new \PhpZip\ZipFile();
        $zipper->openFile($file)->extractTo($outputPath);
    } 

}
