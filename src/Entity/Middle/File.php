<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 02/04/2019
 * Time: 03:15
 */

namespace App\Entity\Middle;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class File
 * @package App\Entity\Middle
 * @ORM\MappedSuperclass()
 */
class File
{
    /**
     * @var string
     * @ORM\Column(type="string", name="original_file_name", nullable=false, unique=false)
     */
    protected $originalFileName;

    /**
     * @var string
     * @ORM\Column(type="string", name="file_path", nullable=false, unique=true)
     */
    protected $filePath;

    /**
     * @return string
     */
    public function getOriginalFileName(): string
    {
        return $this->originalFileName;
    }

    /**
     * @param string $originalFileName
     * @return File
     */
    public function setOriginalFileName(string $originalFileName): File
    {
        $this->originalFileName = $originalFileName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    /**
     * @param string $filePath
     * @return File
     */
    public function setFilePath(string $filePath): File
    {
        $this->filePath = $filePath;
        return $this;
    }
}