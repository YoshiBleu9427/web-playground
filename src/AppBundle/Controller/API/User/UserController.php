<?php

namespace AppBundle\Controller\API\User;

use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller implements ClassResourceInterface
{
    public function cgetAction()
    {
        $userRepo = $this->getDoctrine()->getRepository('AppBundle:User');
        return $userRepo->findAll();
    }
}
