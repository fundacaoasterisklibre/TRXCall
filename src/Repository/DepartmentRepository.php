<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 15/06/17
 * Time: 18:58
 */

namespace  App\Repository;

class DepartmentRepository extends GenericRepository
{
    /**
     * @return array
     */
    public function getArrayList() {
        return $this->createQueryBuilder("department")
            ->select("department.id,department.name")
            ->getQuery()
            ->getArrayResult();
    }

    public function getArrayResource() {
        return $this->createQueryBuilder("department")
            ->select("department.id, department.name")
            ->getQuery()
            ->getArrayResult();
    }


}