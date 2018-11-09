<?php

namespace App\Controller\Impl;

use App\Dialplan\Type\AbstractGroupType;
use App\Entity\PlanRoute;
use App\Entity\Trunk;
use Symfony\Component\HttpFoundation\Request;

class PlanRouteController extends AbstractRestController
{

    public function __construct()
    {
        parent::__construct(PlanRoute::class);
    }

    public function indexAction(Request $request)
    {
        $query = $this->getDoctrine()
            ->getRepository(PlanRoute::class)
            ->createQueryBuilder('planroute')
            ->select('planroute.id, planroute.name')
            ->getQuery();

        return parent::getAll($request, $query);
    }

    public function getItemAction(Request $request)
    {
        return parent::getItem($request);
    }

    public function createAction(Request $request)
    {
        $return = parent::sendPost($request);

        $this->reload();

        return $return;
    }

    public function updateAction(Request $request)
    {
        $return = parent::sendPut($request);

        $this->reload();

        return $return;
    }

    public function deleteAction(Request $request)
    {
        $return = parent::sendDelete($request);
        $this->reload();
        return $return;
    }

    public function getResourceAction()
    {
        $return = [];

        $return['trunks'] = $this->getDoctrine()->getManager()->getRepository(Trunk::class)->findAll();

        $return['groups'] =  AbstractGroupType::getGroup('55')->getResource();

        return parent::getResource($return);
    }

    private function reload()
    {
        exec('/usr/bin/sudo /usr/sbin/asterisk -rx "dialplan reload"', $return);
    }

}
