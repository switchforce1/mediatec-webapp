<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 25/04/2019
 * Time: 21:45
 */

namespace App\Helper\Generic;

use Artgris\Bundle\FileManagerBundle\Service\CustomConfServiceInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class ArtgrisConfHelper
 * @package App\Helper\Generic
 */
class ArtgrisConfHelper implements CustomConfServiceInterface
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var string
     */
    private $mediaDir;

    /**
     * ArtgrisConfHelper constructor.
     *
     * @param TokenStorageInterface $tokenStorage
     * @param string $mediaDir
     */
    public function __construct(TokenStorageInterface $tokenStorage, $mediaDir)
    {
        $this->tokenStorage = $tokenStorage;
        $this->mediaDir = $mediaDir;
    }

    /**
     * @param array $extra
     * @return array
     */
    public function getConf($extra = [])
    {
        $folder = 'user';

//        $fs = new Filesystem();
//        if (!$fs->exists($folder)) {
//            $fs->mkdir($folder);
//        }
        return ['dir' => $folder];

    }
}