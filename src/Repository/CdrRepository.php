<?php

namespace  App\Repository;

class CdrRepository extends GenericRepository
{
    /**
     * @return array
     */
    public function getArrayList() {
        return $this->createQueryBuilder("cdr")
            ->select("cdr.id,cdr.name")
            ->getQuery()
            ->getArrayResult();
    }

    public function getArrayResource() {
        return $this->createQueryBuilder("cdr")
            ->select("cdr.id, cdr.name")
            ->getQuery()
            ->getArrayResult();
    }


}