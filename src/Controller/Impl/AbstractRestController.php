<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 23/01/18
 * Time: 10:48
 */

namespace App\Controller\Impl;

use App\Service\DaoService;
use Doctrine\ORM\Query;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

abstract class AbstractRestController extends Controller
{

    private $class;
    private $dao;
    private $em;

    /**
     * BaseController constructor.
     * @param $class
     */
    public function __construct($class = null)
    {
        $this->class = $class;

    }

    protected function jsonParseView($data = null, $status = 200, array $headers = array())
    {

        $encoders = array(new XmlEncoder(), new JsonEncoder());

        $normalizer = new GetSetMethodNormalizer();
        $normalizer->setCircularReferenceLimit(1);

        $normalizer->setCircularReferenceHandler(function ($object) {
            return ['id' => $object->getId()];
        });

        $normalizers = array($normalizer);

        $serializer = new Serializer($normalizers, $encoders);

        $jsonContent = $serializer->serialize($data, 'json');

        return $this->jsonView($jsonContent, $status, $headers);
    }

    protected function jsonView($data = null, $status = 200, array $headers = [])
    {
        return new JsonResponse($data, $status, $headers, true);
    }

    protected function paginator(Request $request, $data)
    {
        $paginator = $this->get('knp_paginator');

        if ($request->isMethod('POST')) {
            $numItemsPerPage = $request->request->getInt('numItemsPerPage', 50);
            $currentPageNumber = $request->request->getInt('currentPageNumber', 1);
        } else {
            $numItemsPerPage = $request->query->getInt('numItemsPerPage', 50);
            $currentPageNumber = $request->query->getInt('currentPageNumber', 1);
        }

        $pagination = $paginator->paginate(
            $data,
            $currentPageNumber,
            $numItemsPerPage
        );

        return [
            "currentPageNumber" => $pagination->getCurrentPageNumber(),
            "numItemsPerPage" => $numItemsPerPage,
            "totalItemCount" => $pagination->getTotalItemCount(),
            "items" => $pagination->getItems()
        ];

    }

    /**
     * @return DaoService
     */
    public function getDao(): DaoService
    {
        if ($this->dao === null) {
            $this->em = $this->get('doctrine.orm.default_entity_manager');
            $validator = $this->get('validator');
            $this->dao = new DaoService($this->em, $validator);
        }
        return $this->dao;
    }

    /**
     * @return \Doctrine\ORM\EntityManager|object
     */
    public function getEm()
    {
        return $this->em;
    }

    public function getAll(Request $request, Query $query = null)
    {
        if ($query === null) {
            $query = $this->getDoctrine()
                ->getManager()
                ->getRepository($this->class)
                ->createQueryBuilder("entity")
                ->getQuery();
        }

        $pg = $this->paginator($request, $query);

        return $this->jsonParseView($pg);

    }

    public function getItem(Request $request)
    {
        $id = $request->query->get('id');

        $branch = $this->getDoctrine()
            ->getManager()
            ->getRepository($this->class)
            ->find($id);

        return $this->jsonParseView($branch);
    }

    public function sendPost(Request $request)
    {

        $request = $request->request->all();

        $entity = new $this->class;

        $this->getDao()->create($entity, $request);

        return $this->jsonParseView([]);
    }

    public function sendPut(Request $request)
    {
        $entity = $this->getDoctrine()
            ->getManager()
            ->getRepository($this->class)
            ->find($request->query->get('id'));

        $request = $request->request->all();

        $this->getDao()->update($entity, $request);
        return $this->jsonParseView([]);
    }

    public function sendDelete(Request $request)
    {
        $entity = $this->getDoctrine()
            ->getManager()
            ->getRepository($this->class)
            ->find($request->query->get('id'));

        $this->getDao()->delete($entity);

        return $this->jsonParseView([]);
    }

    public function getResource($return = []) {
        return $this->jsonParseView($return);
    }


    public function getToken() {
        $request = Request::createFromGlobals();

        $authentication = $request->headers->get('Authorization');

        if (!$authentication) {
           return null;
        }

        $isBearer =  preg_match("/^([Bb][Ee][Aa][Rr][Ee][Rr]) (.*)/", $authentication, $output);

        if (!$isBearer) {
            return null;
        }

        return $output[2];
    }

}