<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 15/06/17
 * Time: 18:58
 */

namespace  App\Repository;

class BranchRepository extends GenericRepository
{

    /**
     * @return array
     */
    public function getArrayList() {
        return $this->createQueryBuilder("branch")
            ->leftJoin('branch.user', 'user')
            ->getQuery()
            ->getArrayResult();
    }

}