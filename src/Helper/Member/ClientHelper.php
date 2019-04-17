<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 08/04/2019
 * Time: 03:48
 */

namespace App\Helper\Member;

use App\Entity\Member\Client;
use App\Util\Generic\StringUtil;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class ClientHelper
 * @package App\Helper\Member
 */
class ClientHelper
{
    const START_PREFIX = "CLIENT";

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
    public function generateReference()
    {
        $client = null;
        //on verifie bien que la refenence n'est pas utilisée
        do{
            $referencePrefixe = $this->getReferencePrefixe();
            $uniqueString = StringUtil::generateRandomString(8);
            $reference = sprintf("%s_%s",$referencePrefixe, $uniqueString);

            $client = $this->entityManager->getRepository(Client::class)->findOneBy(['reference'=>$reference]);
        }while($client !== null);

        return $reference;
    }
}