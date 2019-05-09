<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 02/04/2019
 * Time: 03:55
 */

namespace App\Entity\Media;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Media\MediaCollectionMediaRepository")
 * @ORM\Table(name="media_media_collection_media")
 */
class MediaCollectionMedia
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", name="creation_date", nullable=false)
     */
    protected $creationDate;

    /**
     * @var mediaCollection
     * @ORM\ManyToOne(targetEntity="App\Entity\Media\MediaCollection", inversedBy="mediaCollectionMedias")
     * @ORM\JoinColumn(name="media_collection_id", referencedColumnName="id")
     */
    protected $mediaCollection;

    /**
     * @var Media
     * @ORM\ManyToOne(targetEntity="App\Entity\Media\Media")
     * @ORM\JoinColumn(name="media_id", referencedColumnName="id")
     */
    protected $media;

    /**
     * MediaCollectionMedia constructor.
     */
    public function __construct()
    {
        $this->creationDate = new \DateTime("now");
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getCreationDate(): \DateTime
    {
        return $this->creationDate;
    }

    /**
     * @param \DateTime $creationDate
     * @return MediaCollectionMedia
     */
    public function setCreationDate(\DateTime $creationDate): MediaCollectionMedia
    {
        $this->creationDate = $creationDate;
        return $this;
    }

    /**
     * @return mediaCollection
     */
    public function getMediaCollection(): mediaCollection
    {
        return $this->mediaCollection;
    }

    /**
     * @param mediaCollection $mediaCollection
     * @return MediaCollectionMedia
     */
    public function setMediaCollection(mediaCollection $mediaCollection): MediaCollectionMedia
    {
        $this->mediaCollection = $mediaCollection;
        return $this;
    }

    /**
     * @return Media
     */
    public function getMedia(): Media
    {
        return $this->media;
    }

    /**
     * @param Media $media
     * @return MediaCollectionMedia
     */
    public function setMedia(Media $media): MediaCollectionMedia
    {
        $this->media = $media;
        return $this;
    }
}
