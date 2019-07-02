<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 29/04/2019
 * Time: 13:49
 */

namespace App\Controller\BackOffice;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\Controller\BackOffice
 */
class DefaultController extends AbstractController
{
    /**
     * @Route(path="/admin", name="back_office_index")
     */
    public function index()
    {
        $user = $this->getUser();
        return $this->render('back_office/default/index.html.twig');
    }
}
