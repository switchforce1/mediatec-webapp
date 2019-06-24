<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 08/04/2019
 * Time: 03:48
 */

namespace App\Helper\Member;

use App\Entity\Member\Client;
use App\Entity\Security\User;
use App\Repository\Member\ClientRepository;
use App\Util\Generic\StringUtil;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;

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
    public function generateNewReference()
    {
        $client = null;
        //on verifie bien que la reference n'est pas utilisée
        do{
            $referencePrefixe = $this->getReferencePrefixe();
            $uniqueString = StringUtil::generateRandomString(8);
            $reference = sprintf("%s_%s",$referencePrefixe, $uniqueString);

            $client = $this->entityManager->getRepository(Client::class)->findOneBy([
                'reference'=>$reference
            ]);
        }while($client !== null);

        return $reference;
    }

    /**
     * @param User $user
     * @return Client|null
     * @throws \Exception
     */
    protected function getClient(User $user)
    {
        /** @var ClientRepository $clientRepository */
        $clientRepository = $this->entityManager->getRepository(Client::class);
        try{
            /** @var Client $client */
            $client = $clientRepository->findByUser($user);
        } catch (NonUniqueResultException $uniqueResultException){
            return null;
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }

        return $client;
    }

    /**
     * @param User $user
     * @throws \Exception
     */
    public function generateClient(User $user)
    {
        if(!$user->getId()){
            throw new \Exception('Unable to generate client for unsaved user');
        }
        /** @var ClientRepository $clientRepository */
        $clientRepository = $this->entityManager->getRepository(Client::class);

    }
}
