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
 * @ORM\Entity
 * @ORM\Table(name="media_image")
 */
class Video extends Media
{
    /**
     * Duree de la video en secondes
     * @var int
     * @ORM\Column(type="integer", name="length", nullable=true)
     */
    protected $length;

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     * @return Video
     */
    public function setLength(int $length): Video
    {
        $this->length = $length;
        return $this;
    }
}