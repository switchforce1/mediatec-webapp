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
     * @return mixed|void
     * @throws \App\Exception\FileSystem\BadFileSystemUploadOptionsException
     */
    public function saveUploadedFile(UploadedFile $uploadedFile, string $fileName, array $options = [])
    {
        $this->validateUploadOptions($options);
    }

    /**
     * @param string $base64String
     * @param string $fileName
     * @param array $options
     *
     * @return mixed|void
     *
     * @throws \App\Exception\FileSystem\BadFileSystemBase64OptionsException
     */
    public function saveBase64File(string $base64String, string $fileName, array $options = [])
    {
        $this->validateBase64Options($options);
    }
}