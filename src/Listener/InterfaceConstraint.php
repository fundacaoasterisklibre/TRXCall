<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 19/02/2018
 * Time: 01:04
 */

namespace App\Listener;


use Doctrine\DBAL\Exception\ConstraintViolationException;
use Doctrine\ORM\EntityManager;

interface InterfaceConstraint
{

    public function constraint(EntityManager $em, ConstraintViolationException $ex);

}