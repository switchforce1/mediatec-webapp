<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 17/04/2019
 * Time: 13:49
 */

namespace App\FIleSystem\Generic;


use App\FIleSystem\AbstractFileSystem;
use App\FIleSystem\FileSystemInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class LocalFileSystem extends AbstractFileSystem implements FileSystemInterface
{

    /**
     * @param UploadedFile $uploadedFile
     * @param string $fileName
     * @param array $options
     * @return mixed
     */
    public function saveUploadedFile(UploadedFile $uploadedFile, string $fileName, array $options = [])
    {
        $this->validateUploadOptions($options);
    }

    /**
     * @param string $base64String
     * @param string $fileName
     * @param array $options
     * @return mixed
     */
    public function saveBase64File(string $base64String, string $fileName, array $options = [])
    {
        // TODO: Implement saveBase64File() method.
    }
}