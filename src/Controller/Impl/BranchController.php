<?php

namespace App\Controller\Impl;

use App\Dialplan\Type\AbstractGroupType;
use App\Entity\Branch;
use App\Entity\BranchPermission;
use App\Entity\Forward;
use App\Entity\PlanRoute;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;

class BranchController extends AbstractRestController
{

    public function __construct()
    {
        parent::__construct(Branch::class);
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
        $request = $request->request->all();

        $entity = new Branch();

        $this->formatSIP($request, $entity);

        $this->getDao()->create($entity, $request);

        $this->reload();

        return $this->jsonParseView([]);
    }

    public function updateAction(Request $request)
    {
        $entity = $this->getDoctrine()
            ->getManager()
            ->getRepository(Branch::class)
            ->find($request->query->get('id'));

        $request = $request->request->all();

        $this->formatSIP($request, $entity);

        $this->checkPermissions($request, $entity);

        $this->getDao()->update($entity, $request);

        $this->reload();

        return $this->jsonParseView([]);
    }

    public function deleteAction(Request $request)
    {

        $forward = $this->get('doctrine.orm.default_entity_manager')->getRepository(Forward::class)->findOneBy(
            ['classname' => Branch::class, 'reference' => $request->get('id')]
        );

        $this->get('doctrine.orm.default_entity_manager')->remove($forward);

        $return = parent::sendDelete($request);
        $this->reload();
        return $return;
    }

    public function getResourceAction()
    {
        $return = [];

        $return['users'] = $this->getDoctrine()->getManager()->getRepository(User::class)->getArrayResource();
        $return['planRoutes'] = $this->getDoctrine()->getManager()->getRepository(PlanRoute::class)->getArrayResource();
        $return['permissions'] = AbstractGroupType::getGroup('55')->getResource();

        return parent::getResource($return);
    }

    private function formatSIP(&$request, Branch $branch)
    {
        $request['sip']['id'] = $request['id'];
        $request['sip']['name'] = $request['id'];
        $request['sip']['defaultuser'] = $request['id'];

        $request['sip']['type'] = "friend";
        $request['sip']['context'] = 'default';
        $request['sip']['transport'] = [
            'name' => 'udp'
        ];
        $request['nat'] = [
            'name' => 'force_rport,comedia'
        ];
        $request['sip']['qualify'] = 'yes';
        $request['sip']['rtautoclear'] = 'yes';
        $request['sip']['rtcachefriends'] = 'yes';
        $request['sip']['host'] = 'dynamic';
    }

    private function reload()
    {
        exec('/usr/bin/sudo /usr/sbin/asterisk -rx "sip reload"', $return);
        exec('/usr/bin/sudo /usr/sbin/asterisk -rx "dialplan reload"', $return);
    }

    private function checkPermissions(&$request, Branch $branch)
    {
        foreach ($request['permissions'] as $permission) {

            $branchPermission = $this->get('doctrine.orm.default_entity_manager')->getRepository(BranchPermission::class)
                ->createQueryBuilder('permission')
                ->where('permission.branch = :branch')
                ->andWhere('permission.groupType = :groupType')
                ->setParameter('branch', $branch)
                ->setParameter('groupType', $permission['groupType'])
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult();

            if (!$branchPermission instanceof BranchPermission || $branchPermission === null) {
                $this->newPermission($permission, $branch);
                continue;
            }

            $this->updatePermission($permission, $branchPermission);
        }


    }

    private function newPermission($permission, Branch $branch)
    {
        $branchPermission = new BranchPermission();
        $branchPermission->setGroupType($permission['groupType']);
        $branchPermission->setBranch($branch);
        $branchPermission->setPermit($permission['permit']);

        $this->get('doctrine.orm.default_entity_manager')->persist($branchPermission);
    }

    private function updatePermission($permission, BranchPermission $branchPermission)
    {
        $branchPermission->setPermit($permission['permit']);
    }
}
