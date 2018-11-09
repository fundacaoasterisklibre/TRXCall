<?php

namespace App\Controller\Impl;

use App\Entity\Branch;
use App\Entity\Forward;
use App\Entity\Ivr;
use App\Entity\Realtime\Queue;
use Symfony\Component\HttpFoundation\Request;
use App\DTO\ForwardDTO;

class ForwardController extends AbstractRestController
{
    public function __construct()
    {
        parent::__construct(Forward::class);
    }

    public function indexAction(Request $request)
    {
        $return = [];

        $ivrs = $this->getDoctrine()->getRepository(Ivr::class)->findAll();

        foreach ($ivrs as $ivr) {
            $dto = new ForwardDTO();
            $dto->setDescription('URA '. $ivr->getName());
            $dto->setClassname(get_class($ivr));
            $dto->setReference($ivr->getId());
            $dto->setIcon('dialpad');
            $dto->setContext('ivr-exten');
            $return[] = $dto;
        }

        $branchs = $this->getDoctrine()->getRepository(Branch::class)->findAll();

        foreach ($branchs as $branch) {
            $dto = new ForwardDTO();
            $dto->setDescription('RAMAL '. $branch->getName());
            $dto->setClassname(get_class($branch));
            $dto->setReference($branch->getId());
            $dto->setIcon('phone');
            $dto->setContext('branch');
            $return[] = $dto;
        }

        $queues = $this->getDoctrine()->getRepository(Queue::class)->findAll();

        foreach ($queues as $queue) {
            $dto = new ForwardDTO();
            $dto->setDescription('QUEUE '. $queue->getId());
            $dto->setClassname(get_class($queue));
            $dto->setReference($queue->getId());
            $dto->setIcon('phone');
            $dto->setContext('queue');
            $return[] = $dto;
        }

        return $this->jsonParseView($return);
    }

}
