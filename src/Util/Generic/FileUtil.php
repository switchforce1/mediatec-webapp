<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 15/04/2019
 * Time: 00:21
 */

namespace App\Util\Generic;


class FileUtil
{
    /**
     * @param string $base64string
     * @param string $outputFileName
     * @param string $path
     * @return null|string
     * @throws \Exception
     */
    static public function saveBase64File( string $base64string, string $outputFileName, string $path )
    {
        if($base64string == "" || $outputFileName == "" || $path == ""){
            return null;
        }

        $normalizedPath = self::normaliseDirectoryPathParam($path);
        //usage:  if( substr( $img_src, 0, 5 ) === "data:" ) {  $filename=save_base64_image($base64_image_string, $output_file_without_extentnion, getcwd() . "/application/assets/pins/$user_id/"); }
        //
        //data is like:    data:image/png;base64,asdfasdfasdf
        $splited = explode(',', substr( $base64string , 5 ) , 2);
        $mime=$splited[0];
        $data=$splited[1];

        $pathWithEndSlash=explode(';', $mime,2);
        $mimeSplit=explode('/', $pathWithEndSlash[0],2);
        if(count($mimeSplit)!=2){
            return null;
        }

        $extension=$mimeSplit[1];
        if($extension=='jpeg'){
            $extension='jpg';
        }
        //if($extension=='javascript')$extension='js';
        //if($extension=='text')$extension='txt';
        $fullFileName=$outputFileName.'.'.$extension;

        file_put_contents( $normalizedPath .DIRECTORY_SEPARATOR.$fullFileName, base64_decode($data) );
        return $fullFileName;
    }

    /**
     * @param string $directoryPath
     * @return bool|string
     * @throws \Exception
     */
    static private function normaliseDirectoryPathParam(string $directoryPath)
    {
        if($directoryPath == ""){
            throw new \Exception("The directory path can't be null or empty");
        }

        return realpath($directoryPath);
    }
}