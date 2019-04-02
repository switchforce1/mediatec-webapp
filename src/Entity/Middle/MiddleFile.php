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
 * Class MiddleFile
 * @package App\Entity\Middle
 * @ORM\MappedSuperclass()
 */
class MiddleFile
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
     * @return MiddleFile
     */
    public function setOriginalFileName(string $originalFileName): MiddleFile
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
     * @return MiddleFile
     */
    public function setFilePath(string $filePath): MiddleFile
    {
        $this->filePath = $filePath;
        return $this;
    }
}