<?php

namespace App\Controller;

use App\Dialplan\Format\AbstractFormat;
use App\Entity\KhompProtocol;
use App\Entity\Realtime\Sippeers;
use App\Entity\Trunk;
use App\Entity\TrunkDialType;
use App\Entity\TrunkRegisterType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/trunk")
 */
class TrunkController extends \App\Controller\Impl\TrunkController
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
}
