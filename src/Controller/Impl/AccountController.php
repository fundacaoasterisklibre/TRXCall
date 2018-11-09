<?php

namespace App\Controller\Impl;

use App\Entity\Department;
use App\Entity\User;
use App\Entity\UserAccessProfile;
use Symfony\Component\HttpFoundation\Request;

class AccountController extends AbstractRestController
{

    public function __construct()
    {
        parent::__construct(User::class);
    }

    public function indexAction(Request $request)
    {
        return parent::getAll($request);
    }

    public function getItemAction(Request $request)
    {
        if (!$request->query->has('id')) {
            $account = $this->getUser();
            $request->query->set('id', $account->getId());
        }

        return parent::getItem($request);
    }

    public function createAction(Request $request)
    {

        $encoder = $this->get('security.password_encoder');

        $request = $request->request->all();

        $entity = new User();

        $request['password'] = $encoder->encodePassword($entity, $request['password']);

        $this->getDao()->create($entity, $request);

        return parent::sendPost($request);
    }

    public function updateAction(Request $request)
    {
        $entity = $this->getDoctrine()
            ->getManager()
            ->getRepository(User::class)
            ->find($request->query->get('id'));

        $request = $request->request->all();

        unset($request['password']);

        $this->getDao()->update($entity, $request);
        return $this->jsonParseView([]);
    }

    public function changePasswordAction(Request $request)
    {
        /**
         * @var User $entity
         */
        $entity = $this->getUser();

        $request = $request->request->all();
        $encoder = $this->get('security.password_encoder');
        $currentPass =  $encoder->encodePassword($entity, $request['current']);

        if ($currentPass !== $entity->getPassword()) {
            return $this->jsonParseView(['message' => 'INCORRECT_PASSWORD'], 400);
        }


        $data = ['id' => 1, 'password' => $encoder->encodePassword($entity, $request['password'])];

        $this->getDao()->update($entity, $data);
        return $this->jsonParseView([]);
    }

    public function deleteAction(Request $request)
    {
        return parent::sendDelete($request);
    }

    public function getResourceAction()
    {
        $return = [];

        $return['departments'] = $this->getDoctrine()->getManager()->getRepository(Department::class)->getArrayResource();
        $return['accessProfile'] = $this->getDoctrine()->getManager()->getRepository(UserAccessProfile::class)->findAll();

        return $this->getResource($return);
    }
}
