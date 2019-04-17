<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 17/04/2019
 * Time: 13:47
 */

namespace App\FIleSystem;


use App\Exception\FileSystem\BadFileSystemBase64OptionsException;
use App\Exception\FileSystem\BadFileSystemUploadOptionsException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class AbstractFileSystem
 * @package App\FIleSystem
 */
abstract class AbstractFileSystem implements FileSystemInterface
{

    /**
     * @param UploadedFile $uploadedFile
     * @param string $fileName
     * @param array $options
     * @return mixed
     */
    abstract public function saveUploadedFile(UploadedFile $uploadedFile, string $fileName, array $options = []);

    /**
     * @param string $base64String
     * @param string $fileName
     * @param array $options
     * @return mixed
     */
    abstract public function saveBase64File(string $base64String, string $fileName, array $options = []);

    /**
     * @param array $options
     * @return bool|mixed
     * @throws BadFileSystemUploadOptionsException
     */
    public function validateUploadOptions(array $options = [])
    {
        $validated = true;
        if(empty($options)){
            return true;
        }

        if(count($options)> 20){
            throw  new BadFileSystemUploadOptionsException();
        }

        return $validated;
    }

    /**
     * @param array $options
     * @return bool|mixed
     * @throws BadFileSystemBase64OptionsException
     */
    public function validateBase64Options(array $options = [])
    {
        $validated = true;
        if(empty($options)){
            return true;
        }
        if(count($options)> 20){
            throw  new BadFileSystemBase64OptionsException();
        }

        return $validated;
    }
}