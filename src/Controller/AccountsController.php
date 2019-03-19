<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class AccountsController extends AbstractController
{
    /**
     * @Route("/accounts", name="accounts")
     * @IsGranted("ROLE_ACCOUNTS")
     */
    public function index()
    {
        return $this->render('accounts/index.html.twig', [
            'controller_name' => 'AccountsController',
        ]);
    }
}
