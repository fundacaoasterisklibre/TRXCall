<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 15/06/17
 * Time: 18:58
 */

namespace  App\Repository;

class PlanRouteRepository extends GenericRepository
{

    /**
     * @return array
     */
    public function getArrayList() {
        return $this->createQueryBuilder("planroute")
            ->getQuery()
            ->getArrayResult();
    }

    public function getArrayResource() {
        return $this->createQueryBuilder("planroute")
            ->select("planroute.id, planroute.name")
            ->getQuery()
            ->getArrayResult();
    }

}