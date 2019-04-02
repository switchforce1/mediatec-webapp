<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 02/04/2019
 * Time: 03:50
 */

namespace App\Entity\Media;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class mediaCollection
 * @package App\Entity\Media
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
}