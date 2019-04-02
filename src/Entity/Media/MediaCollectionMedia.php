<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 02/04/2019
 * Time: 03:55
 */

namespace App\Entity\Media;

/**
 * @ORM\Entity
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
     * @var string
     * @ORM\Column(type="string", name="reference", nullable=false, unique=true)
     */
    protected $reference;


}