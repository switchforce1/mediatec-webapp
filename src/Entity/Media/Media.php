<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 02/04/2019
 * Time: 03:16
 */

namespace App\Entity\Media;

use App\Entity\Member\Client;
use App\Entity\Middle\MiddleFile;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Media\MediaRepository")
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
     * @var Client
     * @ORM\ManyToOne(targetEntity="App\Entity\Member\Client")
     * @ORM\JoinColumn(name="client_id", nullable=false)
     */
    protected $client;

    /**
     * mediaCollection constructor.
     */
    public function __construct()
    {
    }

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

    /**
     * @return Collection|MediaCollectionMedia[]
     */
    public function getMediaCollectionMedias(): Collection
    {
        return $this->mediaCollectionMedias;
    }

    public function addMediaCollectionMedia(MediaCollectionMedia $mediaCollectionMedia): self
    {
        if (!$this->mediaCollectionMedias->contains($mediaCollectionMedia)) {
            $this->mediaCollectionMedias[] = $mediaCollectionMedia;
            $mediaCollectionMedia->setMedia($this);
        }

        return $this;
    }

    public function removeMediaCollectionMedia(MediaCollectionMedia $mediaCollectionMedia): self
    {
        if ($this->mediaCollectionMedias->contains($mediaCollectionMedia)) {
            $this->mediaCollectionMedias->removeElement($mediaCollectionMedia);
            // set the owning side to null (unless already changed)
            if ($mediaCollectionMedia->getMedia() === $this) {
                $mediaCollectionMedia->setMedia(null);
            }
        }

        return $this;
    }
}
