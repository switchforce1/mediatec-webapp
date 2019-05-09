<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 02/04/2019
 * Time: 03:16
 */

namespace App\Entity\Media;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Media\ImageRepository")
 * @ORM\Table(name="media_image")
 */
class Image extends Media
{
    /**
     * Largeur de l'image en pixel
     *
     * @var int
     * @ORM\Column(type="integer", name="width", nullable=true)
     */
    protected $width;

    /**
     * Hauteur de l'image en pixel
     *
     * @var int
     * @ORM\Column(type="integer", name="height", nullable=true)
     */
    protected $height;

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return Image
     */
    public function setWidth(int $width): Image
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return Image
     */
    public function setHeight(int $height): Image
    {
        $this->height = $height;
        return $this;
    }
}
