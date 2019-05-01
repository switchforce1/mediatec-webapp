<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 29/04/2019
 * Time: 13:49
 */

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\Controller\Front
 */
class DefaultController extends AbstractController
{
    /**
     * @Route(path="/", name="front_index")
     */
    public function index()
    {
        return $this->render('front/default/index.html.twig');
    }
}
