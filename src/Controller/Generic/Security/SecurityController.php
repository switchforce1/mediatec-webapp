<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 19/05/2019
 * Time: 23:12
 */

namespace App\Controller\Generic\Security;


use App\Entity\Security\User;
use App\Form\Security\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SecurityController
 * @package App\Controller\Generic\Security
 */
class SecurityController extends AbstractController
{
    /**
     * @Route(path="/register", name="generic_security_register", methods={"GET", "POST"})
     */
    public function register(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('security_user_index');
        }

        return $this->render('generic/security/register.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }
}
