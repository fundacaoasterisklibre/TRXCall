<?php
/**
 * Created by IntelliJ IDEA.
 * User: Victor
 * Date: 23/11/2015
 * Time: 15:52
 */

namespace App\Listener;

use App\Entity\Branch;
use App\Entity\Forward;
use App\Entity\Incoming;
use App\Entity\IvrOption;
use App\Entity\Realtime\QueueMember;
use Doctrine\DBAL\Exception\ConstraintViolationException;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ExceptionListener
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * ExceptionListener constructor.
     *
     * @param             $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        if ($exception instanceof ConstraintViolationException) {
            $this->resolveConstraint($exception);
            return;
        }

        if (!strstr($event->getRequest()->getUri(), '/api')) {
            return;
        }

        $response = new JsonResponse();

        $error_code = $exception->getCode() == 0 ? Response::HTTP_INTERNAL_SERVER_ERROR : $exception->getCode();

        $message = array('code' => $error_code,
            'message' => $exception->getMessage(),
            'trace' => $exception->getTrace(),
            'errors' => array()
        );

        if ($exception->getPrevious() !== null) {
            $message['errors']['previous'] = array('code' => $exception->getPrevious()->getCode(),
                'message' => $exception->getPrevious()->getMessage(),
            );
        }

        $response->setData($message);
        if ($message['code']) {
            $response->setStatusCode($message['code']);
        }
        // Send the modified response object to the event
        $event->setResponse($response);

    }

    private function resolveConstraint(ConstraintViolationException $ex)
    {

        if (preg_match('/"forward"/', $ex->getMessage())) {
            $this->resolveForward($ex);
        }

        throw new \Exception($ex->getMessage(), 400);
    }

    private function resolveForward(ConstraintViolationException $ex)
    {

        if (!preg_match('/with params (.*):/', $ex->getMessage(), $out)) {
            return;
        }

        $decode = json_decode($out[1]);

        $forward = $this->em->getRepository(Forward::class)->findOneBy(['classname' => $decode[0], 'reference' => $decode[1]]);

        if (!$forward instanceof InterfaceConstraint) {
            return;
        }

        $forward->constraint($this->em, $ex);

    }
}