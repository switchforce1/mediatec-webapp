<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 09/05/2019
 * Time: 01:46
 */

namespace App\Helper\Security;

use App\Entity\Security\User;
use Symfony\Component\Security\Core\Security;

/**
 * Class UserHelper
 * @package App\Helper\Security
 */
class UserHelper
{
    /**
     * @var Security
     */
    protected $security;

    /**
     * UserHelper constructor.
     * @param Security $security
     */
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /**
     * @return null|\Symfony\Component\Security\Core\User\UserInterface|User
     */
    public function getCurrentUser()
    {
        return $this->security->getUser();
    }
}
