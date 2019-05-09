<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 09/05/2019
 * Time: 02:08
 */

namespace App\Handler\Member;


use App\Entity\Member\Client;
use App\Entity\Security\User;
use App\Helper\Security\UserHelper;
use App\Repository\Member\ClientRepository;
use Doctrine\ORM\EntityManagerInterface;

class ClientHandler
{
    /**
     * @var UserHelper
     */
    protected $userHelper;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManger;

    /**
     * ClientHandler constructor.
     * @param UserHelper $userHelper
     * @param EntityManagerInterface $entityManger
     */
    public function __construct(UserHelper $userHelper, EntityManagerInterface $entityManger)
    {
        $this->userHelper = $userHelper;
        $this->entityManger = $entityManger;
    }

    /**
     * @param User $user
     * @return Client|null
     */
    public function getClientOf(User $user)
    {
        /** @var ClientRepository $clientRepository */
        $clientRepository = $this->entityManger->getRepository(Client::class);
        try{
            /** @var Client $client */
            $client = $clientRepository->findByUser($user);
        } catch (\Exception $exception) {
            return null;
        }

        return $client;
    }

    /**
     * @return Client|null
     */
    public function getCurrentClient()
    {
        if (!$this->userHelper->getCurrentUser()){
            return null;
        }
       return $this->getClientOf($this->userHelper->getCurrentUser());
    }
}