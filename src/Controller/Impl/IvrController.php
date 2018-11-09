<?php

namespace App\Controller\Impl;

use App\Entity\Forward;
use App\Entity\Ivr;
use App\Entity\IvrOption;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class IvrController extends AbstractRestController
{

    public function __construct()
    {
        parent::__construct(Ivr::class);
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
        $entity = new Ivr();

        $this->getDao()->create($entity, $request);

        $this->makeOptions($entity, $request);

        $this->makeUpload($entity, $request, 'audioRead');
        $this->makeUpload($entity, $request, 'audioWelcome');


        $this->reload();

        return $this->jsonParseView([]);
    }

    public function updateAction(Request $request)
    {
        $entity = $this->getDoctrine()
            ->getManager()
            ->getRepository(Ivr::class)
            ->find($request->query->get('id'));

        $this->getDao()->update($entity, $request);

        $this->makeOptions($entity, $request);

        $this->makeUpload($entity, $request, 'audioRead');
        $this->makeUpload($entity, $request, 'audioWelcome');

        $this->reload();

        return $this->jsonParseView([]);
    }

    public function deleteAction(Request $request)
    {

        $forward = $this->get('doctrine.orm.default_entity_manager')->getRepository(Forward::class)->findOneBy(
            ['classname' => Ivr::class, 'reference' => $request->get('id')]
        );

        $this->get('doctrine.orm.default_entity_manager')->remove($forward);

        $return = parent::sendDelete($request);
        $this->reload();
        return $return;
    }

    public function getResourceAction()
    {
        $return = [];

        return parent::getResource($return);
    }

    public function uploadAudioAction(Request $request)
    {
        $upload = $request->files->get('file');

        if (!$upload instanceof UploadedFile) {
            throw new \Exception('Não é um upload');
        }


        $path =  $this->get('kernel')->getRootDir().'/../var/cache/upload/';

        if (!is_dir($path) && !mkdir($path, 0777, true)) {
            return;
        }

        rename($upload->getRealPath(), $path . $upload->getFilename());

        return $this->jsonParseView([ 'file' =>  $path . $upload->getFilename(), 'property' => $request->get('property')]);
    }

    public function uploadMohAction(Request $request)
    {
        $all = $request->files->all();

        return $this->jsonParseView($all);
    }


    private function makeOptions(Ivr $entity, Request $request)
    {
        $notDelete = [];
        foreach ($request->request->get('options') as $option) {
            $option['ivr'] = ['id' => $entity->getId()];
            $ivrOption = $this->getDoctrine()
                ->getManager()
                ->getRepository(IvrOption::class)
                ->findOneBy([
                    'ivr' => $entity,
                    'option' => $option['option']
                ]);

            if ($ivrOption == null) {
                $ivrOption = new IvrOption();
                $this->getDao()->create($ivrOption, $option);
            } else {
                $this->getDao()->update($ivrOption, $option);
            }

            $notDelete[$ivrOption->getOption()] = $ivrOption;
        }

        if ($entity->getOptions()) {
            foreach ($entity->getOptions() as $option) {
                if (isset($notDelete[$option->getOption()])) {
                    continue;
                }

                $this->getDao()->delete($option);
            }
        }
    }


    private function makeUpload(Ivr $ivr, Request $request, $property)
    {

        $req = $request->get($property . 'Changed', null);

        if ($req === null) {
            return;
        }

        $path =  $this->get('kernel')->getRootDir().'/../var/data/ivr/'. $ivr->getId().'/';

        if (!is_dir($path) && !mkdir($path, 0777, true)) {
            return;
        }


        foreach (glob( $path . '/' . $property . '__*') as $filename) {
            unlink($filename);
        }

        if ($req === '__REMOVE__') {
            return;
        }

        rename($req, $path  . $request->get($property));
    }

    private function reload() {
        exec('/usr/bin/sudo /usr/sbin/asterisk -rx "dialplan reload"', $return);
    }

}
