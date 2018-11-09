<?php

namespace App\Controller\Impl;

use App\Entity\Department;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;

class DepartmentController extends AbstractRestController
{
    public function __construct()
    {
        parent::__construct(Department::class);
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

        $return['users'] = $this->getDoctrine()->getManager()->getRepository(User::class)->getArrayResource();

        return parent::getResource($return);
    }

}
