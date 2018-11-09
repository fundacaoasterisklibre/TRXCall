<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 26/01/2018
 * Time: 00:26
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/auth")
 */
class AuthController extends \App\Controller\Impl\AuthController
{
    /**
     * @Route(".login", methods={"GET", "POST"})
     */
    public function authAction(Request $request)
    {
        return parent::authAction($request);
    }

    /**
     * @Route(".refresh", methods={"GET", "POST"})
     */
    public function refreshAction(Request $request)
    {
        return parent::refreshAction($request);
    }

    /**
     * @Route(".logout", methods={"GET"})
     */
    public function logoutAction(Request $request)
    {
        return parent::logoutAction($request);
    }

}