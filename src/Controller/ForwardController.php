<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/forward")
 */
class ForwardController extends \App\Controller\Impl\ForwardController
{
    /**
     * @Route(".list", methods={"GET"})
     */
    public function indexAction(Request $request)
    {
        return parent::indexAction($request);
    }

}
