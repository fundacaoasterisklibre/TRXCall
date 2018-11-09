<?php

namespace App\Controller\Impl;

use App\Dialplan\Format\AbstractFormat;
use App\Entity\KhompProtocol;
use App\Entity\Realtime\Sippeers;
use App\Entity\Trunk;
use App\Entity\TrunkRegisterType;
use Symfony\Component\HttpFoundation\Request;

class TrunkController extends AbstractRestController
{
    public function __construct()
    {
        parent::__construct(Trunk::class);
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
        $entity = new Trunk();

        $request = $request->request->all();

        $this->formatProtocol($request, $entity);

        $this->getDao()->create($entity, $request);

        $this->reload();

        return $this->jsonParseView([]);

    }

    public function updateAction(Request $request)
    {
        $id = $request->query->get('id');
        $request = $request->request->all();

        $entity = $this->getDoctrine()
            ->getManager()
            ->getRepository(Trunk::class)
            ->find($id);

        $this->formatProtocol($request, $entity);

        $this->getDao()->update($entity, $request);

        $this->reload();

        return $this->jsonParseView([]);
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

        $return['registerTypes'] = $this->get('doctrine.orm.default_entity_manager')
            ->getRepository(TrunkRegisterType::class)
            ->findAll();

        $return['dialTypes'] = AbstractFormat::getFormat('55')->getResource();

        return parent::getResource($return);
    }

    private function formatProtocol(&$request, Trunk $trunk, $checkInsert = false)
    {

        switch ($request['registerType']['protocol']) {
            case TrunkRegisterType::PROTOCOL_SIP:

                $request['protocol']['registertrying'] = 'yes';
                $request['protocol']['disallow'] = 'all';
                $request['protocol']['allow'] = 'gsm,ulaw,alaw';
                $request['protocol']['trustrpid'] = 'yes';
                $request['protocol']['sendrpid'] = 'yes';

                if ($request['registerType']['name'] == 'GATEWAY_SIP') {
                    $request['protocol']['host'] = 'dynamic';
                    $request['protocol']['registertrying'] = 'no';
                }
                $request['protocol']['id'] = $request['protocol']['defaultuser'];

                if ($checkInsert) {
                    $sip = $this->get('doctrine.orm.default_entity_manager')->getRepository(Sippeers::class)
                        ->find($request['protocol']['id']);

                    if ($sip !== null) {
                        throw new \Exception('Sip existente');
                    }
                }

                $request['protocol']['name'] = $request['protocol']['defaultuser'];
                $request['protocol']['type'] = 'peer';
                $request['protocol']['context'] = 'in';
                $request['protocol']['transport'] = [
                    'name' => 'udp'
                ];
                $request['nat'] = [
                    'name' => 'force_rport,comedia'
                ];
                $request['protocol']['qualify'] = 'yes';
                $request['protocol']['rtautoclear'] = 'yes';
                $request['protocol']['rtcachefriends'] = 'yes';
                $request['protocol']['descr'] = Sippeers::class;
                break;
            case TrunkRegisterType::PROTOCOL_KHOMP:
                $request['protocol']['id'] = 'KHOMP_' . rand(1, 9999999999);
                $request['protocol']['descr'] = KhompProtocol::class;
                break;
        }


    }

    private function reload()
    {
        exec('/usr/bin/sudo /usr/sbin/asterisk -rx "sip reload"', $return);
        exec('/usr/bin/sudo /usr/sbin/asterisk -rx "dialplan reload"', $return);

    }
}
