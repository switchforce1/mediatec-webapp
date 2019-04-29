<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 02/04/2019
 * Time: 03:16
 */

namespace App\Entity\Media;

use App\Entity\Middle\MiddleFile;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="media_media")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"media" = "Media", "image" = "Image", "video" = "Video"})
 */
class Media extends MiddleFile
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", name="reference", nullable=false, unique=true)
     */
    protected $reference;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Media
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     * @return Media
     */
    public function setReference(string $reference): Media
    {
        $this->reference = $reference;
        return $this;
    }



}