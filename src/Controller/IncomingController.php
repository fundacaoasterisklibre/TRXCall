<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/incoming")
 */
class IncomingController extends \App\Controller\Impl\IncomingController
{
    /**
     * @Route(".list", methods={"GET","POST"})
     */
    public function indexAction(Request $request)
    {
        return parent::indexAction($request);
    }

    /**
     * @Route(".info", methods={"GET"})
     */
    public function getItemAction(Request $request)
    {
        return parent::getItemAction($request);
    }

    /**
     * @Route(".create", methods={"POST"})
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);
    }

    /**
     * @Route(".update", methods={"PUT"})
     */
    public function updateAction(Request $request)
    {
        return parent::updateAction($request);
    }

    /**
     * @Route(".delete", methods={"DELETE"})
     */
    public function deleteAction(Request $request)
    {
        return parent::deleteAction($request);
    }

    /**
     * @Route(".resources", methods={"GET"})
     */
    public function getResourceItem()
    {
        return parent::getResourceItem();
    }


}
