<?php

namespace App\Controller\Impl;

use App\Entity\Incoming;
use Symfony\Component\HttpFoundation\Request;

class IncomingController extends AbstractRestController
{
    public function __construct()
    {
        parent::__construct(Incoming::class);
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

        $entity = $this->getDoctrine()
            ->getManager()
            ->getRepository(Incoming::class)
            ->find($request->get('id'));

        if ($entity->getFrom() === '*') {
            $request->request->set('from', '*');
            $request->request->set('name', 'Default');
        }

        $request = $request->request->all();

        $this->getDao()->update($entity, $request);
        return $this->jsonParseView([]);
    }

    public function deleteAction(Request $request)
    {
        return parent::sendDelete($request);
    }

    public function getResourceItem()
    {
        $return = [];

        return parent::getResource($return);
    }
}
