<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 15/04/2019
 * Time: 01:30
 */

namespace App\Helper\Media;

use App\Entity\Media\Media;
use App\Util\Generic\StringUtil;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class MediaHelper
 * @package App\Helper\Media
 */
class MediaHelper
{
    const START_PREFIX = "MEDIA";

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * ClientHelper constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return string
     */
    protected function getReferencePrefixe()
    {
        $nowDate = new \DateTime('now');
        $stringDate = $nowDate->format("YmdQHisu");

        return sprintf("%S_%s",self::START_PREFIX, $stringDate);
    }

    /**
     * @return string
     */
    public function generateNewReference()
    {
        $client = null;
        //on verifie bien que la reference n'est pas utilisée
        do{
            $referencePrefixe = $this->getReferencePrefixe();
            $uniqueString = StringUtil::generateRandomString(8);
            $reference = sprintf("%s_%s",$referencePrefixe, $uniqueString);

            $client = $this->entityManager->getRepository(Media::class)->findOneBy([
                'reference'=>$reference
            ]);
        }while($client !== null);

        return $reference;
    }

    /**
     * @param Media $media
     */
    public function saveMedia(Media $media)
    {

    }

    /**
     * @param Media $media
     * @return string
     */
    public function setReference(Media $media)
    {
        $reference = $this->generateNewReference();
        $media->setReference($reference);

        return $reference;
    }
}
