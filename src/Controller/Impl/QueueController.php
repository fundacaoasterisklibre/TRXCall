<?php

namespace App\Controller\Impl;

use App\Entity\Branch;
use App\Entity\Realtime\Queue;
use App\Entity\Type\TypeQueueStrategy;
use Symfony\Component\HttpFoundation\Request;

class QueueController extends AbstractRestController
{
    public function __construct()
    {
        parent::__construct(Queue::class);
    }

    public function indexAction(Request $request)
    {
        return parent::getAll($request);
    }

    public function getItemAction(Request $request)
    {
        return parent::getItem($request);
    }

    public function createAction(Request $request)
    {
        return parent::sendPost($request);
    }

    public function updateAction(Request $request)
    {
        return parent::sendPut($request);
    }

    public function deleteAction(Request $request)
    {
        return parent::sendDelete($request);
    }

    public function getResourceAction()
    {
        $return = [];

        $return['branches'] = $this->getDoctrine()->getManager()->getRepository(Branch::class)->findAll();
        $return['queueStrategy'] = $this->getDoctrine()->getManager()->getRepository(TypeQueueStrategy::class)->findAll();

        return parent::getResource($return);
    }

}
