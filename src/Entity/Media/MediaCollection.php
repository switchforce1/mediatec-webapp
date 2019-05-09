<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 02/04/2019
 * Time: 03:50
 */

namespace App\Entity\Media;

use App\Entity\Member\Client;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class mediaCollection
 * @package App\Entity\Media
 * @ORM\Entity(repositoryClass="App\Repository\Media\MediaCollectionRepository")
 * @ORM\Table(name="media_collection")
 */
class mediaCollection
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
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="App\Entity\Media\MediaCollectionMedia", mappedBy="mediaCollection")
     */
    protected $mediaCollectionMedias;

    /**
     * mediaCollection constructor.
     */
    public function __construct()
    {
        $this->mediaCollectionMedias = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
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
            $mediaCollectionMedia->setMediaCollection($this);
        }

        return $this;
    }

    public function removeMediaCollectionMedia(MediaCollectionMedia $mediaCollectionMedia): self
    {
        if ($this->mediaCollectionMedias->contains($mediaCollectionMedia)) {
            $this->mediaCollectionMedias->removeElement($mediaCollectionMedia);
            // set the owning side to null (unless already changed)
            if ($mediaCollectionMedia->getMediaCollection() === $this) {
                $mediaCollectionMedia->setMediaCollection(null);
            }
        }

        return $this;
    }
}
