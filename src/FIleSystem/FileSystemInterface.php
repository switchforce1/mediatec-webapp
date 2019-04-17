<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 17/04/2019
 * Time: 13:40
 */

namespace App\FIleSystem;


use Symfony\Component\HttpFoundation\File\UploadedFile;

interface FileSystemInterface
{
    /**
     * @param UploadedFile $uploadedFile
     * @param string $fileName
     * @param array $options
     * @return mixed
     */
    public function saveUploadedFile(UploadedFile $uploadedFile, string $fileName, array $options = []);

    /**
     * @param string $base64String
     * @param string $fileName
     * @param array $options
     * @return mixed
     */
    public function saveBase64File(string $base64String, string $fileName, array $options = []);

    /**
     * @param array $options
     * @return mixed
     */
    public function validateUploadOptions(array $options = []);

    /**
     * @param array $options
     * @return mixed
     */
    public function validateBase64Options(array $options = []);
}