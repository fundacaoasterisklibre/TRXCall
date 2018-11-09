<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 15/06/17
 * Time: 18:56
 */

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class GenericRepository extends EntityRepository
{

    /**
     * @return array
     */
    public function getArrayList()
    {
        return $this->createQueryBuilder("entity")
            ->getQuery()
            ->getArrayResult();
    }


    /**
     * @return Array
     */
    public function getDefault()
    {
        return [];
    }
}
