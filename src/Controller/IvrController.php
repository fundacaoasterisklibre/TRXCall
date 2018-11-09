<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ivr")
 */
class IvrController extends \App\Controller\Impl\IvrController
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
    public function getResourceAction()
    {
        return parent::getResourceAction();
    }

    /**
     * @Route(".uploadAudio", methods={"POST"})
     */
    public function uploadAudioAction(Request $request)
    {
        return parent::uploadAudioAction($request);
    }

    /**
     * @Route(".uploadMoh", methods={"POST"})
     */
    public function uploadMohAction(Request $request)
    {
        return parent::uploadAudioAction($request);
    }

}
