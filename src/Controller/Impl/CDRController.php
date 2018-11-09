<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 04/03/2018
 * Time: 23:28
 */

namespace App\Controller\Impl;


use App\Entity\Realtime\Cdr;
use Symfony\Component\HttpFoundation\Request;

class CDRController extends AbstractRestController
{
    /**
     * CDRController constructor.
     */
    public function __construct()
    {
        parent::__construct(Cdr::class);
    }

    public function filterAction(Request $request) {
        return parent::getAll($request);
    }

}